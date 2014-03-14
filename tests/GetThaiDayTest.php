<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class GetThaiDayTest extends \PHPUnit_Framework_TestCase{
    public function testGetDayNameAsIndex(){
        // Normal input 0 - 6 ==> SUN - SAT
        $actual = StringHelper::getThaiDay(StringHelper::SUNDAY);
        $this->assertEquals('วันอาทิตย์', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::MONDAY);
        $this->assertEquals('วันจันทร์', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::TUESDAY);
        $this->assertEquals('วันอังคาร', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::WEDNESDAY);
        $this->assertEquals('วันพุธ', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::THURSDAY);
        $this->assertEquals('วันพฤหัสบดี', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::FRIDAY);
        $this->assertEquals('วันศุกร์', $actual);
        $actual = StringHelper::getThaiDay(StringHelper::SATURDAY);
        $this->assertEquals('วันเสาร์', $actual);
        // Out of bound input, expects empty string return
        $actual = StringHelper::getThaiDay(10);
        $this->assertEquals('', $actual);
        $actual = StringHelper::getThaiDay(-1);
        $this->assertEquals('', $actual);
    }
    public function testDayNameTakeStringInput(){
        // String input
        $actual = StringHelper::getThaiDay(''); // Empty string
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiDay('bad string');
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiDay('Sunday');
        $this->assertEquals('วันอาทิตย์', $actual);
        
        $actual = StringHelper::getThaiDay('Monday');
        $this->assertEquals('วันจันทร์', $actual);
        
        $actual = StringHelper::getThaiDay('Tuesday');
        $this->assertEquals('วันอังคาร', $actual);
        
        $actual = StringHelper::getThaiDay('Wednesday');
        $this->assertEquals('วันพุธ', $actual);
        
        $actual = StringHelper::getThaiDay('Thursday');
        $this->assertEquals('วันพฤหัสบดี', $actual);
        
        $actual = StringHelper::getThaiDay('Friday');
        $this->assertEquals('วันศุกร์', $actual);
        
        $actual = StringHelper::getThaiDay('friday');
        $this->assertEquals('วันศุกร์', $actual);
        
        $actual = StringHelper::getThaiDay('Saturday');
        $this->assertEquals('วันเสาร์', $actual);
        
        $actual = StringHelper::getThaiDay('SaturdaY'); // test support all lower/upper cases
        $this->assertEquals('วันเสาร์', $actual);
        
        $actual = StringHelper::getThaiDay('Sun');
        $this->assertEquals('วันอาทิตย์', $actual);
        
        $actual = StringHelper::getThaiDay('Mon');
        $this->assertEquals('วันจันทร์', $actual);
        
        $actual = StringHelper::getThaiDay('Tue');
        $this->assertEquals('วันอังคาร', $actual);
        
        $actual = StringHelper::getThaiDay('Wed');
        $this->assertEquals('วันพุธ', $actual);
        
        $actual = StringHelper::getThaiDay('Thu');
        $this->assertEquals('วันพฤหัสบดี', $actual);
        
        $actual = StringHelper::getThaiDay('Fri');
        $this->assertEquals('วันศุกร์', $actual);
        
        $actual = StringHelper::getThaiDay('Sat');
        $this->assertEquals('วันเสาร์', $actual);
        
        $actual = StringHelper::getThaiDay('sAT');
        $this->assertEquals('วันเสาร์', $actual);
    }
    public function testDayNameAsArrayInput(){
        // Array input - treat as invalid, return empty string
        $actual = StringHelper::getThaiDay(array());
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiDay(array(
                'a',
                'b' 
        ));
        $this->assertEquals('', $actual);
    }
    public function testGetShortDay(){
        $shortFormat = true;
        foreach(StringHelper::getDaysArray() as $key => $value){
            $actual = StringHelper::getThaiDay($value, $shortFormat);
            $this->assertEquals(StringHelper::getThaiShortDaysArray()[$key], $actual);
        }
    }
}