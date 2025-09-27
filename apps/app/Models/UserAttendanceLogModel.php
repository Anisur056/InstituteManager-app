<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_attendance_log extends Model
{
    protected $table = 'user_attendance_logs';
    protected $guarded = [];

    public function students(){
        return $this->belongsTo(Tbl_student::class);
    }
}
