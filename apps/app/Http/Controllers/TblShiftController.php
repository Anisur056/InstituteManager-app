<?php

namespace App\Http\Controllers;

use App\Models\Tbl_shift;
use Illuminate\Http\Request;

class TblShiftController extends Controller
{

    public function index()
    {
        $records = Tbl_shift::orderBy('id','asc')->get();
        return view('admin.shifts_views.shifts-all',compact('records'));
    }


    public function create()
    {
        return view('admin.shifts_views.shifts-add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_insert = Tbl_shift::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_insert){
            return redirect()->route('shifts.index');
        }
    }


    // public function show(String $tbl_shift)
    // {
    //     // $user = User::find($user);
    //     // return view('users-show',compact('user'));
    // }


    public function edit(String $id)
    {
        $data = Tbl_shift::find($id);
        return view('admin.shifts_views.shifts-edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_update = Tbl_shift::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        return redirect()->route('shifts.index');
    }


    public function destroy(String $id)
    {
        $data_delete = Tbl_shift::destroy($id);

        if($data_delete){
            return redirect()->route('shifts.index');
        }
    }
}
