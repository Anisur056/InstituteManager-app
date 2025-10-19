<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteNoticeModel;
use Illuminate\Support\Facades\Storage;

class WebsiteNoticeController extends Controller
{

    public function index()
    {
        $notices = WebsiteNoticeModel::orderByDesc('id')
                           ->get();
        return view('admin/notice/index', compact('notices'));
    }

    public function create()
    {
        return view('admin/notice/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'enable_status' => 'required|in:on,off',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('website/img/notice','public');
            $validatedData['image'] = $path;
        }

        $notice = WebsiteNoticeModel::create($validatedData);

        if($notice){
            return redirect()->route('notices.index');
        }

    }


    public function show(String $id)
    {
        $data = User::findOrFail($id);
        return view('admin/students/show',compact('data'));
    }

    public function edit(String $id)
    {

        $data = User::find($id);
        $classes = InstituteClassesModel::all();
        return view('admin/students/edit', compact('data','classes'));
    }

    public function update(UserStudentFormRequest $request, String $id)
    {
        // The request is already validated by the UserRequest.php
        $validatedData = $request->validated();

        // Check if password is filled, then change. Empty For Unchange
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }else{
            unset($validatedData['password']);
        }

        $user = User::findOrFail($id);

        // If Profile Pic set then upload image & Update path
        if($request->hasFile('profile_pic'))
        {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $path = $request->file('profile_pic')->store('img/users','public');
            $validatedData['profile_pic'] = $path;
        }


        // Update Validated Data
        $user->update($validatedData);

        if($user){
            return redirect()->route('students.index');
        }
    }

    public function destroy(String $id)
    {
        $destroy = User::destroy($id);

        if($destroy){
            return redirect()->route('students.index');
        }
    }

    public function shortByClass(string $class)
    {
        $records = User::whereIn('status', ['active'])
                    ->where('class', $class)
                    ->get();
        $classes = InstituteClassesModel::all();
        return view('admin/students/index',compact('records','classes'));
    }

    public function exStudents()
    {
        $records = User::whereIn('status', ['disable','tc','exam-complete','exit'])->get();
        return view('admin/employee/ex', compact('records'));
    }

    // public function admit_card_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/print-admit-card.',compact('record'));
    // }

    // public function seat_sticker_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/',compact('record'));
    // }

    // public function id_card_print(string $id)
    // {
    //     $record = User::find($id);
    //     return view('admin/students/',compact('record'));
    // }
}
