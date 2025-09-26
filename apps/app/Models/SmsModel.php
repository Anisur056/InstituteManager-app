<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsModel extends Model
{
    protected $table = 'sms_logs';

    protected $guarded = [];

    // public function attendanceLogs(){
    //     return $this->hasMany(Tbl_attendance_log::class);
    // }
}
