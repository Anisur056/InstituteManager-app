<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tbl_attendance_log;
use App\Models\Tbl_student;
use App\Models\Tbl_classe;
use Rats\Zkteco\Lib\ZKTeco;

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

    public function getDeviceUser(Request $request)
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
        $zk = new ZKTeco('192.168.1.105', 4370);

        $zk->connect();
        echo "SUCCESS: Connected to ZK device.<br><br>";

        $zk->disableDevice();
        echo "Device disabled.<br><br>";

        $users = $zk->getUser();

        // dd($users);

        $zk->enableDevice();
        echo "Device enabled.<br><br>";

        $zk->disconnect();
        echo "Disconnected from ZK device.<br><br>";

    }

}
