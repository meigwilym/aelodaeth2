<?php

namespace App;

use App\Subscription;

class Payment extends BaseModel
{
  protected $table = 'payments';
  
  public function subscription()
  {
    return $this->belongsTo(Subscription::class);
  }
  
  public function paymentMethod()
  {
    return $this->belongsTo(PaymentMethod::class);
  }
  
  public function member()
  {
    return $this->hasManyThrough(Member::class, Subscription::class);
  }
  
  // ================ Business logic
  
  public function payBy(PaymentMethod $method)
  {
    $this->paymentMethod()->associate($method);
  }
}
