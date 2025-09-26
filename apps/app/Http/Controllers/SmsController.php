<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\SmsService;

use App\Models\SmsModel;

class SmsController extends Controller
{

    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }



    public function testSMS(String $number)
    {
        $this->smsService->sendSMS( $number, 'This is a testing SMS', now() );

        return back();
    }

}
