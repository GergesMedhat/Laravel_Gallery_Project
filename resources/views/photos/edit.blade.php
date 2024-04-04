@extends('layouts.app')

@section('content')
   
<h1> Edit Photo</h1>

<form method="POST"  action="{{route('photos.update')}}">
    @csrf
    
    <div class="mb-3">
            <input type="hidden" class="form-control" name="id"  value="{{$photo->id}}">
    </div>
    <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{$photo->name}}">
    </div>


    <div class="mb-3">
            <label  class="form-label">Album</label>
            <select class="form-select" name="album_id">
                <option selected disabled value="">Choose Album</option>
                @foreach($album as $alb)
                <option value="{{$alb->id}}">{{$alb->name}}</option>
                @endforeach
            </select>
    </div>

    <button class="btn btn-success" type="submit">Update Photo</button>
</form>


@endsection