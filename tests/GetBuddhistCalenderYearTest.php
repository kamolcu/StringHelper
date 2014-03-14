<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class GetBuddhistCalendarYear extends \PHPUnit_Framework_TestCase{
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
}