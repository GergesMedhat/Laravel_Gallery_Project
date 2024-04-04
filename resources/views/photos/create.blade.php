@extends('layouts.app')

@section('content')
   
<h1> add new photo</h1>

<form method="post"  action="{{route('photos.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name" >
    </div>

    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" name="image" class="form-control" >
    </div>

    <div class="mb-3">
            <label  class="form-label">album</label>
            <select class="form-select" name="album_id">
                <option selected disabled value="">Choose Album</option>
                @foreach($album as $alb)
                <option value="{{$alb->id}}">{{$alb->name}}</option>
                @endforeach
            </select>
    </div>
 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection