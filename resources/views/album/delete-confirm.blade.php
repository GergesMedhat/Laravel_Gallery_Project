@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Album Confirmation</h1>
        <p>The album "{{ $album->name }}" contains {{ $photosCount }} photos.</p>
        <p>What would you like to do?</p>
        <div class="mb-5">

        <form action="{{ route('album.destroyWithPhotos', $album->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete All Photos and Album</button>
        </form>
        </div>

        
   

        <form action="{{ route('album.move', $album->id) }}" method="GET">

           @csrf
           @method('PUT')
           <div class="mb-1">
              <select class="form-select" name="album_id">
                <option selected disabled value="">Choose Album</option>
                @foreach($albums as $alb)
                <option value="{{$alb->id}}">{{$alb->name}}</option>
                @endforeach
              </select>
          </div>
               <button type="submit" class="btn btn-primary">Move all photos to another album</button>
        </form>


    </div>
@endsection