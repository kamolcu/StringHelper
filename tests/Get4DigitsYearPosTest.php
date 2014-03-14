<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class Get4DigitsYearPosTest extends \PHPUnit_Framework_TestCase{
    function setUp(){
        // strtotime(): It is not safe to rely on the system's timezone settings.
        // You are *required* to use the date.timezone setting or the date_default_timezone_set()
        // function. In case you used any of those methods and you are still getting this warning,
        // you most likely misspelled the timezone identifier. We selected the timezone 'UTC' for now,
        // but please set date.timezone to select your timezone.
        date_default_timezone_set('Asia/Bangkok');
    }
    public function testGet4DigitsYearPos(){
        $actual = StringHelper::get4DigitsYearPos(array());
        $this->assertEquals(-1, $actual);
        $actual = StringHelper::get4DigitsYearPos('xxx 2008');
        $this->assertEquals(-1, $actual);
        
        $actual = StringHelper::get4DigitsYearPos('2008');
        $this->assertEquals(0, $actual);
        
        $actual = StringHelper::get4DigitsYearPos('July 2008');
        $this->assertEquals(5, $actual);
        
        $actual = StringHelper::get4DigitsYearPos('25 AUG 2008 17:30');
        $this->assertEquals(7, $actual);
    }
}
