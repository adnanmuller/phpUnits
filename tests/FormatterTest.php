<?php
namespace TTD\Test;

//C:\xampp\htdocs\PHP UNIT\tests\vendor\autoload.php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Formatter;
use\TDD\Receipt;

class FormatterTest extends TestCase{

    public function setUp(){
      $this->Formatter=new Formatter();
    }

    public function tearDown(){
      unset($this->Formatter);
    }

  /**
  * @dataProvider provideCurrencyAmt
  **/
    public function testCurrentAmount($input, $expected, $msg){
      $this->assertSame(
        $expected,
        $this->Formatter->currencyAmt($input),
        $msg
      );
    }

    public function provideCurrencyAmt(){
      return [
        [1, 1.00, '1 should be transformed into 1.00'],
        [1.1, 1.10, '1.1 should be transformed into 1.10'],
        [1.11, 1.11, '1 should be transformed into 1.11'],
        [1.111, 1.11, '1.111 should be transformed into 1.11'],
      ];
    }

}




 ?>
