<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteGroupsModel;
use Illuminate\Http\Request;

class InstituteGroupsController extends Controller
{

    public function index()
    {
        $records = InstituteGroupsModel::orderBy('display_order','asc')->get();
        return view('admin/institute/groups/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/groups/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteGroupsModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('groups.index');
        }
    }

    public function show(String $InstituteGroupsModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteGroupsModel::find($id);
        return view('admin/institute/groups/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstituteGroupsModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('groups.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteGroupsModel::destroy($id);

        if($data_delete){
            return redirect()->route('groups.index');
        }
    }
}
