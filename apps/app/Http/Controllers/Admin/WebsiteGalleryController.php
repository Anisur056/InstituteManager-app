<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\WebsiteGalleryModel;
use Illuminate\Support\Facades\Storage;

class WebsiteGalleryController extends Controller
{

    public function index()
    {
        $gallerys = WebsiteGalleryModel::orderByDesc('id')
                           ->get();
        return view('admin/gallery/index', compact('gallerys'));
    }

    public function create()
    {
        return view('admin/gallery/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'enable_status' => 'required|in:on,off',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('website/img/gallery','public');
            $validatedData['image'] = $path;
        }

        $gallery = WebsiteGalleryModel::create($validatedData);

        if($gallery){
            return redirect()->route('gallery.index');
        }

    }


    public function show(WebsiteGalleryModel $gallery)
    {
        return view('admin/gallery/show', compact('gallery'));
    }

    public function edit(WebsiteGalleryModel $gallery)
    {
        return view('admin/gallery/edit', compact('gallery'));
    }

    public function update(WebsiteGalleryModel $gallery, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'enable_status' => 'required|in:on,off',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        // If Profile Pic set then upload image & Update path
        if($request->hasFile('image'))
        {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $path = $request->file('image')->store('website/img/gallery','public');
            $validatedData['image'] = $path;
        }

        // Update Validated Data
        $gallery->update($validatedData);

        if($gallery){
            return redirect()->route('gallery.index');
        }
    }

    public function destroy(WebsiteGalleryModel $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $destroy = $gallery->delete();

        if($destroy){
            return redirect()->route('gallery.index');
        }
    }

}
