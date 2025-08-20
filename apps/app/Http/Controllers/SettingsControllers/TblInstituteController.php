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
        $records = Tbl_institute::orderBy('id','asc')->get();
        return view('admin/settings/institutes-views/index',compact('records'));
    }

// $table->string('name_en')->nullable();
// $table->string('name_bn')->nullable();
// $table->string('address_en')->nullable();
// $table->string('address_bn')->nullable();
// $table->string('eiin_number')->nullable();
// $table->string('mobile')->nullable();
// $table->string('email')->nullable();
// $table->string('website')->nullable();
// $table->string('logo')->nullable();
// $table->string('map')->nullable();
// $table->integer('display_order')->nullable();

    public function create()
    {
        return view('admin/settings/institutes-views/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_insert = Tbl_institute::create([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'display_order' => $request->display_order,
        ]);

        if($data_insert){
            return redirect()->route('shifts.index');
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
            'name_bn' => 'string',
            'display_order' => 'numeric',
        ]);

        $data_update = Tbl_institute::where('id',$id)
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
        $data_delete = Tbl_institute::destroy($id);

        if($data_delete){
            return redirect()->route('shifts.index');
        }
    }
}
