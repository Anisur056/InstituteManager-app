<?php

namespace App\Http\Controllers;
use App\Models\SmsLogsModel;

class SmsLogsController extends Controller
{
    public function showLogs()
    {
        $smsLogs = SmsLogsModel::orderBy('id','desc')->paginate(20);
        return view('admin/sms/logs', compact('smsLogs'));
    }
}
