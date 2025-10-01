<?php

namespace App\Http\Controllers;

use App\Services\SmsService;

use App\Models\User;

use App\Models\InstituteInfoModel;
use App\Models\InstituteAcademicYearsModel;
use App\Models\InstituteClassesModel;
use App\Models\InstituteShiftsModel;
use App\Models\InstituteSectionsModel;
use App\Models\InstituteGroupsModel;

use Illuminate\Http\Request;
use App\Http\Requests\UserEmployeeFormRequest; // Form Submit Request goes & Validated

class UserEmployeeController extends Controller
{

    // For SMS Service to Work
    protected $smsService;
    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function index()
    {
        $employees = User::where('status', 'active')
                ->whereIn('role', ['teacher', 'accountant', 'librarian', 'security', 'guest','admin'])->get();
        return view('admin/employee/index', compact('employees'));
    }

    public function create()
    {
        $years = InstituteAcademicYearsModel::all();
        $institutes = InstituteInfoModel::all();
        $shifs = InstituteShiftsModel::all();
        $classes = InstituteClassesModel::all();
        $sections = InstituteSectionsModel::all();
        $groups = InstituteGroupsModel::all();
        return view('admin/employee/create',compact(
            'years',
            'institutes',
            'shifs',
            'classes',
            'sections',
            'groups',
        ));
    }

    public function store(UserEmployeeFormRequest $request)
    // public function store(Request $request)
    {
        // Used for Mass Validation `apps/app/Http/Requests/UserRequest.php`
        $validatedData = $request->validated();

        $user = User::create($validatedData);

        if($request->hasFile('profile_pic'))
        {
            $path = $request->file('profile_pic')->store('img/users','public');
            $user->update(['profile_pic' => $path]);
        }

        if($request->hasFile('signature'))
        {
            $path = $request->file('signature')->store('img/signature','public');
            $user->update(['signature' => $path]);
        }

        return redirect()->route('employee.index');
    }


    public function show(String $id)
    {
        // $user = User::find($user);
        // return view('users-show',compact('user'));
    }

    public function edit(String $id)
    {
        $data = User::find($id);
        return view('admin.employee.edit', compact('data'));
    }

    public function update(UserEmployeeFormRequest $request, String $id)
    {
        // The request is already validated by the UserRequest.php
        $validatedData = $request->validated();

        $update = User::where('id',$id)
                ->update($validatedData);

        // $update = $User->update($validatedData);

        if($update){
            return redirect()->route('employee.index');
        }

    }

    public function destroy(String $id)
    {
        $destroy = User::destroy($id);

        if($destroy){
            return redirect()->route('employee.index');
        }
    }

    // Create User SMS Form
    public function createUserSMS(String $id)
    {
        $data = User::find($id);
        return view('admin.employee.sms', compact('data'));
    }

    // Send User SMS
    public function sendUserSMS(Request $request)
    {
        $number = $request->contact_sms;
        $message = $request->message;

        $this->smsService->sendSMS( $number, $message, now() );

        return back();
    }

    public function short_by_class(string $class)
    {
        $records = User::where('class', $class)->get();
        $class_list = InstituteClassesModel::orderBy('id','asc')->get();
        return view('admin.employee.index',compact('records','class_list'));
    }

    public function admit_card_print(string $id)
    {
        $record = User::find($id);
        return view('admin.employee.print-admit-card.',compact('record'));
    }

    public function seat_sticker_print(string $id)
    {
        $record = User::find($id);
        return view('admin.employee',compact('record'));
    }

    public function id_card_print(string $id)
    {
        $record = User::find($id);
        return view('admin.employee',compact('record'));
    }
}
