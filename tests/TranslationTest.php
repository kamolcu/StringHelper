<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class TranslationTest extends \PHPUnit_Framework_TestCase {
    // Days
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    // Months
    const JANUARY = 1;
    const FEBRUARY = 2;
    const MARCH = 3;
    const APRIL = 4;
    const MAY = 5;
    const JUNE = 6;
    const JULY = 7;
    const AUGUST = 8;
    const SEPTEMBER = 9;
    const OCTOBER = 10;
    const NOVEMBER = 11;
    const DECEMBER = 12;
    protected static $days = array(
            self::SUNDAY => 'Sunday',
            self::MONDAY => 'Monday',
            self::TUESDAY => 'Tuesday',
            self::WEDNESDAY => 'Wednesday',
            self::THURSDAY => 'Thursday',
            self::FRIDAY => 'Friday',
            self::SATURDAY => 'Saturday' 
    );
    protected static $months = array(
            self::JANUARY => "January",
            self::FEBRUARY => "February",
            self::MARCH => "March",
            self::APRIL => "April",
            self::MAY => "May",
            self::JUNE => "June",
            self::JULY => "July",
            self::AUGUST => "August",
            self::SEPTEMBER => "September",
            self::OCTOBER => "October",
            self::NOVEMBER => "November",
            self::DECEMBER => "December" 
    );
    protected static $thaiDays = array(
            self::SUNDAY => 'วันอาทิตย์',
            self::MONDAY => 'วันจันทร์',
            self::TUESDAY => 'วันอังคาร',
            self::WEDNESDAY => 'วันพุธ',
            self::THURSDAY => 'วันพฤหัสบดี',
            self::FRIDAY => 'วันศุกร์',
            self::SATURDAY => 'วันเสาร์' 
    );
    protected static $thaiMonths = array(
            self::JANUARY => "มกราคม",
            self::FEBRUARY => "กุมภาพันธ์",
            self::MARCH => "มีนาคม",
            self::APRIL => "เมษายน",
            self::MAY => "พฤษภาคม",
            self::JUNE => "มิถุนายน",
            self::JULY => "กรกฎาคม",
            self::AUGUST => "สิงหาคม",
            self::SEPTEMBER => "กันยายน",
            self::OCTOBER => "ตุลาคม",
            self::NOVEMBER => "พฤศจิกายน",
            self::DECEMBER => "ธันวาคม" 
    );
    function setUp(){
        date_default_timezone_set('Asia/Bangkok');
    }
    public function testTranslationInvalidInput(){
        $expect = '';
        $actual = StringHelper::translateDateStringToThai('xx January');
        $this->assertEquals($expect, $actual);
        
        $actual = StringHelper::translateDateStringToThai(array());
        $this->assertEquals($expect, $actual);
        
        $actual = StringHelper::translateDateStringToThai('');
        $this->assertEquals($expect, $actual);
        
        $actual = StringHelper::translateDateStringToThai(100);
        $this->assertEquals($expect, $actual);
        
        $actual = StringHelper::translateDateStringToThai('100 jan 2012');
        $this->assertEquals($expect, $actual);
    }
    public function testTranslationMonth(){
        $actual = StringHelper::translateDateStringToThai('January');
        $this->assertEquals('มกราคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('February');
        $this->assertEquals('กุมภาพันธ์', $actual);
        
        $actual = StringHelper::translateDateStringToThai('March');
        $this->assertEquals('มีนาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('April');
        $this->assertEquals('เมษายน', $actual);
        
        $actual = StringHelper::translateDateStringToThai('May');
        $this->assertEquals('พฤษภาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('June');
        $this->assertEquals('มิถุนายน', $actual);
        
        $actual = StringHelper::translateDateStringToThai('July');
        $this->assertEquals('กรกฎาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('August');
        $this->assertEquals('สิงหาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('September');
        $this->assertEquals('กันยายน', $actual);
        
        $actual = StringHelper::translateDateStringToThai('October');
        $this->assertEquals('ตุลาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('November');
        $this->assertEquals('พฤศจิกายน', $actual);
        
        $actual = StringHelper::translateDateStringToThai('December');
        $this->assertEquals('ธันวาคม', $actual);
        
        $actual = StringHelper::translateDateStringToThai('DeCember');
        $this->assertEquals('ธันวาคม', $actual);
        
        foreach(self::$months as $key => $value){
            $actual = StringHelper::translateDateStringToThai($value);
            $this->assertEquals(self::$thaiMonths[$key], $actual);
        }
    }
    public function testTranslationDay(){
        $actual = StringHelper::translateDateStringToThai('Monday');
        $this->assertEquals('วันจันทร์', $actual);
        
        $actual = StringHelper::translateDateStringToThai('monday');
        $this->assertEquals('วันจันทร์', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Tuesday');
        $this->assertEquals('วันอังคาร', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Wednesday');
        $this->assertEquals('วันพุธ', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Thursday');
        $this->assertEquals('วันพฤหัสบดี', $actual);
        
        $actual = StringHelper::translateDateStringToThai('THursDay');
        $this->assertEquals('วันพฤหัสบดี', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Friday');
        $this->assertEquals('วันศุกร์', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Saturday');
        $this->assertEquals('วันเสาร์', $actual);
        
        $actual = StringHelper::translateDateStringToThai('Sunday');
        $this->assertEquals('วันอาทิตย์', $actual);
        
        foreach(self::$days as $key => $value){
            $actual = StringHelper::translateDateStringToThai($value);
            $this->assertEquals(self::$thaiDays[$key], $actual);
        }
    }
    public function testGetBuddhistCalendarYear(){
        $actual = StringHelper::getBuddhistCalendarYear(array());
        $this->assertEquals('', $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('0');
        $this->assertEquals(543, $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('-10');
        $this->assertEquals('533', $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('2014', false);
        $this->assertEquals('2557', $actual);
        $actual = StringHelper::getBuddhistCalendarYear('2014', array());
        $this->assertEquals('2557', $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('2014', true);
        $this->assertEquals('พ.ศ. 2557', $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('2014', true, 'พุทธศักราช');
        $this->assertEquals('พุทธศักราช 2557', $actual);
        
        $actual = StringHelper::getBuddhistCalendarYear('2014', true, array());
        $this->assertEquals('2557', $actual);
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
    public function testTranslationDateFormats(){
        $inputArr = array(
                '30-June',
                'July',
                '7 January 2011' 
        );
        $expectedArr = array(
                '30 มิถุนายน',
                'กรกฎาคม',
                '7 มกราคม พ.ศ. 2554' 
        );
        foreach($inputArr as $key => $value){
            $actual = StringHelper::translateDateStringToThai($value);
            $this->assertEquals($expectedArr[$key], $actual);
        }
    }
}
