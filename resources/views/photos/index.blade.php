@extends('layouts.app')

@section('body')
   
  <h1>all photos</h1>
  <style>
.card-columns {
  display: flex;
  flex-wrap: nowrap;
}

.card-columns > .card {
  width: 15%;
  margin: 10px;
  text-align:center;
}
</style>

    <a href="{{route('photos.create')}}" class="btn btn-success">Add New Photo</a>
    <a href="{{route('album.index')}}" class="btn btn-primary">Albums</a>
    <div class="row">
        <div class="card-columns">
        @foreach($photos as $photo)
            <div class="card ">
                <div class="card-header">Photo</div>
                <div class="card-body">
                <img alt="{{$photo->image}}" src="{{asset('storage/images/' . $photo->image)}}" height="200" width="200">
                </div>
                <div class="card-body">
                {{ $photo->name }}
                </div>
         

                <div class="card-body">
                <a href="{{route('photos.show', $photo->id)}}"  class="btn btn-info">Show</a>
                <a href="{{route('photos.edit', $photo->id)}}"  class="btn btn-warning">Edit</a>
                <a href="{{route('photos.destroy', $photo->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this photo or not?')"> Delete</a>

                </div>

  
            </div>
            @endforeach
        
        </div>
        {{ $photos->onEachSide(5)->links() }}




    </div>
@endsection