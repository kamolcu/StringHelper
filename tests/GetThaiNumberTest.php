<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class GetThaiNumberTest extends \PHPUnit_Framework_TestCase{
    public function testGetThaiNumber(){
        $actual = StringHelper::getThaiNumber(array());
        $this->assertEquals('', $actual);
        $actual = StringHelper::getThaiNumber('');
        $this->assertEquals('', $actual);
        $actual = StringHelper::getThaiNumber('xxx yyy');
        $this->assertEquals('xxx yyy', $actual);
        $actual = StringHelper::getThaiNumber('2x09');
        $this->assertEquals('๒x๐๙', $actual);
        
        $actual = StringHelper::getThaiNumber(-105);
        $this->assertEquals('-๑๐๕', $actual);
        $actual = StringHelper::getThaiNumber(1);
        $this->assertEquals('๑', $actual);
        $actual = StringHelper::getThaiNumber(1986);
        $this->assertEquals('๑๙๘๖', $actual);
        $actual = StringHelper::getThaiNumber('1');
        $this->assertEquals('๑', $actual);
        $actual = StringHelper::getThaiNumber('013');
        $this->assertEquals('๐๑๓', $actual);
        $actual = StringHelper::getThaiNumber('2,500');
        $this->assertEquals('๒,๕๐๐', $actual);
        $actual = StringHelper::getThaiNumber('2014');
        $this->assertEquals('๒๐๑๔', $actual);
        $actual = StringHelper::getThaiNumber('-7126');
        $this->assertEquals('-๗๑๒๖', $actual);
        
        $testDataArray = array(
                0,
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9 
        );
        foreach($testDataArray as $key => $value){
            $actual = StringHelper::getThaiNumber($value);
            $this->assertEquals(StringHelper::getThaiNumberArray()[$key], $actual);
        }
    }
}