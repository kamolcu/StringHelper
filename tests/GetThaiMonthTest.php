<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/StringHelper.php';

use Kamolcu\StringHelper;
class GetThaiMonthTest extends \PHPUnit_Framework_TestCase{
    public function testMonthNameAsIndex(){
    	$actual = StringHelper::getThaiMonth(0);
    	$this->assertEquals('', $actual);
    
    	$actual = StringHelper::getThaiMonth(15);
    	$this->assertEquals('', $actual);
    
    	$actual = StringHelper::getThaiMonth(-1);
    	$this->assertEquals('', $actual);
    
    	$actual = StringHelper::getThaiMonth(-1.0);
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
    public function testMonthNameAsString(){
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
    public function testMonthNameAsArray(){
    	$actual = StringHelper::getThaiMonth(array());
    	$this->assertEquals('', $actual);
    
    	$actual = StringHelper::getThaiMonth(array(
    			'a',
    			2
    	));
    	$this->assertEquals('', $actual);
    }
}