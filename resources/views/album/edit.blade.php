@extends('layouts.app')

@section('content')
   
<h1> Edit Album</h1>

<form method="POST"  action="{{route('album.update', $album->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
            <input type="hidden" class="form-control" name="id"  value="{{$album->id}}">
         
    </div>
    <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$album->name}}">
            @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror
    </div>   

    <button class="btn btn-success" type="submit">Update Album</button>
</form>


@endsection