<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryMaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryMasterController extends Controller
{
    public function index()
    {
        $gallery = DB::table('gallery_master as g')
                    ->join('album_master as a', 'a.album_id', '=', 'g.album_id')
                    ->select('g.*', 'a.name as album_name')
                    ->where('g.isDelete', 0)
                    ->paginate(10);

        $albums = DB::table('album_master')->where('isDelete', 0)->orderBy('name')->get();

        return view('admin.gallery_master.index', compact('gallery', 'albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->move(base_path('public_html/khatum shyam/gallery_master/'), $fileName);

        GalleryMaster::create([
            'album_id' => $request->album_id,
            'image' => $fileName,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.gallery_master.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit($id)
    {
        $data = GalleryMaster::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'album_id' => 'required',
        ]);

        $gallery = GalleryMaster::findOrFail($id);

        $image = $gallery->image;

        if($request->hasFile('image')) {
            // Delete old image
            $path = base_path('public_html/khatum shyam/gallery_master/'.$image);
            if(File::exists($path)) {
                File::delete($path);
            }

            $fileName = time().'.'.$request->image->extension();
            $request->image->move(base_path('public_html/khatum shyam/gallery_master/'), $fileName);
            $image = $fileName;
        }

        $gallery->update([
            'album_id' => $request->album_id,
            'image' => $image,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.gallery_master.index')->with('success', 'Image updated successfully.');
    }

    public function delete(Request $request)
    {
        $gallery = GalleryMaster::findOrFail($request->id);
        $path = base_path('public_html/khatum shyam/gallery_master/'.$gallery->image);
        if(File::exists($path)) {
            File::delete($path);
        }

        $gallery->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function bulkDelete(Request $request)
    {
        $items = GalleryMaster::whereIn('gallery_id', $request->ids)->get();

        foreach($items as $item) {
            $path = base_path('public_html/khatum shyam/gallery_master/'.$item->image);
            if(File::exists($path)) {
                File::delete($path);
            }
            $item->update(['isDelete' => 1]);
        }

        return response()->json(['status' => 'success']);
    }
}
