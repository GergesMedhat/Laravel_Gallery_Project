<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $album = Album::select('id', 'name')->paginate(5);
        return view('album.index', ['albums' => $album]);
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $album->save();
        return redirect()->route('album.index');
    }

    public function show(Album $album)
    {
        return view('album.show', ['album' => $album]);
    }

    public function edit(Album $album)
    {
        return view('album.edit', ['album' => $album]);
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->name = $request->name;
        $album->save();
        return to_route('album.show', [$album->id]);
    }

    public function destroy(Album $album)
    {
        $photosCount = $album->photos()->count();
        $albums = Album::all();
        if ($photosCount > 0) {
            return view('album.delete-confirm', compact('album', 'photosCount'), ['albums' => $albums]);
        } else {
            $album->delete();
            return to_route('album.index');
        }
    }

    public function deleteWithPhotos(Album $album)
    {
        $album->photos()->delete();
        $album->delete();
        return redirect()->route('album.index');
    }

    public function movePhotos(Request $request, Album $album)
    {
        $destinationAlbumId = $request->input('album_id');
        $photos = $album->photos;
        foreach ($photos as $photo) {
            $photo->album_id = $destinationAlbumId;
            $photo->save();
        }

        return redirect()->route('album.index');
    }
}
