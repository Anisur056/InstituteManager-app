<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SmsLogsModel;

use Illuminate\Http\Request;
use App\Services\SmsService;

class SmsLogsController extends Controller
{
    // For SMS Service to Work
    protected $smsService;
    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    // SMS Logs
    public function showLogs()
    {
        $smsLogs = SmsLogsModel::orderBy('id','desc')->paginate(20);
        return view('admin/sms/logs', compact('smsLogs'));
    }

    // Create User SMS Form
    public function createUserSMS(String $id)
    {
        $data = User::find($id);
        return view('admin/sms/smsSingle', compact('data'));
    }

    // Send User SMS
    public function sendUserSMS(Request $request)
    {
        $number = $request->contact_sms;
        $message = $request->message;

        $this->smsService->sendSMS( $number, $message, now() );

        return back();
    }
}
