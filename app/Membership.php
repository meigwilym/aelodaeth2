<?php

namespace App;

class Membership extends BaseModel
{
  protected $table = 'memberships';

  public function subscriptions()
  {
    return $this->hasMany(Subscription::class);
  }
  
  // here for completeness' sake
  public function members()
  {
    return $this->hasManyThrough(Member::class, Subscription::class);
  }
  
  public function endsOn(Member $member)
  {
    return (is_null($this->duration)) ? null : $this->calculateEndDate($member, $this->duration);
  }
  
  /**
   * Calculates end date. Either from the beginning of this season, or the beginning of any active subscription
   * @param App\Member $member
   * @param integer $duration in months
   */
  private function calculateEndDate(Member $member, $duration)
  {
    // check for any subscriptions that are still running
    $subHistory = $member->subscriptionHistory()->get();
    
    if($subHistory->count() > 0)
    {    
      $previousSubscription = $subHistory->shift();
      if($previousSubscription->isActive())
      {
        return $previousSubscription->ends_on->addMonths($duration);
      }
    }
    
    return Season::starts()->addMonths($duration);
  }
}
