<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers\SettingsControllers;
use App\Http\Controllers\Controller;
//

use App\Models\Tbl_group;
use Illuminate\Http\Request;

class TblGroupController extends Controller
{

    public function index()
    {
        $records = Tbl_group::orderBy('display_order','asc')->get();
        return view('admin/settings/groups-views/index',compact('records'));
    }

    public function create()
    {
        return view('admin/settings/groups-views/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = Tbl_group::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('groups.index');
        }
    }

    public function show(String $Tbl_group)
    {

    }

    public function edit(String $id)
    {
        $data = Tbl_group::find($id);
        return view('admin/settings/groups-views/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_update = Tbl_group::where('id',$id)
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
        $data_delete = Tbl_group::destroy($id);

        if($data_delete){
            return redirect()->route('groups.index');
        }
    }
}
