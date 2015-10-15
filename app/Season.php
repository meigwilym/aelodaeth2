<?php

namespace App;

/**
 * A static class to figure out the current season, based on this month. 
 * 
 * Each season ends on June 30th, and begins July 1st. 
 * 
 * Membership terms run with the season. 
 * 
 */
class Season
{
  public static $name;
  public static $starts;
  public static $ends;
  
  public function __construct()
  {
    if(self::$name === null)
    {      
      // from Jul - Dec
      if(date('m') > 6)
      {
          self::$name = date('y').'-'.(date('y')+1);
          
          self::$starts = new DateTime(date('y').'-7-1'); // 1st july
          self::$ends = new DateTime((date('y')+1).'-6-30 23:59:59'); // end of june next year
      }
      // from Jan - Jun
      else
      {
          self::$name = (date('y')-1).'-'.date('y'); 
          
          self::$starts = new DateTime((date('Y')-1).'-7-1'); 
          self::$ends = new DateTime((date('y')).'-6-30 23:59:59'); 
      }
    }
  }
}
