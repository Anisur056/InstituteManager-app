<?php

namespace App\Http\Controllers;

use App\Models\Tbl_student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function all_counts()
    {
        $active = Tbl_student::where('status','ACTIVE')->count();
        $in_active = Tbl_student::where('status','IN-ACTIVE')->count();
        $leave = Tbl_student::where('status','LEAVE')->count();
        $tc = Tbl_student::where('status','TC')->count();
        $board_exam_complete = Tbl_student::where('status','BOARD-EXAM-COMPLETE')->count();


        return view('admin.dashboard',compact(
            'active',
            'in_active',
            'leave',
            'tc',
            'board_exam_complete',
        ));

    }
}
