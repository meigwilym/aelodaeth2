<?php

namespace App\Contracts;

/**
 *
 * @author Mei Gwilym <mei.gwilym@gmail.com>
 */
interface MembershipInterface {
  
  public function cost();
  
  public function duration();
}
