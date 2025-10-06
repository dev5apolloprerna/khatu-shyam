<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimetableMaster;
use Illuminate\Support\Facades\File;

class TimetableMasterController extends Controller
{
    public function index()
    {
        $timetables = TimetableMaster::where('isDelete', 0)->paginate(10);
        return view('admin.timetable_master.index', compact('timetables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->move(base_path('public_html/khatum shyam/timetable_master/'), $fileName);

        TimetableMaster::create([
            'image' => $fileName,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.timetable_master.index')->with('success', 'Timetable added successfully.');
    }

    public function edit($id)
    {
        $data = TimetableMaster::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $record = TimetableMaster::findOrFail($id);
        $image = $record->image;

        if ($request->hasFile('image')) {
            $path = base_path('public_html/khatum shyam/timetable_master/'.$image);
            if (File::exists($path)) {
                File::delete($path);
            }

            $fileName = time().'.'.$request->image->extension();
            $request->image->move(base_path('public_html/khatum shyam/timetable_master/'), $fileName);
            $image = $fileName;
        }

        $record->update([
            'image' => $image,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.timetable_master.index')->with('success', 'Timetable updated successfully.');
    }

    public function delete(Request $request)
    {
        $record = TimetableMaster::findOrFail($request->id);
        $path = base_path('public_html/khatum shyam/timetable_master/'.$record->image);
        if (File::exists($path)) {
            File::delete($path);
        }

        $record->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function bulkDelete(Request $request)
    {
        $items = TimetableMaster::whereIn('id', $request->ids)->get();

        foreach($items as $item) {
            $path = base_path('public_html/khatum shyam/timetable_master/'.$item->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $item->update(['isDelete' => 1]);
        }

        return response()->json(['status' => 'success']);
    }
}
