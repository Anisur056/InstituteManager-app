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
use App\Models\InstituteExamTermsModel;

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
        // 1. Get all search input parameters
        $institute_name = $request->input('institute_name');
        $branch = $request->input('branch');
        $division = $request->input('division');
        $class = $request->input('class');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');

        // Check if ANY search parameter is provided (indicating a search was performed)
        $has_search_parameters = $institute_name || $branch || $division || $class || $shift || $section || $group;

        $users = collect([]); // Default to an empty collection

        if ($has_search_parameters) {
            // Only run the query if a search has been initiated (by providing at least one parameter)
            $users = User::where('role', 'student')
                        ->where('status', 'active')
                        ->when($institute_name, function($query, $institute_name) {
                            return $query->where('institute_name', $institute_name);
                        })
                        ->when($branch, function($query, $branch) {
                            return $query->where('branch', $branch);
                        })
                        ->when($division, function($query, $division) {
                            return $query->where('division', $division);
                        })
                        ->when($class, function($query, $class) {
                            return $query->where('class', $class);
                        })
                        ->when($shift, function($query, $shift) {
                            return $query->where('shift', $shift);
                        })
                        ->when($section, function($query, $section) {
                            return $query->where('section', $section);
                        })
                        ->when($group, function($query, $group) {
                            return $query->where('group', $group);
                        })
                        ->get();
        }

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

    // Index Online Admission ==================================
    public function indexOnlineAdmission()
    {
        $records = User::whereIn('status', ['pending'])->get();
        return view('admin/students/indexOnlineAdmission', compact('records'));
    }

    // Approve Online Admission ================================
    public function approvedOnlineAdmission(String $reg)
    {
        $user = User::where('registration_id', $reg)->first();
        $user->update(['status' => 'active']);
        if($user){ return redirect()->route('students.index'); }
    }

    // Ex Student List =========================================
    public function indexExStudents()
    {
        $records = User::whereIn('status', ['disable','tc','exam-complete','exit'])->get();
        return view('admin/students/ex', compact('records'));
    }

    // Admit Card Index ========================================
    public function indexStudentsAdmitCard(Request $request)
    {
        // 1. Get all search input parameters
        $institute_name = $request->input('institute_name');
        $branch = $request->input('branch');
        $division = $request->input('division');
        $class = $request->input('class');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');

        // Check if ANY search parameter is provided (indicating a search was performed)
        $has_search_parameters = $institute_name || $branch || $division || $class || $shift || $section || $group;

        $users = collect([]); // Default to an empty collection

        if ($has_search_parameters) {
            // Only run the query if a search has been initiated (by providing at least one parameter)
            $users = User::where('role', 'student')
                        ->where('status', 'active')
                        ->when($institute_name, function($query, $institute_name) {
                            return $query->where('institute_name', $institute_name);
                        })
                        ->when($branch, function($query, $branch) {
                            return $query->where('branch', $branch);
                        })
                        ->when($division, function($query, $division) {
                            return $query->where('division', $division);
                        })
                        ->when($class, function($query, $class) {
                            return $query->where('class', $class);
                        })
                        ->when($shift, function($query, $shift) {
                            return $query->where('shift', $shift);
                        })
                        ->when($section, function($query, $section) {
                            return $query->where('section', $section);
                        })
                        ->when($group, function($query, $group) {
                            return $query->where('group', $group);
                        })
                        ->get();
        }

        $data = $this->getInstituteData();
        $examTerm = InstituteExamTermsModel::all();
        return view('admin.students.indexAdmitCard', array_merge($data, compact('users', 'examTerm')));
    }

    // Admit Card Print ========================================
    public function printStudentsAdmitCard(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'exam_terms' => 'nullable',
        ]);

        $users = User::whereIn('id', $request->user_ids)->get();
        $exam_terms = $request->input('exam_terms');

        // Split users into chunks of 8 for A4 pages
        // $userChunks = $users->chunk(8);

        // $pdf = Pdf::loadView('users.admit-card', compact('userChunks'));
        // $pdf->setPaper('a4', 'portrait');

        // return $pdf->download('admit-cards-' . date('Y-m-d') . '.pdf');
        return view('admin.students.printAdmitCard', compact('users','exam_terms'));
    }

    // Seat Sticker Index ========================================
    public function indexStudentsSeatSticker(Request $request)
    {
        // 1. Get all search input parameters
        $institute_name = $request->input('institute_name');
        $branch = $request->input('branch');
        $division = $request->input('division');
        $class = $request->input('class');
        $shift = $request->input('shift');
        $section = $request->input('section');
        $group = $request->input('group');

        // Check if ANY search parameter is provided (indicating a search was performed)
        $has_search_parameters = $institute_name || $branch || $division || $class || $shift || $section || $group;

        $users = collect([]); // Default to an empty collection

        if ($has_search_parameters) {
            // Only run the query if a search has been initiated (by providing at least one parameter)
            $users = User::where('role', 'student')
                        ->where('status', 'active')
                        ->when($institute_name, function($query, $institute_name) {
                            return $query->where('institute_name', $institute_name);
                        })
                        ->when($branch, function($query, $branch) {
                            return $query->where('branch', $branch);
                        })
                        ->when($division, function($query, $division) {
                            return $query->where('division', $division);
                        })
                        ->when($class, function($query, $class) {
                            return $query->where('class', $class);
                        })
                        ->when($shift, function($query, $shift) {
                            return $query->where('shift', $shift);
                        })
                        ->when($section, function($query, $section) {
                            return $query->where('section', $section);
                        })
                        ->when($group, function($query, $group) {
                            return $query->where('group', $group);
                        })
                        ->get();
        }

        $data = $this->getInstituteData();
        $examTerm = InstituteExamTermsModel::all();
        return view('admin.students.indexSeatSticker', array_merge($data, compact('users', 'examTerm')));
    }

    // Seat Sticker Print =======================================
    public function printStudentsSeatSticker(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);

        $users = User::whereIn('id', $request->user_ids)->get();
        $exam_terms = $request->input('exam_terms');

        
        return view('admin.students.printSeatSticker', compact('users','exam_terms'));
    }



}
