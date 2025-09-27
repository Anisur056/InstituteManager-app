<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\SmsModel;
use App\Models\StudentModel;

class SmsService
{
    // SMS Getway Bulksmsbd.com. 1st parameter Receive Number, 2nd Message Body, 3rd Sending Time.
    public function sendSMS(String $number, String $message, String $timestamp)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "Kdan9bcjkwFAPLHNyaBR";
        $senderid = "8809617624990";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $responseArray = json_decode($response);

        if($responseArray->response_code === 202)
        {
            SmsModel::create([
                'send_to' => $number,
                'send_sms' => $message,
                'timestamps' => $timestamp,
                'response_code' => $responseArray->response_code,
                'message_id' => $responseArray->message_id,
                'success_message' => $responseArray->success_message,
                'error_message' => $responseArray->error_message,
            ]);
        }else{
            SmsModel::create([
                'response_code' => $responseArray->response_code,
                'success_message' => $responseArray->success_message,
                'error_message' => $responseArray->error_message,
            ]);
        }
    }

    // Send SMS For Arrival Log
    public function sendArrivalSMS(String $id, String $timestamp)
    {
        $carbonInstance = Carbon::parse($timestamp);
        $date = $carbonInstance->toDateString();
        $time = $carbonInstance->format('H:i:s');

        $studentData = StudentModel::select('contact_sms')->find($id);
        $number = $studentData->contact_sms;
        $message = "আপনার সন্তান মাদ্রাসায় উপস্থিত। তারিখ: $date, সময়: $time";

        // Send Message method inside this Service Class
        $this->sendSMS($number, $message, $timestamp);
    }

    // Send SMS For Leave Log
    public function sendLeaveSMS(String $id, String $timestamp)
    {
        $carbonInstance = Carbon::parse($timestamp);
        $date = $carbonInstance->toDateString();
        $time = $carbonInstance->format('H:i:s');

        $studentData = StudentModel::select('contact_sms')->find($id);
        $number = $studentData->contact_sms;
        $message = "আপনার সন্তান মাদ্রাসা ত্যাগ করেছেন। তারিখ: $date, সময়: $time";

        // Send Message method inside this Service Class
        $this->sendSMS($number, $message, $timestamp);
    }

}
