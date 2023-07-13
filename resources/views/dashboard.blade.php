@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
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
                                @foreach ($books->slice(0, 5) as $book)
                                    <tr>
                                        <th scope="row">{{ $book->id }}</th>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->page_count }}</td>
                                        <td>{{ $book->date }}</td>
                                        <td>{{ $book->writer }}</td>
                                        <td><a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Düzenle</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($books) > 5)
                            <div class="text-center">
                                <a class="btn btn-primary" href="{{ route('books.index') }}">Tümünü Gör</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Kitaplar Grafiği
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
