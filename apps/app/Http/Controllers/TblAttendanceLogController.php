<?php

namespace App\Http\Controllers;

use App\Models\Tbl_attendance_log;
use Illuminate\Http\Request;

class TblAttendanceLogController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
    }

    public function show(Tbl_attendance_log $tbl_attendance_log)
    {

    }

    public function edit(Tbl_attendance_log $tbl_attendance_log)
    {

    }

    public function update(Request $request, Tbl_attendance_log $tbl_attendance_log)
    {

    }

    public function destroy(Tbl_attendance_log $tbl_attendance_log)
    {

    }

    public function showMonthlySheet(Request $request)
    {
        $year = $request->input('year', now()->year);
        $month = $request->input('month', now()->month);

        $attendances = Tbl_attendance_log::orderBy('id','asc')->get();

        return view('admin.attendance-views.attendance-sheet', [
            'attendances' => $attendances,
            'year' => $year,
            'month' => $month,
        ]);
    }
}
