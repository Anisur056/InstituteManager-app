<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteBranchModel;
use Illuminate\Http\Request;

class InstituteBranchesController extends Controller
{

    public function index()
    {
        $records = InstituteBranchModel::orderBy('display_order','asc')->get();
        return view('admin/institute/branch/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/branch/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institute_info_id' => 'required|string',
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstitutebranchModel::create([
            'institute_info_id' => $request->institute_info_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('branches.index');
        }
    }

    public function show(String $InstitutebranchModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstitutebranchModel::find($id);
        return view('admin/institute/branch/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'institute_info_id' => 'required|string',
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstitutebranchModel::where('id',$id)
                ->update([
            'institute_info_id' => $request->institute_info_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('branches.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstitutebranchModel::destroy($id);

        if($data_delete){
            return redirect()->route('branches.index');
        }
    }
}
