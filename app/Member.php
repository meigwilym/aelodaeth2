<?php

namespace App;

class Member extends BaseModel
{
    protected $table = 'members';

    protected $fillable = ['first_name', 'last_name', 'email', 'billing_address1', 'billing_address2', 'billing_address3', 'billing_town', 'billing_postcode', 'rhif_ffon', 'notes'];

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

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    public function getAddressAttribute()
    {
        $address = $this->attributes['billing_address1'];
        if($this->attributes['billing_address2']) $address .= ', '.$this->attributes['billing_address2'];
        if($this->attributes['billing_address3']) $address .= ', '.$this->attributes['billing_address3'];

        return $address;
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
        $subscription->ends_on = $subscription->membership->endsOn($this);
        $subscription->cost    = $subscription->membership->cost;

        $this->subscription()->save($subscription);
    }
}