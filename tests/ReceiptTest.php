<?php
namespace TTD\Test;
//C:\xampp\htdocs\PHP UNIT\tests\vendor\autoload.php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase{

  public function setUp(){
    $this->Receipt=new Receipt();
  }

  public function tearDown(){
    unset($this->Receipt);
  }
  public function testTotal(){
    //$Receipt=new Receipt();
    $input=[0,2,5,8];
    $coupon=null;
    $output=$this->Receipt->total($input,$coupon);
    $this->assertEquals(
      15,
      $output,
      'When summing the total should equal 15'
    );
  }

  public function testTotalAndCoupon(){
    //$Receipt=new Receipt();
    $input=[0,2,5,8];
    $coupon=0.20;
    $output=$this->Receipt->total($input,$coupon);
    $this->assertEquals(
      12,
      $output,
      'When summing the total should equal 12'
    );
  }

  public function testTax(){
    $inputAmount=10.00;
    $taxInput=0.10;
    $output=$this->Receipt->tax($inputAmount, $taxInput);
    $this->assertEquals(
      1.00,
      $output,
      'The Tax calculation should equal 1.00'
    );
  }
}
 ?>
