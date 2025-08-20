<?php

namespace App\Http\Controllers;

use App\Models\Tbl_student;
use Illuminate\Http\Request;

class TblStudentController extends Controller
{

    public function index()
    {
        $records = Tbl_student::limit(10)->orderBy('id','desc')->get();
        return view('admin/students-views/students/student-all',compact('records'));
    }

    public function create()
    {
        return view('admin/students-views/students/student-add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
        ]);

        $data_insert = Tbl_student::create([
            'name_en' => $request->name_en,
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
        // return view('admin/students-views/students/...',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_update = Tbl_student::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        // return redirect()->route('shifts.index');
    }


    public function destroy(String $id)
    {
        // $data_delete = Tbl_student::destroy($id);

        // if($data_delete){
        //     return redirect()->route('students.index');
        // }
    }

    public function short_by_class(string $class)
    {
        $records = Tbl_student::where('class', $class)->get();
        return view('admin/students-views/students/student-all',compact('records'));
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
