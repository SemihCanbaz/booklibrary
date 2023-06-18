@extends('layouts.app')

@section('content')
    <style>
        .card-header {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login To The Library') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        <div class="mb-4">
                            <a href="{{ route('books.index') }}" class="btn btn-outline-primary ">Kütüphane'ye Giriş Yap</a>
                            <br>

                            <form method="POST" action="{{ route('uploadPhoto') }}" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <input type="file" name="photo">
                                <button type="submit" class="btn btn-danger">Fotoğrafı Yükle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
