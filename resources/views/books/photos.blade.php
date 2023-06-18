@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-md-4">
                    <img src="{{ asset('images/' . $photo->filename) }}" alt="Photo" class="img-fluid">
                </div>
            @endforeach
        </div>
    </div>
@endsection
