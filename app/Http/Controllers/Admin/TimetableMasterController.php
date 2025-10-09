<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimetableMaster;
use Illuminate\Support\Facades\File;

class TimetableMasterController extends Controller
{
    private string $uploadPath; // e.g. .../public_html/khatushyam/timetable
    private string $publicUrl;  // e.g. {APP_URL}/khatushyam/timetable

    public function __construct()
    {
        // Folder name only; base path & base url come from helpers
        $folder = 'timetable_master';

        $this->uploadPath = khatushyam_base_path($folder); // ../public_html/khatushyam_jobs/timetable master
        $this->publicUrl  = khatushyam_base_url($folder);  // /khatushyam_jobs/timetable master

        ensure_dir($this->uploadPath, 0775);
    }

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

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $this->storeImage($request->file('image'));
        }

        TimetableMaster::create([
            'image' => $imageName,
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

        $imageName = $record->image;
        if ($request->hasFile('image')) {
            $newName = $this->storeImage($request->file('image'));
            if ($imageName) {
                $this->unlinkImage($imageName);
            }
            $imageName = $newName;
        }

        $record->update([
            'image' => $imageName,
            'iStatus' => $request->iStatus ?? 1,
        ]);

        return redirect()->route('admin.timetable_master.index')->with('success', 'Timetable updated successfully.');
    }

    public function delete(Request $request)
    {
        $record = TimetableMaster::findOrFail($request->id);

        if ($record->image) {
            $this->unlinkImage($record->image);
            $record->update(['image' => null]);
        }
        $record->update(['isDelete' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function bulkDelete(Request $request)
    {
        $items = TimetableMaster::whereIn('id', $request->ids)->get();

        foreach ($items as $item) {

            if ($item->image) {
                $this->unlinkImage($item->image);
                $b->update(['image' => null]);
            }

            $item->update(['isDelete' => 1]);
        }

        return response()->json(['status' => 'success']);
    }
    private function storeImage($file): string
    {
        $ts  = now()->format('YmdHisv'); // timestamped filename
        $ext = $file->getClientOriginalExtension();
        $name = $ts . '.' . $ext;
        $file->move($this->uploadPath, $name);
        return $name;
    }

    private function unlinkImage(?string $name): void
    {
        if (!$name) return;
        $full = $this->uploadPath . DIRECTORY_SEPARATOR . $name;
        if (File::exists($full)) {
            @File::delete($full);
        }
    }
}
