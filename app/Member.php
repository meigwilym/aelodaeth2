<?php

namespace App;

class Member extends BaseModel
{
    protected $table = 'members';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function scopeWithSubscriptions($query)
    {
        return $query->with('subscriptionHistory');
    }
    
    /**
     * Final part of the process
     *
     * @param \App\Subscription $subscription
     * @return type
     */
    public function subscribe(Subscription $subscription)
    {
        // @todo check membership is set
        $subscription->ends_on = $this->membership->endsOn($this);
        $subscription->cost    = $this->membership->cost;

        $this->subscription()->save($subscription);
    }
}