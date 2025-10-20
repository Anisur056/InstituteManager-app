<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteVideoGalleryModel;
use Illuminate\Support\Facades\Storage;

class WebsiteVideoGalleryController extends Controller
{

    public function index()
    {
        $gallerys = WebsiteVideoGalleryModel::orderByDesc('id')
                           ->get();
        return view('admin/videoGallery/index', compact('gallerys'));
    }

    public function create()
    {
        return view('admin/videoGallery/create');
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

        $gallery = WebsiteVideoGalleryModel::create($validatedData);

        if($gallery){
            return redirect()->route('gallery.index');
        }

    }


    public function show(WebsiteVideoGalleryModel $gallery)
    {
        return view('admin/videoGallery/show', compact('gallery'));
    }

    public function edit(WebsiteVideoGalleryModel $gallery)
    {
        return view('admin/videoGallery/edit', compact('gallery'));
    }

    public function update(WebsiteVideoGalleryModel $gallery, Request $request)
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

    public function destroy(WebsiteVideoGalleryModel $gallery)
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
