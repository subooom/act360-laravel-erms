<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  public function calculateAge($birthDate){
    return Carbon::parse($birthDate)->age . ' years';
  }

  public function calculateEmployedFor($date){
    $days = Carbon::parse($date)->diffInDays(Carbon::now());
    $year = floor($days/365);
    $month = floor(($days%365)/30.5);
    $d = floor($days - ($year * 365 + $month * 30.5));
    return $year . ' years ' . $month . ' months ' .$d . ' days';
  }
}
