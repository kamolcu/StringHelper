<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class HelperTest extends \PHPUnit_Framework_TestCase {
    public function testGetDayNameAsIndex() {
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
        $actual = StringHelper::getThaiDay(- 1);
        $this->assertEquals('', $actual);
    }
    public function testDayNameTakeStringInput() {
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
    public function testDayNameAsArrayInput() {
        // Array input - treat as invalid, return empty string
        $actual = StringHelper::getThaiDay(array());
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiDay(array(
                'a',
                'b' 
        ));
        $this->assertEquals('', $actual);
    }
    public function testMonthNameAsIndex() {
        $actual = StringHelper::getThaiMonth(0);
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth(15);
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth(- 1);
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth(- 1.0);
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth(1);
        $this->assertEquals('มกราคม', $actual);
        
        $actual = StringHelper::getThaiMonth(2);
        $this->assertEquals('กุมภาพันธ์', $actual);
        
        $actual = StringHelper::getThaiMonth(3);
        $this->assertEquals('มีนาคม', $actual);
        
        $actual = StringHelper::getThaiMonth(4);
        $this->assertEquals('เมษายน', $actual);
        
        $actual = StringHelper::getThaiMonth(5);
        $this->assertEquals('พฤษภาคม', $actual);
        
        $actual = StringHelper::getThaiMonth(6);
        $this->assertEquals('มิถุนายน', $actual);
        
        $actual = StringHelper::getThaiMonth(7);
        $this->assertEquals('กรกฎาคม', $actual);
        
        $actual = StringHelper::getThaiMonth(8);
        $this->assertEquals('สิงหาคม', $actual);
        
        $actual = StringHelper::getThaiMonth(9);
        $this->assertEquals('กันยายน', $actual);
        
        $actual = StringHelper::getThaiMonth(10);
        $this->assertEquals('ตุลาคม', $actual);
        
        $actual = StringHelper::getThaiMonth(11);
        $this->assertEquals('พฤศจิกายน', $actual);
        
        $actual = StringHelper::getThaiMonth(12);
        $this->assertEquals('ธันวาคม', $actual);
    }
    public function testMonthNameAsString() {
        $actual = StringHelper::getThaiMonth('');
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth('Bad String');
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth('January');
        $this->assertEquals('มกราคม', $actual);
        
        $actual = StringHelper::getThaiMonth('February');
        $this->assertEquals('กุมภาพันธ์', $actual);
        
        $actual = StringHelper::getThaiMonth('March');
        $this->assertEquals('มีนาคม', $actual);
        
        $actual = StringHelper::getThaiMonth('April');
        $this->assertEquals('เมษายน', $actual);
        
        $actual = StringHelper::getThaiMonth('May');
        $this->assertEquals('พฤษภาคม', $actual);
        
        $actual = StringHelper::getThaiMonth('June');
        $this->assertEquals('มิถุนายน', $actual);
        
        $actual = StringHelper::getThaiMonth('July');
        $this->assertEquals('กรกฎาคม', $actual);
        
        $actual = StringHelper::getThaiMonth('August');
        $this->assertEquals('สิงหาคม', $actual);
        
        $actual = StringHelper::getThaiMonth('September');
        $this->assertEquals('กันยายน', $actual);
        
        $actual = StringHelper::getThaiMonth('October');
        $this->assertEquals('ตุลาคม', $actual);
        
        $actual = StringHelper::getThaiMonth('November');
        $this->assertEquals('พฤศจิกายน', $actual);
        
        $actual = StringHelper::getThaiMonth('December');
        $this->assertEquals('ธันวาคม', $actual);
    }
    public function testMonthNameAsArray() {
        $actual = StringHelper::getThaiMonth(array());
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getThaiMonth(array(
                'a',
                2 
        ));
        $this->assertEquals('', $actual);
    }
}