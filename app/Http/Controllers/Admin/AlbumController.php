<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $albums = Album::alive()
            ->orderByDesc('album_id')
            ->paginate(12)
            ->withQueryString();

        $counts = [
            'total'    => Album::alive()->count(),
            'active'   => Album::alive()->where('iStatus', 1)->count(),
            'inactive' => Album::alive()->where('iStatus', 0)->count(),
        ];

        return view('admin.album.index', compact('albums', 'counts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:200',
                Rule::unique('album_master', 'name')->where(fn($q) => $q->where('isDelete', 0)),
            ],
            'iStatus' => ['nullable', 'in:0,1'],
        ]);

        $data['iStatus'] = isset($data['iStatus']) ? (int)$data['iStatus'] : 1;
        $data['slugname'] = Str::slug($data['name']);
        Album::create($data);

        return back()->with('success', 'Album created.');
    }

    public function update(Request $request, Album $album)
    {
        if ($album->isDelete) {
            return back()->with('error', 'Cannot update deleted record.');
        }

        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:200',
                Rule::unique('album_master', 'name')
                    ->where(fn($q) => $q->where('isDelete', 0))
                    ->ignore($album->album_id, 'album_id'),
            ],
            'iStatus' => ['nullable', 'in:0,1'],
        ]);

        if (isset($data['iStatus'])) {
            $album->iStatus = (int)$data['iStatus'];
        }
        $album->name = $data['name'];
        $album->save();

        return back()->with('success', 'Album updated.');
    }

    // Logical delete: set isDelete = 1
    public function destroy(Album $album)
    {
        if ($album->isDelete) {
            return back()->with('warning', 'Already deleted.');
        }
        $album->isDelete = 1;
        $album->save();

        return back()->with('success', 'Album deleted.');
    }

    // BULK DELETE — sets isDelete = 1 for all selected IDs
    public function bulkDestroy(Request $request)
    {
        $validated = $request->validate([
            'ids'   => ['required', 'array', 'min:1'],
            'ids.*' => ['integer'],
        ]);

        $ids = $validated['ids'];

        $affected = Album::whereIn('album_id', $ids)
            ->where('isDelete', 0)
            ->update(['isDelete' => 1]);

        return response()->json([
            'ok' => true,
            'affected' => $affected,
            'message' => $affected > 0 ? 'Selected albums deleted.' : 'No rows updated.',
        ]);
    }

    public function toggleStatus(Album $album)
    {
        if ($album->isDelete) {
            return response()->json(['ok' => false, 'message' => 'Cannot toggle deleted record.'], 422);
        }
        $album->iStatus = $album->iStatus ? 0 : 1;
        $album->save();

        return redirect()->back()->with('success', 'Status Updated');
    }
}
