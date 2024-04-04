@extends('layouts.app')

@section('content')
<div class="card ">
                <div class="card-header">Album</div>

                <div class="card-body">
               ID:  {{$album->id}}
                </div>

                <div class="card-body">
                Name:  {{$album->name}}
                </div>

                <div class="card-body">
                <a href="{{route('album.index')}}"  class="btn btn-info">Back To albums</a>
                </div>

            </div>

            @if($album->photos->isNotEmpty())

            <div>

              <h1>photos in this album</h1>

              <ul>
               @foreach($album->photos as $photo)
   
                 <li><a href="{{route('photos.show', $photo->id)}}">{{$photo->name}}</a></li>
 
               @endforeach
              </ul>
              
            </div>
            @endif  

@endsection