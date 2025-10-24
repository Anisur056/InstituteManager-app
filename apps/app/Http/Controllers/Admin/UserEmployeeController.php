<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\InstituteInfoModel;
use App\Models\InstituteAcademicYearsModel;
use App\Models\InstituteClassesModel;
use App\Models\InstituteShiftsModel;
use App\Models\InstituteSectionsModel;
use App\Models\InstituteGroupsModel;

use Illuminate\Http\Request;
use App\Services\SmsService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $records = User::where('status', 'active')
                ->whereIn('role', ['teacher', 'accountant', 'librarian', 'security', 'guest','admin'])->get();

        return view('admin/employee/index', compact('records'));
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
    {
        // Used for Mass Validation `apps/app/Http/Requests/UserRequest.php`
        $validatedData = $request->validated();

        if ($request->filled('password'))
        {
            $validatedData['password'] = Hash::make($request->password);
        }

        if($request->hasFile('profile_pic'))
        {
            $path = $request->file('profile_pic')->store('img/users','public');
            $validatedData['profile_pic'] = $path;
        }

        if($request->hasFile('signature'))
        {
            $path = $request->file('signature')->store('img/signature','public');
            $validatedData['signature'] = $path;
        }

        $user = User::create($validatedData);

        if($user){
            return redirect()->route('employee.index');
        }
    }

    public function show(String $id)
    {
        $data = User::findOrFail($id);
        return view('admin/employee/show',compact('data'));
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

        // Check if password is filled, then change. Empty For Unchange
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }else{
            unset($validatedData['password']);
        }

        $user = User::findOrFail($id);

        // If Profile Pic set then upload image & Update path
        if($request->hasFile('profile_pic'))
        {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $path = $request->file('profile_pic')->store('img/users','public');
            $validatedData['profile_pic'] = $path;
        }

        // If Signature Pic set then upload image & Update path
        if($request->hasFile('signature'))
        {
            if ($user->signature) {
                Storage::disk('public')->delete($user->signature);
            }

            $path = $request->file('signature')->store('img/signature','public');
            $validatedData['signature'] = $path;
        }

        // Update Validated Data
        $user->update($validatedData);

        if($user){
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

    public function exEmployee()
    {
        $records = User::whereIn('status', ['disable', 'tc', 'exit'])->get();
        return view('admin/employee/ex', compact('records'));
    }
}
