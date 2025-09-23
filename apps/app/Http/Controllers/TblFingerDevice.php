<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tbl_classe;
use App\Models\Tbl_student;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use App\Models\Tbl_attendance_log;
use App\Models\Tbl_finger_Device;
use Illuminate\Support\Facades\Storage;

class TblFingerDevice extends Controller
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

    public function getDeviceInfo(Tbl_finger_Device $device)
    {
        $device = Tbl_finger_Device::all();
        return view('admin.device.info', compact('device'));
    }

    public function getDeviceUser(Tbl_finger_Device $device)
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $users = $zk->getUser();

            $zk->enableDevice();
            if (isset($zk) && $zk->connect()) {
                $zk->disconnect();
            }
        } else {
            return view('admin.device.user')->with('error', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

        return view('admin.device.user', compact('users'));
    }

    public function getDeviceAttendanceLog(Tbl_finger_Device $device)
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $attendance_logs = $zk->getAttendance();

            $zk->enableDevice();
            if (isset($zk) && $zk->connect()) {
                $zk->disconnect();
            }
        } else {
            return view('admin.device.user')->with('error', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

        return view('admin.device.log', compact('attendance_logs'));

    }

    public function syncDeviceAttendanceLog()
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {

            $zk->disableDevice();

            // Get all attendance logs
            $attendance_logs = $zk->getAttendance();

            // Check if there are any logs to process
            if ($attendance_logs && count($attendance_logs) > 0) {
                $synced_count = 0;

                // Get the current hour in 24-hour format
                $current_hour = (int)date('H');

                // Check if the current hour is 23 (11 PM)
                if ($current_hour === 23) {
                    // Generate a filename for the daily attendance logs
                    // The filename will be in the format attendance_logs_YYYY-MM-DD.json
                    $filename = 'attendance_logs_' . date('Y-m-d') . '.json';

                    // Specify the path to the directory where the file will be saved
                    $path = 'zkteco/' . $filename;

                    // Save the attendance logs to the JSON file
                    // json_encode() is used to convert the PHP array to a JSON string
                    // JSON_PRETTY_PRINT makes the JSON output human-readable with proper indentation
                    Storage::disk('local')->put($path, json_encode($attendance_logs, JSON_PRETTY_PRINT));

                    // --- 6. Clear Attendance Logs (Optional but Recommended) ---
                    // After successful sync, clear the logs on the device to free up memory
                    // $zk->clearAttendance();

                }

                // Loop through each attendance log
                foreach ($attendance_logs as $log) {
                    // The `getAttendance()` method returns an array for each log
                    // with keys like `uid`, `id`, `state`, `timestamp`, `type`
                    // "uid" => 1      /* serial number of the attendance */
                    // "id" => "1"     /* user id of the application */
                    // "state" => 1    /* the authentication type, 1 for Fingerprint, 4 for RF Card etc */
                    // "timestamp" => "2020-05-27 21:21:06" /* time of attendance */
                    // "type" => 255   /* attendance type, like check-in, check-out, overtime-in, overtime-out, break-in & break-out etc.
                    // if attendance type is none of them, it  gives  255. */

                    // Check if the log already exists in the database to prevent duplicates
                    // $existing_log = Tbl_attendance_log::where('user_id', $log['id'])
                    //     ->where('timestamp', $log['timestamp'])
                    //     ->first();

                    // if (!$existing_log) {
                        // --- 5. Save Data to Database ---
                        // Create a new record in the attendance table
                        Tbl_attendance_log::create([
                            'user_id' => $log['id'],
                            'uid' => $log['uid'],
                            'state' => $log['state'],
                            'timestamp' => $log['timestamp'],
                            'type' => $log['type']
                        ]);

                        $synced_count++;
                    // }


                }

                // --- 7. Re-enable the Device ---
                $zk->enableDevice();

                // --- 9. Disconnect from the Device ---
                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return back();

                // return response()->json([
                //     'success' => true,
                //     'message' => "Successfully synced {$synced_count} new attendance records.",
                // ]);
            } else {
                $zk->enableDevice();

                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return back()->with('message','No new attendance records found on the device.');
            }
        } else {
            return view('admin.device.user')->with('error', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

    }

}
