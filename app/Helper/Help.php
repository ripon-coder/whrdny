<?php 
namespace App\Helper;

use Illuminate\Support\Str;

class Help{
    public static function str($string,$limit = 50){
        return Str::limit($string, $limit, '');
    }

    public static function DaysCount($date){
        $currentDate = strtotime(date('Y-m-d'));
        $targetDate = strtotime($date);
        return $diffDays = ($targetDate - $currentDate) / (60 * 60 * 24);
    }
}