<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'tbl_students';

    protected $guarded = [];

    public function attendanceLogs(){
        return $this->hasMany(Tbl_attendance_log::class);
    }
}
