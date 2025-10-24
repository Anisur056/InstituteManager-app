<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\InstituteInfoModel;
use Illuminate\Http\Request;

class InstituteInfoController extends Controller
{

    public function index()
    {
        $records = InstituteInfoModel::orderBy('display_order','asc')->get();
        return view('admin/institute/info/index',compact('records'));
    }

    public function create()
    {
        return view('admin/institute/info/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'address_en' => 'required|string',
            'address_bn' => 'required|string',
            'eiin_number' => 'nullable|numeric',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'nullable|email',
            'website' => 'nullable|string',
            'logo' => 'nullable|string',
            'map' => 'nullable|string',
            'display_order' => 'nullable|numeric',
        ]);

        $data_insert = InstituteInfoModel::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'address_en' => $request->address_en,
            'address_bn' => $request->address_bn,
            'eiin_number' => $request->eiin_number,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $request->logo,
            'map' => $request->map,
            'display_order' => $request->display_order,
            'created_at' => now(),
        ]);

        if($data_insert){
            return redirect()->route('institutes.index');
        }
    }

    public function show(String $InstituteInfoModel)
    {

    }

    public function edit(String $id)
    {
        $data = InstituteInfoModel::find($id);
        return view('admin/institute/info/edit',compact('data'));
    }


    public function update(Request $request, String $id)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'required|string',
            'address_en' => 'nullable|string',
            'address_bn' => 'required|string',
            'eiin_number' => 'nullable|numeric',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'nullable|email',
            'website' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'google_map' => 'nullable|string',
            'display_order' => 'nullable|numeric',
        ]);

        $logoPath = $request->logo->store('img/logo','public');

        $data_update = InstituteInfoModel::where('id',$id)
                ->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'address_en' => $request->address_en,
            'address_bn' => $request->address_bn,
            'eiin_number' => $request->eiin_number,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logoPath,
            'google_map' => $request->google_map,
            'display_order' => $request->display_order,
            'updated_at' => now(),
        ]);

        if($data_update){
            return redirect()->route('institutes.index');
        }
    }

    public function destroy(String $id)
    {
        $data_delete = InstituteInfoModel::destroy($id);

        if($data_delete){
            return redirect()->route('institutes.index');
        }
    }
}
