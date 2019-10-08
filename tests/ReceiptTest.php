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
    $output=$this->Receipt->total($input);
    $this->assertEquals(
      15,
      $output,
      'When summing the total should equal 15'
    );
  }
}
 ?>
