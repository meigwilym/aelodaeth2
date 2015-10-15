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
                ; //->active();
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

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    public function getAddressAttribute()
    {
        //return implode(', ', [$this->attributes['billing_address1'], $this->attributes['billing_address2'], $this->attributes['billing_address3']]);
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