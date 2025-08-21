<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers\SettingsControllers;
use App\Http\Controllers\Controller;
//

use App\Models\Tbl_exam_term;
use Illuminate\Http\Request;

class TblExamTermController extends Controller
{

    public function index()
    {
        $records = Tbl_exam_term::orderBy('display_order','asc')->get();
        return view('admin/settings/exam-terms-views/index',compact('records'));
    }

    public function create()
    {
        return view('admin/settings/exam-terms-views/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = Tbl_exam_term::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('exam-terms.index');
        }
    }

    public function show(String $Tbl_exam_term)
    {

    }

    public function edit(String $id)
    {
        $data = Tbl_exam_term::find($id);
        return view('admin/settings/exam-terms-views/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = Tbl_exam_term::where('id',$id)
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
        $data_delete = Tbl_exam_term::destroy($id);

        if($data_delete){
            return redirect()->route('exam-terms.index');
        }
    }
}
