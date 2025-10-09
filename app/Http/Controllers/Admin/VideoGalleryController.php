<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::where('isDelete', 0)->paginate(10);
        return view('admin.video_gallery.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_link' => 'required|url',
            'name' => 'required'
        ]);

        VideoGallery::create([
            'name' => $request->name,
            'video_link' => $request->video_link,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.video_gallery.index')->with('success', 'Video added successfully.');
    }

    public function edit($id)
    {
        $data = VideoGallery::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video_link' => 'required|url'
        ]);

        VideoGallery::where('video_Id', $id)->update([
            'name' => $request->name,

            'video_link' => $request->video_link,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.video_gallery.index')->with('success', 'Video updated successfully.');
    }

    public function delete(Request $request)
    {
        VideoGallery::where('video_Id', $request->id)->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function bulkDelete(Request $request)
    {
        VideoGallery::whereIn('video_Id', $request->ids)->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }
}
