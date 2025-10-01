<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getUsersCount()
    {
        $students = User::where([
                ['status','=','active'],
                ['role','=','student'],
            ])->count();

        $employee = User::where('status', 'active')
                ->whereIn('role', ['teacher', 'accountant', 'librarian', 'security', 'guest'])
                ->count();

        $admin = User::where([
                ['status','=','active'],
                ['role','=','admin'],
            ])->count();


        // $leave = User::where('status','LEAVE')->count();
        // $tc = User::where('status','TC')->count();
        // $board_exam_complete = User::where('status','BOARD-EXAM-COMPLETE')->count();


        return view('admin.dashboard',compact(
            'students',
            'employee',
            'admin',
        ));

    }
}
