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

  public function testPostTaxTotal(){
    $items=[1,2,5,8];
    $tax=0.20;
    $coupon=null;
$Receipt=$this->getMockBuilder('TDD\Receipt')
->setMethods(['tax', 'total'])
->getMock();
$Receipt->expects($this->once())
->method('total')
->with($items, $coupon)
->will($this->returnValue(10.00));
$Receipt->expects($this->once())
->method('tax')
->with(10.00, $tax)
->will($this->returnValue(1.00));
$result=$Receipt->postTaxTotal([1,2,5,8], 0.20, null);
$this->assertEquals(11.00, $result);

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
