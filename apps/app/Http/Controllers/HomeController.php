<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function all_counts()
    {
        $active = StudentModel::where('status','ACTIVE')->count();
        $in_active = StudentModel::where('status','IN-ACTIVE')->count();
        $leave = StudentModel::where('status','LEAVE')->count();
        $tc = StudentModel::where('status','TC')->count();
        $board_exam_complete = StudentModel::where('status','BOARD-EXAM-COMPLETE')->count();


        return view('admin.dashboard',compact(
            'active',
            'in_active',
            'leave',
            'tc',
            'board_exam_complete',
        ));

    }
}
