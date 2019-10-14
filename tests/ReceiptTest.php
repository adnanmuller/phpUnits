<?php
namespace TTD\Test;
//C:\xampp\htdocs\PHP UNIT\tests\vendor\autoload.php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase{

  public function setUp(){
    $this->Formatter=$this->getMockBuilder('TDD\Formatter')
    ->setMethods(['currencyAmt'])
    ->getMock();
    $this->Formatter->expects($this->any())
    ->method('currencyAmt')
    ->with($this->anything())
    ->will($this->returnArgument(0));
    $this->Receipt=new Receipt($this->Formatter);
  }

  public function tearDown(){
    unset($this->Receipt);
  }

  /**
  * @dataProvider providesubtotal
  **/
  public function testSubtotal($items, $expected){
    //$Receipt=new Receipt();
    //$input=[0,2,5,8];
    $coupon=null;
    $output=$this->Receipt->subtotal($items, $coupon);
    $this->assertEquals(
      $expected,
      $output,
      //'When summing the total should equal 15'
      'When summing the total should equal {$expecded}'
    );
  }

  public function providesubtotal(){
    return [
    'ints_totaling_16'=>[[1,2,5,8],16],
    [[-1,2,5,8],14],
    [[1,2,8],11],
  ];

  }

  public function testsubtotalAndCoupon(){
    //$Receipt=new Receipt();
    $input=[0,2,5,8];
    $coupon=0.20;
    $output=$this->Receipt->subtotal($input,$coupon);
    $this->assertEquals(
      12,
      $output,
      'When summing the total should equal 12'
    );
  }

  public function testsubtotalException(){
    //$Receipt=new Receipt();
    $input=[0,2,5,8];
    $coupon=1.20;

    $this->expectException('BadMethodCallException');
    $this->Receipt->subtotal($input,$coupon);

  }

  public function testPostTaxTotal(){
    $items=[1,2,5,8];
    $this->Receipt->tax=0.20;
    $coupon=null;
/**$Receipt=$this->getMockBuilder('TDD\Receipt')
->setMethods(['tax', 'subtotal'])
->setConstructorArgs([$this->Formatter])
->getMock();
$Receipt->expects($this->once())
->method('subtotal')
->with($items, $coupon)
->will($this->returnValue(10.00));
$Receipt->expects($this->once())
->method('tax')
->with(10.00)
->will($this->returnValue(1.00));**/
$result=$this->Receipt->postTaxTotal([1,2,5,8], null);
$this->assertEquals(19.00, $result);

  }
/**
  public function testTax(){
    $inputAmount=10.00;
    $this->Receipt->tax=0.10;
    $output=$this->Receipt->tax($inputAmount);
    $this->assertEquals(
      1.00,
      $output,
      'The Tax calculation should equal 1.00'
    );
  }
**/

}
 ?>
