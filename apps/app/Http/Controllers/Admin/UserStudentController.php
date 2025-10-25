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
use App\Http\Requests\UserStudentFormRequest; // Form Submit Request goes & Validated

class UserStudentController extends Controller
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
                    ->where('class', 'Play')
                    ->get();
        $classes = InstituteClassesModel::all();
        return view('admin/students/index', compact('records','classes'));
    }

    public function create()
    {

        $classes = InstituteClassesModel::all();
        $academicYear = InstituteAcademicYearsModel::orderBy('id', 'desc')->first();

        return view('admin/students/create',compact(
            'classes',
            'academicYear',
        ));
    }

    public function store(UserStudentFormRequest $request)
    // public function store(Request $request)
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

        $user = User::create($validatedData);

        if($user){
            return redirect()->route('students.index');
        }

    }


    public function show(String $id)
    {
        $data = User::findOrFail($id);
        return view('admin/students/show',compact('data'));
    }

    public function edit(String $id)
    {

        $data = User::find($id);
        $classes = InstituteClassesModel::all();
        return view('admin/students/edit', compact('data','classes'));
    }

    public function update(UserStudentFormRequest $request, String $id)
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


        // Update Validated Data
        $user->update($validatedData);

        if($user){
            return redirect()->route('students.index');
        }
    }

    public function destroy(String $id)
    {
        $destroy = User::destroy($id);

        if($destroy){
            return redirect()->route('students.index');
        }
    }

    public function shortByClass(string $class)
    {
        $records = User::whereIn('status', ['active'])
                    ->where('class', $class)
                    ->get();
        $classes = InstituteClassesModel::all();
        return view('admin/students/index',compact('records','classes'));
    }

    public function exStudents()
    {
        $records = User::whereIn('status', ['disable','tc','exam-complete','exit'])->get();
        return view('admin/students/ex', compact('records'));
    }

    // public function admit_card_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/print-admit-card.',compact('record'));
    // }

    // public function seat_sticker_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/',compact('record'));
    // }

    // public function id_card_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/',compact('record'));
    // }
}
