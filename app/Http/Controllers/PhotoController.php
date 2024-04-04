<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{


    function index()
    {
        $photo = Photo::select('id', 'name', 'image')->paginate(5);
        return view('photos.index', ['photos' => $photo]);
    }

    function create()
    {
        $album = Album::all();
        return view('photos.create', ['album' => $album]);
    }

    function store(Request $request)
    {
        $photo = new Photo();
        $photo->name = $request->name;
        $photo->album_id = $request->album_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $photo->image = $imageName;
        }
        $photo->save();
        return to_route('photos.show', $photo->id);
    }

    function show(Photo $photo)
    {
        return view('photos.show', ['photo' => $photo]);
    }

    function edit($id)
    {
        $album = Album::all();
        $photo = Photo::findOrFail($id);
        return view('photos.edit', ['photo' => $photo, 'album' => $album]);
    }

    function update(Request $request)
    {
        $photo = Photo::findOrFail($request->id);
        $photo->name = $request->name;
        $photo->album_id = $request->album_id;
        $photo->save();
        return to_route('photos.show', $photo->id);
    }




    function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return to_route('photos.index');
    }

}
