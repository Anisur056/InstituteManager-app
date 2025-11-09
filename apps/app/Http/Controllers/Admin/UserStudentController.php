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

        $user = null;
        $academicYear = InstituteAcademicYearsModel::orderBy('id', 'desc')->get();
        $instituteInfo = InstituteInfoModel::all();
        $instituteBranch = InstituteBranchModel::all();
        $instituteDivision = InstituteDivisionModel::all();
        $classes = InstituteClassesModel::all();
        $shifts = InstituteShiftsModel::all();
        $sections = InstituteSectionsModel::all();
        $groups = InstituteGroupsModel::all();
        $registration_id = Carbon::now()->format('ymdhis') . '-' . random_int(100000, 999999);

        return view('admin/students/create',compact(
            'user',
            'academicYear',
            'instituteInfo',
            'instituteBranch',
            'instituteDivision',
            'classes',
            'shifts',
            'sections',
            'groups',
            'registration_id',
        ));
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
        return view('admin/students/show',compact('data'));
    }

    public function edit(String $id)
    {

        $user = User::find($id);
        $academicYear = InstituteAcademicYearsModel::orderBy('id', 'desc')->get();
        $instituteInfo = InstituteInfoModel::all();
        $instituteBranch = InstituteBranchModel::all();
        $instituteDivision = InstituteDivisionModel::all();
        $classes = InstituteClassesModel::all();
        $shifts = InstituteShiftsModel::all();
        $sections = InstituteSectionsModel::all();
        $groups = InstituteGroupsModel::all();
        $registration_id = null;

        return view('admin/students/edit',compact(
            'user',
            'academicYear',
            'instituteInfo',
            'instituteBranch',
            'instituteDivision',
            'classes',
            'shifts',
            'sections',
            'groups',
            'registration_id',
        ));
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

    public function shortByClass(string $class)
    {
        $records = User::whereIn('status', ['active'])
                    ->where('class', $class)
                    ->get();
        $classes = InstituteClassesModel::all();
        return view('admin/students/index',compact('records','classes'));
    }

    public function indexOnlineAdmission()
    {
        $records = User::whereIn('status', ['pending'])->get();
        return view('admin/students/indexOnlineAdmission', compact('records'));
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
