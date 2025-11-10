<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\InstituteAcademicYearsModel;
use App\Models\InstituteInfoModel;
use App\Models\InstituteBranchModel;
use App\Models\InstituteDivisionModel;
use App\Models\InstituteClassesModel;
use App\Models\InstituteShiftsModel;
use App\Models\InstituteSectionsModel;
use App\Models\InstituteGroupsModel;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserStudentFormRequest; // Form Submit Request goes & Validated

class UserStudentController extends Controller
{

    private function getInstituteData()
    {
        return [
            'academicYear'     => InstituteAcademicYearsModel::orderBy('id', 'desc')->get(),
            'instituteInfo'     => InstituteInfoModel::all(),
            'instituteBranch'   => InstituteBranchModel::all(),
            'instituteDivision' => InstituteDivisionModel::all(),
            'classes'           => InstituteClassesModel::all(),
            'shifts'            => InstituteShiftsModel::all(),
            'sections'          => InstituteSectionsModel::all(),
            'groups'            => InstituteGroupsModel::all(),
        ];
    }

    public function index(Request $request)
    {

        $name = $request->input('name', '');
        $roll = $request->input('roll', '');
        $institute_name = $request->input('institute_name', '');
        $branch = $request->input('branch', '');
        $division = $request->input('division', '');
        $class = $request->input('class', 'Play');
        $shift = $request->input('shift', '');
        $section = $request->input('section', '');
        $group = $request->input('group', '');

        $users = User::where('role', 'student')
                    ->where('institute_name', $institute_name)
                    ->orWhere('branch', $branch)
                    ->orWhere('division', $division)
                    ->orWhere('class', $class)
                    ->orWhere('shift', $shift)
                    ->orWhere('section', $section)
                    ->orWhere('group', $group)
                    ->get();

        $data = $this->getInstituteData();
        return view('admin.students.index', array_merge($data, compact('users')));
    }

    public function create()
    {
        $user = null;
        $data = $this->getInstituteData();
        $registration_id = Carbon::now()->format('ymdhis') . '-' . random_int(100000, 999999);
        return view('admin.students.create', array_merge($data, compact('user','registration_id')));
    }

    public function store(UserStudentFormRequest $request)
    {
        // Used for Mass Validation `apps/app/Http/Requests/UserRequest.php`
        $validatedData = $request->validated();

        $fileFields = [
            'profile_pic',
            'birth_certificate',
            'vaccination_card',
            'father_profile_pic',
            'father_nid_pic',
            'mother_profile_pic',
            'mother_nid_pic',
            'local_guardian_profile_pic',
            'local_guardian_nid_pic',
            'previous_institute_certificate',
            'signature'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('admin/img/users', 'public');
                $validatedData[$field] = $path;
            }
        }

        if ($request->filled('password'))
        {
            $validatedData['password'] = Hash::make($request->password);
        }


        $validatedData['roll'] = 'student';

        $user = User::create($validatedData);

        if($user){
            return redirect()->route('students.index');
        }

    }

    public function show(String $id)
    {
        $data = User::findOrFail($id);
        return view('admin.students.show',compact('data'));
    }

    public function edit(String $id)
    {
        $user = User::find($id);
        $data = $this->getInstituteData();
        $registration_id = null;
        return view('admin.students.edit', array_merge($data, compact('user','registration_id')));
    }

    public function update(UserStudentFormRequest $request, String $id)
    {
        // Used for Mass Validation `apps/app/Http/Requests/UserRequest.php`
        $validatedData = $request->validated();

        $user = User::findOrFail($id);

        $fileFields = [
            'profile_pic',
            'birth_certificate',
            'vaccination_card',
            'father_profile_pic',
            'father_nid_pic',
            'mother_profile_pic',
            'mother_nid_pic',
            'local_guardian_profile_pic',
            'local_guardian_nid_pic',
            'previous_institute_certificate',
            'signature'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($user->$field) {
                    Storage::disk('public')->delete($user->$field);
                }

                // Store new file
                $path = $request->file($field)->store('admin/img/users', 'public');
                $validatedData[$field] = $path;
            }
        }

        // Check if password is filled, then change. Empty For Unchange
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }else{
            unset($validatedData['password']);
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

    // Index Online Admission
    public function indexOnlineAdmission()
    {
        $records = User::whereIn('status', ['pending'])->get();
        return view('admin/students/indexOnlineAdmission', compact('records'));
    }

    // Approve Online Admission
    public function approvedOnlineAdmission(String $reg)
    {
        $user = User::where('registration_id', $reg)->first();
        $user->update(['status' => 'active']);
        if($user){ return redirect()->route('students.index'); }
    }

    // Ex Student List
    public function exStudents()
    {
        $records = User::whereIn('status', ['disable','tc','exam-complete','exit'])->get();
        return view('admin/students/ex', compact('records'));
    }

    // public function shortByClass(string $class)
    // {
    //     $records = User::whereIn('status', ['active'])
    //                 ->where('class', $class)
    //                 ->get();
    //     $classes = InstituteClassesModel::all();
    //     return view('admin/students/index',compact('records','classes'));
    // }

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
