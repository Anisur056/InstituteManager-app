<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getUsersCount()
    {
        $active = User::where('status','ACTIVE')->count();
        $in_active = User::where('status','IN-ACTIVE')->count();
        $leave = User::where('status','LEAVE')->count();
        $tc = User::where('status','TC')->count();
        $board_exam_complete = User::where('status','BOARD-EXAM-COMPLETE')->count();


        return view('admin.dashboard',compact(
            'active',
            'in_active',
            'leave',
            'tc',
            'board_exam_complete',
        ));

    }
}
