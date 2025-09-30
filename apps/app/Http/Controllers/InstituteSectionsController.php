<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\InstituteSectionsModel;
use Illuminate\Http\Request;

class InstituteSectionsController extends Controller
{

    public function index()
    {
        $records = InstituteSectionsModel::orderBy('display_order','asc')->get();
        return view('admin/institute/sections/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/sections/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteSectionsModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('sections.index');
        }
    }

    public function show(String $InstituteSectionsModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteSectionsModel::find($id);
        return view('admin/institute/sections/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstituteSectionsModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('sections.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteSectionsModel::destroy($id);

        if($data_delete){
            return redirect()->route('sections.index');
        }
    }
}
