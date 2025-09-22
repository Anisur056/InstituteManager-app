<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tbl_classe;
use App\Models\Tbl_student;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use App\Models\Tbl_attendance_log;
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

    public function getDeviceUser()
    {
        $zk = new ZKTeco('192.168.1.105', 4370);

        $zk->connect();
        //SUCCESS: Connected to ZK device.<br><br>";

        $zk->disableDevice();
        // Device disabled.\n";

        $users = $zk->getUser();

        dd($users);

        // foreach ($users as $u) {

        // }

    }

    public function getDeviceAttendanceLog()
    { 
        // --- 1. Device Configuration ---
        $zk_ip = env('ZKTECO_DEVICE_IP'); // Replace with your ZKTeco device IP
        $zk_port = env('ZKTECO_DEVICE_PORT'); // Default ZKTeco device port
        
        // --- 2. Initialize the ZKTeco Library ---
        $zk = new ZKTeco($zk_ip, $zk_port);

        if ($zk->connect()) {
            // --- 4. Get and Process Attendance Data ---
            // Disable device to avoid new attendance logs while syncing
            $zk->disableDevice();
            
            // Get all attendance logs
            $attendance_logs = $zk->getAttendance();
            
            // Check if there are any logs to process
            if ($attendance_logs && count($attendance_logs) > 0) {
                $synced_count = 0;

                // --- 5. Save Logs to JSON File ---
                // Generate a unique filename with a timestamp
                $filename = 'attendance_logs_' . date('Y-m-d_H-i-s') . '.json';
                
                // Save the data to the storage/app/zkteco directory
                Storage::disk('local')->put('zkteco/' . $filename, json_encode($attendance_logs, JSON_PRETTY_PRINT));
            
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
                    $existing_log = Tbl_attendance_log::where('user_id', $log['id'])
                        ->where('timestamp', $log['timestamp'])
                        ->first();

                    if (!$existing_log) {
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
                    }
                }
                
                // --- 6. Clear Attendance Logs (Optional but Recommended) ---
                // After successful sync, clear the logs on the device to free up memory
                //$zk->clearAttendance(); 
                
                // --- 7. Re-enable the Device ---
                $zk->enableDevice();

                // --- 9. Disconnect from the Device ---
                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return response()->json([
                    'success' => true,
                    'message' => "Successfully synced {$synced_count} new attendance records.",
                ]);
            } else {
                $zk->enableDevice();

                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return response()->json([
                    'success' => true,
                    'message' => "No new attendance records found on the device.",
                ]);
            }
        } else {
            // Return a clear error message if the device connection fails.
            echo("The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings") ;
            die();
        }

    }

    public function syncDeviceAttendanceLog()
    { 
        // --- 1. Device Configuration ---
        $zk_ip = env('ZKTECO_DEVICE_IP'); // Replace with your ZKTeco device IP
        $zk_port = env('ZKTECO_DEVICE_PORT'); // Default ZKTeco device port
        
        // --- 2. Initialize the ZKTeco Library ---
        $zk = new ZKTeco($zk_ip, $zk_port);

        if ($zk->connect()) {
            // --- 4. Get and Process Attendance Data ---
            // Disable device to avoid new attendance logs while syncing
            $zk->disableDevice();
            
            // Get all attendance logs
            $attendance_logs = $zk->getAttendance();
            
            // Check if there are any logs to process
            if ($attendance_logs && count($attendance_logs) > 0) {
                $synced_count = 0;

                // --- 5. Save Logs to JSON File ---
                // Generate a unique filename with a timestamp
                $filename = 'attendance_logs_' . date('Y-m-d_H-i-s') . '.json';
                
                // Save the data to the storage/app/zkteco directory
                Storage::disk('local')->put('zkteco/' . $filename, json_encode($attendance_logs, JSON_PRETTY_PRINT));
            
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
                    $existing_log = Tbl_attendance_log::where('user_id', $log['id'])
                        ->where('timestamp', $log['timestamp'])
                        ->first();

                    if (!$existing_log) {
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
                    }
                }
                
                // --- 6. Clear Attendance Logs (Optional but Recommended) ---
                // After successful sync, clear the logs on the device to free up memory
                //$zk->clearAttendance(); 
                
                // --- 7. Re-enable the Device ---
                $zk->enableDevice();

                // --- 9. Disconnect from the Device ---
                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return response()->json([
                    'success' => true,
                    'message' => "Successfully synced {$synced_count} new attendance records.",
                ]);
            } else {
                $zk->enableDevice();

                if (isset($zk) && $zk->connect()) {
                    $zk->disconnect();
                }

                return response()->json([
                    'success' => true,
                    'message' => "No new attendance records found on the device.",
                ]);
            }
        } else {
            // Return a clear error message if the device connection fails.
            echo("The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings") ;
            die();
        }

    }

}
