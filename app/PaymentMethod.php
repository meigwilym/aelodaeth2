<?php

namespace App;

class PaymentMethod extends BaseModel
{  
  const TYPE_ONEOFF = 1;
  const TYPE_RECURRING = 2;
  
  protected $table = 'payment_methods'; 
  
  protected $fillable = ['name'];
  
  public static function getTypesArray()
  {
    return [
        self::TYPE_ONEOFF => 'One Off',
        self::TYPE_RECURRING => 'Recurring',
    ];
  }
  
  public function getTypeAttriute($val)
  {
    return self::getTypesArray()[$val];
  }

  public function payments()
  {
    return $this->hasMany(Payment::class);
  }
}
