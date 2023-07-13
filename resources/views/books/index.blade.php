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
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kitap Adı</th>
                                    <th scope="col">Kitap Sayfası</th>
                                    <th scope="col">Okunma Tarihi</th>
                                    <th scope="col">Yazar</th>
                                    <th>Actions</th>

                                    <!-- Diğer sütunlar buraya eklenebilir -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <th scope="row">{{ $book->id }}</th>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->page_count }}</td>
                                        <td>{{ $book->date }}</td>
                                        <td>{{ $book->writer }}</td>
                                        <td><a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Düzenle</a>
                                        </td>

                                        <!-- Diğer sütun verileri buraya eklenebilir -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mb-2 pl-2">
                            <a href="{{ route('books.create') }}" class="btn btn-success">Kitap Ekle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
