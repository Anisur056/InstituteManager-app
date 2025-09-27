<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tbl_classe;
use App\Models\StudentModel;
use App\Models\Tbl_attendance_log;
use App\Models\Tbl_finger_Device;

use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Services\SmsService;

class TblFingerDevice extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

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

    // Get All Device Information
    public function getDeviceInfo()
    {
        $device = Tbl_finger_Device::all();
        return view('admin.device.info', compact('device'));
    }

    // All User Related ====================>
    public function getDeviceUser()
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
            return back()->with('message', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

        return view('admin.device.user', compact('users'));
    }

    public function createSingleUser(String $id)
    {

        $device = Tbl_finger_Device::find(1);
        $studentID = StudentModel::find($id);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();



            $zk->setUser(
                $studentID->id,         // Unique ID for the device (max 65535)
                $studentID->id,         // Employee ID for the device
                $studentID->name_en,    // User Name
                '',                     // Password (optional)
                '0',                    // User level
                $studentID->rfid_card,  // Card number (optional)
            );


            // Tbl_attendance_log::chunk(100, function ($students) use ($zk) {
            //     foreach ($students as $s) {
            //         $zk->setUser(
            //             (int) $s->id,          // Unique ID for the device (max 65535)
            //             (string) $s->id, // Employee ID for the device
            //             (string) $s->name_en,
            //             '',                      // Password (optional)
            //             0,   // User level
            //             (int) $s->rfid_card // Card number (optional)
            //         );
            //     }
            // });

            $zk->enableDevice();
            $zk->disconnect();
            return back()->with('message','Users successfully synchronized to ZKTeco device.');
        } else {
            return back()->with('message','Failed to connect to ZKTeco device.');
            die();
        }
    }

    public function removeSingleUser(String $id)
    {

        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $zk->removeUser($id);

            $zk->enableDevice();
            $zk->disconnect();
            return back()->with('message','Users No: '.$id.' Deleted successfully.');
        } else {
            return back()->with('message','Failed to connect to ZKTeco device.');
            die();
        }
    }

    public function destroyAllUser()
    {

        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $zk->clearUsers();

            $zk->enableDevice();
            $zk->disconnect();
            return back()->with('message','All User Deleted.');
        } else {
            return back()->with('message','Failed to connect to ZKTeco device.');
            die();
        }
    }
    // All User Related ====================>




    // All Attendance Log Related ====================>
    public function getDeviceAttendanceLog()
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $attendance_logs = $zk->getAttendance();

            $zk->enableDevice();
            $zk->disconnect();
        } else {
            return back()->with('message', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

        return view('admin.device.log', compact('attendance_logs'));

    }

    // testing
    // public function getDeviceAttendanceLog(){
    //     return $this->smsService->sendLogSMS( '1', now() );
    // }

    public function syncDeviceAttendanceLog()
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {

            $zk->disableDevice();

            $attendance_logs = $zk->getAttendance();

            // Check if there are any logs to process
            if ($attendance_logs && count($attendance_logs) > 0) {
                $synced_count = 0;

                foreach ($attendance_logs as $log) {

                    // Check if the log already exists in the database to prevent duplicates
                    $existing_log = Tbl_attendance_log::where('user_id', $log['id'])
                        ->where('timestamp', $log['timestamp'])
                        ->first();

                    if (!$existing_log) {
                        // --- 5. Save Data to Database ---
                        // Create a new record in the attendance table
                        Tbl_attendance_log::create([
                            'uid' => $log['uid'],
                            'user_id' => $log['id'],
                            'state' => $log['state'],
                            'timestamp' => $log['timestamp'],
                            'type' => $log['type']
                        ]);

                        // Send SMS
                        // $this->smsService->sendLogSMS( $log['id'], $log['timestamp'] );

                        // --- Determine if it's ARRIVAL or LEAVE ---
                        $logDate = date('Y-m-d', strtotime($log['timestamp']));

                        // Count how many logs already exist for this student on this date
                        $countForDay = Tbl_attendance_log::where('user_id', $log['id'])
                            ->whereDate('timestamp', $logDate)
                            ->count();

                        if ($countForDay == 1) {
                            // First log of the day → Arrival
                            $this->smsService->sendArrivalSMS($log['id'], $log['timestamp']);
                        } elseif ($countForDay == 2) {
                            // Second log of the day → Leave
                            $this->smsService->sendLeaveSMS($log['id'], $log['timestamp']);
                        } //else {
                            // Extra punches (optional handling)
                            // Example: multiple leaves or late entries
                            // $this->smsService->sendLogSMS($log['id'], $log['timestamp']);
                        // }

                        $synced_count++;
                    }


                }
                $zk->enableDevice();
                $zk->disconnect();

                return back()->with('message', "$synced_count attendance records synced.");

            } else {
                $zk->enableDevice();
                $zk->disconnect();

                return back()->with('message','No new attendance records found on the device.');
            }
        } else {
            return back()->with('message', 'The ZKTeco device is not available. Please check the device power, network connection, or IP and port settings');
            die();
        }

    }

    public function exportDestroyLogs()
    {
        $device = Tbl_finger_Device::find(1);
        $zk = new ZKTeco($device->ip, $device->port);

        if ($zk->connect()) {
            $zk->disableDevice();

            $attendance_logs = $zk->getAttendance();

            $filename = 'attendance_logs_' . date('Y-m-d') . '.json';
            $path = 'zkteco/' . $filename;
            Storage::disk('local')->put($path, json_encode($attendance_logs, JSON_PRETTY_PRINT));

            $zk->clearAttendance();

            $zk->enableDevice();
            $zk->disconnect();
            return back()->with('message','All Logs Deleted.');
        } else {
            return back()->with('message','Failed to connect to ZKTeco device.');
        }

    }
    // All Attendance Log Related ====================>





}
