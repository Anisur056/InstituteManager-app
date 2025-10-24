<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteExamTermsModel;
use Illuminate\Http\Request;

class InstituteExamTermsController extends Controller
{

    public function index()
    {
        $records = InstituteExamTermsModel::orderBy('display_order','asc')->get();
        return view('admin/institute/exam/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/exam/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteExamTermsModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('exam-terms.index');
        }
    }

    public function show(String $InstituteExamTermsModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteExamTermsModel::find($id);
        return view('admin/institute/exam/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = InstituteExamTermsModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('exam-terms.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteExamTermsModel::destroy($id);

        if($data_delete){
            return redirect()->route('exam-terms.index');
        }
    }
}
