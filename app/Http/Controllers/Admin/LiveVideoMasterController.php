<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveVideoMaster;

class LiveVideoMasterController extends Controller
{
    public function index()
    {
        $videos = LiveVideoMaster::where('isDelete', 0)->paginate(10);
        return view('admin.live_video_master.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_link' => 'required|url'
        ]);

        LiveVideoMaster::create([
            'video_link' => $request->video_link,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.live_video_master.index')->with('success', 'Live video added successfully.');
    }

    public function edit($id)
    {
        $data = LiveVideoMaster::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video_link' => 'required|url'
        ]);

        LiveVideoMaster::where('live_video_id', $id)->update([
            'video_link' => $request->video_link,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.live_video_master.index')->with('success', 'Live video updated successfully.');
    }

    public function delete(Request $request)
    {
        LiveVideoMaster::where('live_video_id', $request->id)->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function bulkDelete(Request $request)
    {
        LiveVideoMaster::whereIn('live_video_id', $request->ids)->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function toggleStatus($livevideomaster)
    {
        $gallery = LiveVideoMaster::where('live_video_id',$gallery)->first();
        if ($gallery->isDelete) {
            return response()->json(['ok' => false, 'message' => 'Cannot toggle deleted record.'], 422);
        }
        $gallery->iStatus = $gallery->iStatus ? 0 : 1;
        $gallery->update([
            'iStatus' => $gallery->iStatus
        ]);

        return redirect()->back()->with('success','Status Updated');
    }
}
