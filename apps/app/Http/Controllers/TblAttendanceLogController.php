<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tbl_attendance_log;
use App\Models\Tbl_student;

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

    // public function showMonthlySheet(Request $request)
    // {
    //     $year = $request->input('year', now()->year);
    //     $month = $request->input('month', now()->month);

    //     return $attendances = Tbl_attendance_log::with('students')->get();

    //     // return view('admin.attendance-views.attendance-sheet', [
    //     //     'attendances' => $attendances,
    //     //     'year' => $year,
    //     //     'month' => $month,
    //     // ]);
    // }

    public function showMonthlySheet(Request $request)
    {
        // Get the requested year and month from the request, or default to the current month.
        // $year = $request->input('year', Carbon::now()->year);
        // $month = $request->input('month', Carbon::now()->month);

        $year = 2025;
        $month = 8;

        $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        // Get all users. We do this separately since we are not using relationships.
        $users = Tbl_student::all();

        // Fetch attendance records for the selected month.
        // We use a separate query and handle the data in the controller.
        $attendanceRecords = Tbl_attendance_log::whereBetween('timestamp', [$startOfMonth, $endOfMonth])
                                    ->get()
                                    ->groupBy('user_id');

        // Create a structured data array for the view.
        // This is where we manually map attendance data to each user.
        $attendanceData = [];
        foreach ($users as $user) {
            $userAttendance = $attendanceRecords[$user->id] ?? collect();
            $dailyRecords = [];

            // Loop through each day of the month to build the sheet.
            for ($day = 1; $day <= $endOfMonth->day; $day++) {
                $date = Carbon::createFromDate($year, $month, $day);
                // $record = $userAttendance->whereDate('timestamp', $date)->first();
                $record = $userAttendance->firstWhere('timestamp', $date->toDateString());

                $dailyRecords[$day] = $record ? $record->state : 'N';
            }

            $attendanceData[] = [
                'id' => $user->id,
                'user_name' => $user->name_en,
                'records' => $dailyRecords,
            ];
        }

        // Pass the data to the view.
        return view('admin.attendance.sheet', [
            'attendanceData' => $attendanceData,
            'daysInMonth' => $endOfMonth->day,
            'month' => $startOfMonth->format('F Y'),
        ]);

    }

    public function UploadAttendance(Request $request)
    {
        return view('admin/attendance/upload');
    }

    public function UploadAttendanceStore(Request $request)
    {
        // 1. Validate the file upload
        $request->validate([
            'json_file' => 'required|mimes:json|max:2048',
        ]);

        // 2. Get the uploaded file
        $file = $request->file('json_file');
        $jsonContent = file_get_contents($file->getRealPath());

        // 3. Decode the JSON content
        $data = json_decode($jsonContent, true);

        // 5. Loop through the data and insert into the database
        foreach ($data as $entry) {
            Tbl_attendance_log::create([
                'uid' => $entry['uid'],
                'user_id' => $entry['id'],
                'state' => $entry['state'],
                'timestamp' => $entry['timestamp'],
                'type' => $entry['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('attendance.upload')->with('success', 'Attendance logs uploaded successfully!');

    }
}
