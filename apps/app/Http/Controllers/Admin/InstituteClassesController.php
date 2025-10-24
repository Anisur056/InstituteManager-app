<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteClassesModel;
use Illuminate\Http\Request;

class InstituteClassesController extends Controller
{

    public function index()
    {
        $records = InstituteClassesModel::orderBy('display_order','asc')->get();
        return view('admin/institute/class/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/class/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteClassesModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('class.index');
        }
    }

    public function show(String $InstituteClassesModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteClassesModel::find($id);
        return view('admin/institute/class/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstituteClassesModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('class.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteClassesModel::destroy($id);

        if($data_delete){
            return redirect()->route('class.index');
        }
    }
}

