<?php

//use Illuminate\Foundation\Inspiring;
//use Illuminate\Support\Facades\Artisan;
//
//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    DB::table('coins')->update(['daycoin' => false]);
})->dailyAt('00:00');
