@extends('layouts.app')


@section('content')
    <a href="{{route('album.create')}}" class="btn btn-success">Add new album </a>
    <a href="{{route('photos.create')}}" class="btn btn-success">Add new Photo </a>
    <h1> All Albums </h1>
    <table class="table">
        <thead>
            <tr> <th> Id</th> <th> Name </th> <th>Show</th> <th> Edit </th> <th> Delete</th></tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
                <tr>
                    <td> {{$album->id}}</td>
                    <td> {{$album->name}}</td>
                    <td> <a href="{{route('album.show', $album->id)}}" class="btn btn-info"> Show </a></td>
                    <td> <a href="{{route('album.edit', $album->id)}}" class="btn btn-warning"> Edit </a></td>
                    <td>
                        <form action="{{route('album.destroy', $album->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="confirmDelete({{ $album->id }})">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
        
    </table>
    {{ $albums->onEachSide(5)->links() }}

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this album?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(album_id) {
            $('#deleteForm').attr('action', '{{ route('album.destroy', '') }}/' + album_id);
            $('#deleteConfirmationModal').modal('show');
        }
    </script>


@endsection