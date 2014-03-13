<?php

namespace Kamolcu;

class StringHelper {
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
    protected static $thaiDays = array(
    		self::SUNDAY => 'อา.',
    		self::MONDAY => 'จ.',
    		self::TUESDAY => 'อ.',
    		self::WEDNESDAY => 'พ.',
    		self::THURSDAY => 'พฤ.',
    		self::FRIDAY => 'ศ.',
    		self::SATURDAY => 'ส.'
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
    protected static $thaiShortMonths = array(
    		self::JANUARY => "ม.ค.",
    		self::FEBRUARY => "ก.พ.",
    		self::MARCH => "มี.ค.",
    		self::APRIL => "เม.ย.",
    		self::MAY => "พ.ค.",
    		self::JUNE => "มิ.ย.",
    		self::JULY => "ก.ค.",
    		self::AUGUST => "ส.ค.",
    		self::SEPTEMBER => "ก.ย.",
    		self::OCTOBER => "ต.ค.",
    		self::NOVEMBER => "พ.ย.",
    		self::DECEMBER => "ธ.ค."
    );
    protected static $thaiNumbers = array(
    	0 => '๐',
    	1 => '๑',
    	2 => '๒',
    	3 => '๓',
    	4 => '๔',
    	5 => '๕',
    	6 => '๖',
    	7 => '๗',
    	8 => '๘',
    	9 => '๙',
    );
    public static function translateDateStringToThai($inputString) {
        $output = '';
        if(is_string($inputString)){
            $datetime = strtotime($inputString);
            if($datetime){
                $output = strtoupper($inputString);
                foreach(self::$months as $key => $value){
                    $value = strtoupper($value);
                    $pos = strrpos($output, $value);
                    if($pos !== false){
                        $output = str_replace($value, self::$thaiMonths[$key], $output);
                        break;
                    }
                }
                foreach(self::$days as $key => $value){
                    $value = strtoupper($value);
                    $pos = strrpos($output, $value);
                    if($pos !== false){
                        $output = str_replace($value, self::$thaiDays[$key], $output);
                        break;
                    }
                }
                $output = str_replace('-', ' ', $output);
            }
        }
        return $output;
    }
    private static function getArrayValueMap($arrayMap, $arrayOutput, $inputValue) {
        // default return value
        $output = '';
        // handle index input
        foreach($arrayOutput as $key => $value){
            if($key === $inputValue){
                return $value;
            }
        }
        // handle string input
        if(is_string($inputValue) && strlen($inputValue) > 0){
            $inputValue = strtoupper($inputValue);
            $inputLen = strlen($inputValue);
            foreach($arrayMap as $key => $value){
                if(strtoupper(substr($arrayMap[$key], 0, $inputLen)) === $inputValue && $arrayOutput[$key] !== ''){
                    return $arrayOutput[$key];
                }
            }
        }
        return $output;
    }
    public static function getThaiMonth($month) {
        return self::getArrayValueMap(self::$months, self::$thaiMonths, $month);
    }
    public static function getThaiDay($day) {
        return self::getArrayValueMap(self::$days, self::$thaiDays, $day);
    }
    public static function getBuddhistCalendarYear($yearInput, $withBuddhistYearPrefix = false, $prefix = 'พ.ศ.') {
        $output = '';
        if(is_numeric($yearInput) && is_int(intVal($yearInput))){
            $yearOutput = intVal($yearInput) + 543;
            if(is_bool($withBuddhistYearPrefix) && $withBuddhistYearPrefix && is_string($prefix)){
                $output = $prefix . ' ' . $yearOutput;
            }else{
                $output = $yearOutput;
            }
        }
        return $output;
    }
    // TODO: Thai numberic chars
}