<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers\SettingsControllers;
use App\Http\Controllers\Controller;
//

use App\Models\Tbl_academic_year;
use Illuminate\Http\Request;

class TblAcademicYearController extends Controller
{

    public function index()
    {
        $records = Tbl_academic_year::orderBy('id','asc')->get();
        return view('admin/settings/academic-years-views/index',compact('records'));
    }

    public function create()
    {
        return view('admin/settings/academic-years-views/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year_en' => 'required|string',
            'year_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = Tbl_academic_year::create([
            'year_en' => $request->year_en,
            'year_bn' => $request->year_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('academic-years.index');
        }
    }

    public function show(String $Tbl_academic_year)
    {

    }

    public function edit(String $id)
    {
        $data = Tbl_academic_year::find($id);
        return view('admin/settings/academic-years-views/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'year_en' => 'required|string',
            'year_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = Tbl_academic_year::where('id',$id)
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
        $data_delete = Tbl_academic_year::destroy($id);

        if($data_delete){
            return redirect()->route('academic-years.index');
        }
    }
}
