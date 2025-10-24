<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
            'youtube_link' => 'required|string|max:255',
            'enable_status' => 'required|in:on,off',
        ]);

        $videoGallery = WebsiteVideoGalleryModel::create($validatedData);

        if($videoGallery){
            return redirect()->route('video-gallery.index');
        }

    }


    public function show(WebsiteVideoGalleryModel $video_gallery)
    {
        return view('admin/videoGallery/show', compact('video_gallery'));
    }

    public function edit(WebsiteVideoGalleryModel $video_gallery)
    {
        return view('admin/videoGallery/edit', compact('video_gallery'));
    }

    public function update(WebsiteVideoGalleryModel $video_gallery, Request $request)
    {
        $validatedData = $request->validate([
            'youtube_link' => 'required|string|max:255',
            'enable_status' => 'required|in:on,off',
        ]);

        // Update Validated Data
        $video_gallery->update($validatedData);

        if($video_gallery){
            return redirect()->route('video-gallery.index');
        }
    }

    public function destroy(WebsiteVideoGalleryModel $video_gallery)
    {

        $video_gallery = $video_gallery->delete();

        if($video_gallery){
            return redirect()->route('video-gallery.index');
        }
    }

}
