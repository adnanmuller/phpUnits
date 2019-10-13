<?php
namespace TDD;
/**require dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
**/
use \BadMethodCallException;
class Receipt{

public function __construct(Formatter $formater){
  $this->Formatter=$formater;
}

  public function subtotal(array $items =[], $coupon){
    if($coupon>1.00){
      throw new BadMethodCallException('coupon must be less than or equal to 1.00');
    }
    $sum=array_sum($items);
    if(!is_null($coupon)){
      return $sum-($sum*$coupon);
    }
    return $sum;
  }

  public function tax($amount){
    return $this->Formatter->currencyAmt($amount*$this->tax);
  }

  public function postTaxTotal($item, $coupon){
    $subtotal=$this->subtotal($item, $coupon);
    return $subtotal + $this->tax($subtotal);
  }
}
/**
$test1=new receipt(new Formatter);
$test2=$test1->subtotal([1,5,6],0.10);
echo $test2;
**/





















 ?>
