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
    public static function translateDateStringToThai($inputString) {
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
}