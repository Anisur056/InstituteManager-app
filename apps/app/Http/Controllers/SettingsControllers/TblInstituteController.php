<?php

// important! if conterller in subfolder.
namespace App\Http\Controllers\SettingsControllers;
use App\Http\Controllers\Controller;
//

use App\Models\Tbl_institute;
use Illuminate\Http\Request;

class TblInstituteController extends Controller
{

    public function index()
    {
        $records = Tbl_institute::orderBy('display_order','asc')->get();
        return view('admin/settings/institutes-views/index',compact('records'));
    }

    public function create()
    {
        return view('admin/settings/institutes-views/create');
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

        $data_insert = Tbl_institute::create([
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

    public function show(String $Tbl_institute)
    {

    }

    public function edit(String $id)
    {
        $data = Tbl_institute::find($id);
        return view('admin/settings/institutes-views/edit',compact('data'));
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

        $data_update = Tbl_institute::where('id',$id)
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
        $data_delete = Tbl_institute::destroy($id);

        if($data_delete){
            return redirect()->route('institutes.index');
        }
    }
}
