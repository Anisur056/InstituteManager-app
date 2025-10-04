<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class DashboardController extends Controller
{
    public function getUsersCount()
    {
        $students = User::where([
                ['status','=','active'],
                ['role','=','student'],
            ])->count();

        $employee = User::where('status', 'active')
                ->whereIn('role', ['teacher', 'accountant', 'librarian', 'security', 'guest','admin'])
                ->count();

        try {
            $smsResponse = Http::get('https://bulksmsbd.net/api/getBalanceApi?api_key=Kdan9bcjkwFAPLHNyaBR');
            $data = $smsResponse->json();
            if (isset($data['balance'])) {
                $smsBalance = $data['balance'];
            } else {
                $smsBalance = 'API Error: ' . ($data['error_message'] ?? 'Unknown');
            }
        } catch (ConnectionException $e) {
            $smsBalance = 'No Internet or DNS Error.';
        } catch (\Exception $e) {
            $smsBalance = 'An unexpected error occurred.';
        }

        return view('admin.dashboard',compact(
            'students',
            'employee',
            'smsBalance',
        ));

    }
}
