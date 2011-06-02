<?php
/**
  * @file: validation class for validating user submitted data
  *
  * for simple validations use PHP's in-built type identifier function instead of this wrapper class
  * of format is_x() format instead
  *
  * available validations : nothing,mail,zip,phone,card,ip,acceptable,strong,date
  * suggested validations :date-time ,country,state
  */

/**
  * validating is like "asking" . let's do it as we ask.
  */

class IsIt{
 private static $occur = 0 ;

  function __construct(){
    self::$occur++;
  }
  
  static function times(){
      return self::$occur;
  }
  public function nothing($i){
    if(!empty($i)){
    //perform logic
      return FALSE;
    }
    return TRUE;
  }
  
  public function phone($i){
      //North America : ^\(?([0-9]{3})\)?[-.]?([0-9]{3})[-. ]?([0-9]{4})$
      //international : ^\+(?:[0-9]?){6,14}[0-9]$
	
	$p = '/^\+(?:[0-9]?){6,14}[0-9]$/';
    if(!preg_match($p,$i)){
        return FALSE;
      }
    return TRUE;
  
  }
  
  public function mail($i){
    $p = '(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})';
    if(!preg_match($p,$i)){
        return FALSE;
      }
    return TRUE;
  }
  
  public function date($i){
    // 22/11/2006
    $p = '/^\d{1,2}\/\d{1,2}\/\d{4}$/';
    if(!preg_match($p,$i)){
        return FALSE;
      }
    return TRUE;
  }
  
  public function acceptable($i){
  
    $p = '/^([a-zA-Z0-9-]+)$/'; // letters , number and hyphen
    if(!preg_match($p,$i)){
        return FALSE;
      }
    return TRUE;
  
  }
  
  public function strong($i){
    
    $p =  '/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})$/'; //  at least a number,small,cap alphabet
    
    if(!preg_match($p,$i)){
        return FALSE;
      }
    return TRUE;
  }
  
  public function zip($i,$f = NULL){
  
    $zip_pattern = array(
        'us'  => '/^[0-9]{5}(-[0-9]{4})?$/', // us-default
        'us5' => '/^\d{5}$/' ,
        'us9' => '/^\d{5}-\d{4}$/',
        'in'  => '/^\d{6}$/'
      );
      
    $p = (!f || !array_key_exists($f,$zip_pattern)) ? $zip_pattern['us'] : $zip_pattern[$f];
    
    if(!preg_match($p,$i)){
        return FALSE;
      }
      return TRUE;
    }
  
  public function ip($i){
  
    $p = '/^(\d{3}).(\d{3}).(\d{1,3}).(\d{1,3})$/';
    
    if(!preg_match($p,$i)){
        return FALSE;
      }
      return TRUE;
  }
  
  public function card($i){
	
	$p = '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/';
  
	if(!preg_match($p,$i)){
        return FALSE;
      }
      return TRUE;
  }
  
  public function lessbyday($i){
  
  
  }
  
  public function country($i){
  
  
  }
  
  public function state($i){
  
  
  }
  
  public function equal($i){
  
  
  }
  
}

/**
  * extra validation functions that couldn't make it to "general usage" , but could prove as good addition
  */

class IsItPlus Extends IsIt{
  
  public function url(){
  
  
  
  }

}



//USAGE
$input = 'dfagdsa_dads9A';
$is_it = new IsIt();
  if($is_it->acceptable($input)){
      echo "valid";
      
  }else{
      echo "invalid";
  }

?>