<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zodiac extends Model
{
    //
	protected $table = "luckytoday";
    public $timestamps = false;
	public static $zodiacVars = [
			1 => 'الحمل',
			2 => 'الثور',
			3 => 'الجوزاء',
			4 => 'السرطان',
			5 => 'الأسد',
			6 => 'العذراء',
			7 => 'الميزان',
			8 => 'العقرب',
			9 => 'القوس',
			10 => 'الجدي',
			11 => 'الدلو',
			12 => 'الحوت',
		];
}
