<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//

use App\Models\InstituteSubjectModel;
use Illuminate\Http\Request;

class InstituteSubjectController extends Controller
{

    public function index()
    {
        $records = InstituteSubjectModel::orderBy('id','asc')->get();
        return view('admin/institute/subject/index',compact('records'));
    }


    public function create()
    {
        return view('admin/institute/subject/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_insert = InstituteSubjectModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_insert){
            return redirect()->route('subject.index');
        }
    }


    public function show(String $InstituteSubjectModel)
    {

    }


    public function edit(String $id)
    {
        $data = InstituteSubjectModel::find($id);
        return view('admin/institute/subject/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_update = InstituteSubjectModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_update){
            return redirect()->route('subject.index');
        }
    }


    public function destroy(String $id)
    {
        $data_delete = InstituteSubjectModel::destroy($id);

        if($data_delete){
            return redirect()->route('subject.index');
        }
    }
}
