<?php

namespace App;

class Member extends BaseModel
{
  protected $table = 'members';

  public function subscription()
  {
    return $this->hasOne(Subscription::class)
            ->active();
  }
  
  public function subscriptionHistory()
  {
    return $this->hasMany(Subscription::class)
            ->orderBy('ends_on', 'DESC');
  }
  
  
  // =================== Business Logic
  
  /**
   * Final part of the process
   * 
   * @param \App\Subscription $subscription
   * @return type
   */
  public function subscribe(Subscription $subscription)
  {
    $subscription->ends_on = $this->membership->endsOn($this);
    $subscription->cost = $this->membership->cost;
    
    $this->subscription()->save($subscription);
  }
}
