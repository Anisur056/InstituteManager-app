<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Models\Tbl_classe;
use App\Models\Tbl_academic_year;
use App\Models\Tbl_institute;
use App\Models\Tbl_shift;
use App\Models\Tbl_section;
use App\Models\Tbl_group;

// use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{

    public function index()
    {
        // $records = StudentModel::limit(5)->orderBy('id','desc')->get();
        $records = StudentModel::where('class', 'PLAY')->get();
        $class_list = Tbl_classe::all();
        return view('admin/students/index',compact('records','class_list'));
    }

    public function create()
    {
        $Tbl_academic_year = Tbl_academic_year::all();
        $Tbl_institute = Tbl_institute::all();
        $Tbl_shift = Tbl_shift::all();
        $Tbl_classe = Tbl_classe::all();
        $Tbl_section = Tbl_section::all();
        $Tbl_group = Tbl_group::all();
        return view('admin.students.create',compact(
            'Tbl_academic_year',
            'Tbl_institute',
            'Tbl_shift',
            'Tbl_classe',
            'Tbl_section',
            'Tbl_group',
        ));
    }

    public function store(StudentRequest $request)
    {
        // The request is already validated by the StudentRequest.php
        $validatedData = $request->validated();

        $store = StudentModel::create($validatedData);

        if($store){
            return redirect()->route('students.index');
        }
    }


    public function show(String $id)
    {
        // $user = User::find($user);
        // return view('users-show',compact('user'));
    }

    public function edit(String $id)
    {
        $data = StudentModel::find($id);
        return view('admin.students.edit', compact('data'));
    }

    public function update(StudentRequest $request, String $id)
    {
        // The request is already validated by the StudentRequest.php
        $validatedData = $request->validated();

        $update = StudentModel::where('id',$id)
                ->update($validatedData);

        // $update = $StudentModel->update($validatedData);

        if($update){
            return redirect()->route('students.index');
        }

    }

    public function destroy(String $id)
    {
        $destroy = StudentModel::destroy($id);

        if($destroy){
            return redirect()->route('students.index');
        }
    }

    public function short_by_class(string $class)
    {
        $records = StudentModel::where('class', $class)->get();
        $class_list = Tbl_classe::orderBy('id','asc')->get();
        return view('admin.students.index',compact('records','class_list'));
    }

    public function admit_card_print(string $id)
    {
        $record = StudentModel::find($id);
        return view('admin.students.print-admit-card.',compact('record'));
    }

    public function seat_sticker_print(string $id)
    {
        $record = StudentModel::find($id);
        return view('admin.students',compact('record'));
    }

    public function id_card_print(string $id)
    {
        $record = StudentModel::find($id);
        return view('admin.students',compact('record'));
    }
}
