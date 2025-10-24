<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteAcademicYearsModel;
use Illuminate\Http\Request;

class InstituteAcademicYearsController extends Controller
{

    public function index()
    {
        $records = InstituteAcademicYearsModel::orderBy('id','asc')->get();
        return view('admin/institute/years/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/years/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year_en' => 'required|string',
            'year_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteAcademicYearsModel::create([
            'year_en' => $request->year_en,
            'year_bn' => $request->year_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('academic-years.index');
        }
    }

    public function show(String $InstituteAcademicYearsModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteAcademicYearsModel::find($id);
        return view('admin/institute/years/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'year_en' => 'required|string',
            'year_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstituteAcademicYearsModel::where('id',$id)
                ->update([
            'year_en' => $request->year_en,
            'year_bn' => $request->year_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('academic-years.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteAcademicYearsModel::destroy($id);

        if($data_delete){
            return redirect()->route('academic-years.index');
        }
    }
}
