<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//

use App\Models\InstituteShiftsModel;
use Illuminate\Http\Request;

class InstituteShiftsController extends Controller
{

    public function index()
    {
        $records = InstituteShiftsModel::orderBy('id','asc')->get();
        return view('admin/institute/shifts/index',compact('records'));
    }


    public function create()
    {
        return view('admin/institute/shifts/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_insert = InstituteShiftsModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_insert){
            return redirect()->route('shifts.index');
        }
    }


    public function show(String $InstituteShiftsModel)
    {

    }


    public function edit(String $id)
    {
        $data = InstituteShiftsModel::find($id);
        return view('admin/institute/shifts/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_update = InstituteShiftsModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_update){
            return redirect()->route('shifts.index');
        }
    }


    public function destroy(String $id)
    {
        $data_delete = InstituteShiftsModel::destroy($id);

        if($data_delete){
            return redirect()->route('shifts.index');
        }
    }
}
