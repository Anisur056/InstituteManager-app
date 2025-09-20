<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tbl_attendance_log;
use App\Models\Tbl_student;
use App\Models\Tbl_classe;

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
        // Get the requested year, month, class, and section from the request.
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        $class = $request->input('class', 'PLAY');
        $section = $request->input('section' ,'');

        // Define the start and end of the specified month.
        $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        // Query for users, applying filters if they exist.
        $userQuery = Tbl_student::query();
        $tbl_classe = Tbl_classe::select('name_en')->get();
        if ($class) {
            $userQuery->where('class', $class);
        }
        if ($section) {
            $userQuery->where('section', $section);
        }
        $users = $userQuery->get();

        // Fetch attendance records for the selected month and users.
        $attendanceRecords = Tbl_attendance_log::whereBetween('timestamp', [$startOfMonth, $endOfMonth])
                                    ->whereIn('user_id', $users->pluck('id'))
                                    ->get()
                                    ->groupBy('user_id');

        // Create a structured data array for the view.
        $attendanceData = [];
        foreach ($users as $user) {
            $userAttendance = $attendanceRecords[$user->id] ?? collect();
            $dailyRecords = [];

            // Initialize counters for total attendance statuses
            $totalPresent = 0;
            $totalAbsent = 0;
            $totalLeave = 0;

            // Loop through each day of the month.
            for ($day = 1; $day <= $endOfMonth->day; $day++) {
                $date = Carbon::createFromDate($year, $month, $day);
                $record = $userAttendance->firstWhere('timestamp', $date->toDateString());
                $status = $record ? $record->state : 'N';

                // Increment the counters based on the status
                switch ($status) {
                    case '4':
                        $totalPresent++;
                        break;
                    case 'N':
                        $totalAbsent++;
                        break;
                    case 'leave':
                        $totalLeave++;
                        break;
                }

                $dailyRecords[$day] = $status;
            }

            $attendanceData[] = [
                'id' => $user->id,
                'user_name' => $user->name_en,
                'records' => $dailyRecords,
                'total_present' => $totalPresent,
                'total_absent' => $totalAbsent,
                'total_leave' => $totalLeave,
            ];
        }

        // Calculate the previous and next month and year for navigation.
        $prevMonth = Carbon::createFromDate($year, $month, 1)->subMonth();
        $nextMonth = Carbon::createFromDate($year, $month, 1)->addMonth();

        // Pass all data and filters to the view.
        return view('admin.attendance.sheet', [
            'attendanceData' => $attendanceData,
            'daysInMonth' => $endOfMonth->day,
            'month' => $startOfMonth->format('F Y'),
            'year' => $year,
            'currentMonth' => $month,
            'prevMonthYear' => $prevMonth->year,
            'prevMonth' => $prevMonth->month,
            'nextMonthYear' => $nextMonth->year,
            'nextMonth' => $nextMonth->month,
            'class' => $class,
            'tbl_classe' => $tbl_classe,
            'section' => $section,
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
