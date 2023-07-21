@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a class="btn btn-dark col-md-12" href="{{ route('dashboard') }}">Dashboard'a Dön</a>
                    <div class="card-header">{{ __('Kitaplar') }}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kitap Adı</th>
                                    <th scope="col">Kitap Sayfası</th>
                                    <th scope="col">Okunma Tarihi</th>
                                    <th scope="col">Yazar</th>
                                    <th scope="col">Actions</th>
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
                                        <td style="width: 10%">
                                            <div class="d-flex">
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-info btn-md">Düzenle</a>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Kitabı silmek istediğinize emin misiniz?')">Sil</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('books.create') }}" class="btn btn-success btn-md">Kitap Ekle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
