
@extends('layouts.app')
@section('body')


<div class="card ">
                <div class="card-header">Photo</div>

                <div class="card-body">
                <img alt="{{$photo->image}}" src="{{asset('storage/images/' . $photo->image)}}" height="200" width="200">
                  
                </div>
                <div class="card-body">
               ID:  {{$photo->id}}

                </div>

                <div class="card-body">
                Name:  {{$photo->name}}
                </div>
        
              @if($photo->album)
                <div class="card-body">
    
                  <h5> Album :<a href="{{route('album.show', $photo->album->id)}}"> {{$photo->album->name}}  </a>  </h5>   
                </div>  
              @endif              

                <div class="card-body">
                <a href="{{route('photos.index')}}"  class="btn btn-info">Back To Photos</a>
                </div>

            </div>



@endsection