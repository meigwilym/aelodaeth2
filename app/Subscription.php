<?php

namespace App;

class Subscription extends BaseModel
{
    protected $table = 'subscriptions';
    
    protected $dates = ['ends_on'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    // ===============  Scopes

    /**
     * Constrains to the active subscription
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        return $query->whereNull('ends_on')
                ->orWhere('ends_on', '>', Season::starts()->toDateTimeString())
        ;
    }

    // ================ Business Logic

    public function isActive()
    {
        return ($this->ends_on > Season::starts());
    }

    
    /**
     * Set the Membership level
     * 
     * @param \App\Membership $membership
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function setMembership(Membership $membership)
    {
        $this->membership()->associate($membership);
    }

    /**
     * Accept a payment for the subscription
     *
     * @param \App\Payment $payment
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takePayment(Payment $payment)
    {
        $this->payments()->save($payment);
    }
    
}