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
  
  public function method()
  {
    return $this->belongsTo(PaymentMethod::class);
  }
  
  public function member()
  {
    return $this->hasManyThrough(Member::class, Subscription::class);
  }
  
  /** 
   * Which method was used - card, checque etc
   * @param type $query
   * @param type $method
   * @return type
   */
  public function scopeOfMethod($query, $method)
  {
    return $query->where('method', $method);
  }  
  
  // ================ Business logic
  
  public function payBy(PaymentMethod $method)
  {
    $this->method()->associate($method); 
  }
}
