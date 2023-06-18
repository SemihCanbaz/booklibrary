@extends('layouts.app')

@section('content')
    <style>
        .container {
            background-color: black;
        }
    </style>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kitaplar') }}</div>
                    <form class="container" action="{{ route('books.store') }}">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kitap Adı</th>
                                    <th scope="col">Kitap Sayfası</th>
                                    <th scope="col">Okunma Tarihi</th>
                                    <th scope="col">Yazar</th>

                                    <!-- Diğer sütunlar buraya eklenebilir -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->page_count }}</td>
                                        <td>{{ $book->date }}</td>
                                        <td>{{ $book->writer }}</td>


                                        <!-- Diğer sütun verileri buraya eklenebilir -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <a href="{{ route('books.create') }}" class="btn btn-success">Kitap Ekle</a>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
