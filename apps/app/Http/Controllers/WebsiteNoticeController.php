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


    public function show(WebsiteNoticeModel $notice)
    {
        return view('admin/notice/show', compact('notice'));
    }

    public function edit(WebsiteNoticeModel $notice)
    {
        return view('admin/notice/edit', compact('notice'));
    }

    public function update(WebsiteNoticeModel $notice, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'enable_status' => 'required|in:on,off',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        // If Profile Pic set then upload image & Update path
        if($request->hasFile('image'))
        {
            if ($notice->image) {
                Storage::disk('public')->delete($notice->image);
            }

            $path = $request->file('image')->store('website/img/notice','public');
            $validatedData['image'] = $path;
        }

        // Update Validated Data
        $notice->update($validatedData);

        if($notice){
            return redirect()->route('notices.index');
        }
    }

    public function destroy(WebsiteNoticeModel $notice)
    {
        if ($notice->image) {
            Storage::disk('public')->delete($notice->image);
        }

        $destroy = $notice->delete();

        if($destroy){
            return redirect()->route('notices.index');
        }
    }

}
