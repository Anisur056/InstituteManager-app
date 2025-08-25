<?php

namespace App\Http\Controllers;

use App\Models\Tbl_student;
use App\Models\Tbl_classe;
use App\Models\Tbl_academic_year;
use App\Models\Tbl_institute;
use App\Models\Tbl_shift;
use App\Models\Tbl_section;
use App\Models\Tbl_group;

use Illuminate\Http\Request;

class TblStudentController extends Controller
{

    public function index()
    {
        $records = Tbl_student::limit(5)->orderBy('id','desc')->get();
        $class_list = Tbl_classe::orderBy('id','asc')->get();
        return view('admin/students-views/students/index',compact('records','class_list'));
    }

    public function create()
    {
        $Tbl_academic_year = Tbl_academic_year::orderBy('id','asc')->get();
        $Tbl_institute = Tbl_institute::orderBy('id','asc')->get();
        $Tbl_shift = Tbl_shift::orderBy('id','asc')->get();
        $Tbl_classe = Tbl_classe::orderBy('id','asc')->get();
        $Tbl_section = Tbl_section::orderBy('id','asc')->get();
        $Tbl_group = Tbl_group::orderBy('id','asc')->get();
        return view('admin/students-views/students/create',compact(
            'Tbl_academic_year',
            'Tbl_institute',
            'Tbl_shift',
            'Tbl_classe',
            'Tbl_section',
            'Tbl_group',
        ));
    }

    public function store(Request $request)
    {
        return $request->validate([
            'status' => '',
            'enrolled_date' => 'required|date',
            'profile_pic' => 'nullable|file|image|mimes:jpg,jpeg,png|max:150',
            'academic_year' => 'required|date_format:Y',

            'institute_name' => '',
            'shift' => '',
            'class' => '',
            'section' => '',
            'group' => '',
            'roll' => '',
            'name_bn' => '',
            'name_en' => '',
            'date_of_birth' => '',
            'birth_reg' => '',
            'nid' => '',
            'gender' => '',
            'religion' => '',
            'blood_group' => '',
            'health_issues' => '',
            'height' => '',
            'weight' => '',
            'nationality' => '',

            'contact_sms' => '',
            'sms_status' => '',
            'contact_whatsapp' => '',
            'contact_email' => '',
            'present_address' => '',
            'permanent_address' => '',

            'father_name_en' => '',
            'father_name_bn' => '',
            'father_contact' => '',
            'father_occupation' => '',
            'father_birth_reg' => '',
            'father_nid' => '',
            'father_income' => '',

            'mother_name_en' => '',
            'mother_name_bn' => '',
            'mother_contact' => '',
            'mother_occupation' => '',
            'mother_birth_reg' => '',
            'mother_nid' => '',
            'mother_income' => '',

            'local_guardian_name_en' => '',
            'local_guardian_name_bn' => '',
            'local_guardian_relation' => '',
            'local_guardian_contact' => '',
            'local_guardian_nid' => '',
            'local_guardian_address' => '',

            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_contact' => '',
            'emergency_contact_address' => '',

            'previous_institute' => '',
            'previous_institute_address' => '',
            'previous_institute_tc_number' => '',
            'previous_institute_tc_date' => '',

            'remark' => '',
        ]);



        $data_insert = Tbl_student::create([
            'enrolled_date' => $request->enrolled_date,
        ]);

        if($data_insert){
            return redirect()->route('students.index');
        }
    }


    public function show(String $tbl_shift)
    {
        // $user = User::find($user);
        // return view('users-show',compact('user'));
    }

    public function edit(String $id)
    {
        $data = Tbl_student::find($id);
        return view('admin/students-views/students/edit', compact('data'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
        ]);

        $data_update = Tbl_student::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
        ]);

        return redirect()->route('students.index');
    }

    public function destroy(String $id)
    {
        $data_delete = Tbl_student::destroy($id);

        if($data_delete){
            return redirect()->route('students.index');
        }
    }

    public function short_by_class(string $class)
    {
        $records = Tbl_student::where('class', $class)->get();
        $class_list = Tbl_classe::orderBy('id','asc')->get();
        return view('admin/students-views/students/index',compact('records','class_list'));
    }

    public function admit_card_print(string $id)
    {
        $record = Tbl_student::find($id);
        return view('admin/students-views/admit-card/print',compact('record'));
    }

    public function seat_sticker_print(string $id)
    {
        $record = Tbl_student::find($id);
        return view('admin/students-views/seat-sticker/print',compact('record'));
    }

    public function id_card_print(string $id)
    {
        $record = Tbl_student::find($id);
        return view('admin/students-views/id-card/print',compact('record'));
    }
}
