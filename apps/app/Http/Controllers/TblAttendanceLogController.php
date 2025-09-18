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
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        // Use Eloquent to fetch all users
        $users = Tbl_student::all();

        return $attendanceLogs = Tbl_attendance_log::whereBetween('timestamp', [$startDate, $endDate])
            ->get();

        $attendanceData = [];

        foreach ($users as $user) {
            $userAttendance = [
                'name' => $user->name_en,
                'days' => [],
            ];

            return $attendanceLogs = Tbl_attendance_log::whereBetween('timestamp', [$startDate, $endDate])
                ->get()
                ->keyBy('date');

            $currentDate = clone $startDate;
            while ($currentDate->lte($endDate)) {
                $status = 'N/A';
                if ($attendanceLogs->has($currentDate->toDateString())) {
                    $status = $attendanceLogs[$currentDate->toDateString()]->status;
                }
                $userAttendance['days'][$currentDate->format('j')] = $status;
                $currentDate->addDay();
            }

            $attendanceData[] = $userAttendance;
        }



        $daysInMonth = $startDate->daysInMonth;

        return view('admin/attendance/sheet', [
            'attendanceData' => $attendanceData,
            'daysInMonth' => $daysInMonth,
            'month' => $month,
            'year' => $year,
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
