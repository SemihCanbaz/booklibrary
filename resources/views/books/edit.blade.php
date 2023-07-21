@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kitap Düzenle') }}</div>
                    <div class="card-body">
                        <h1>Kitap Düzenle</h1>
                        <br>

                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>

                                <script>
                                    setTimeout(function() {
                                        window.location.href = "{{ route('books.index') }}";
                                    }, 3000);
                                </script>
                            @endif

                            <div class="form-group">
                                <label for="">Kitabın Adı</label>
                                <input type="text" name="name" value="{{ $book->name }}" class="form-control"
                                    placeholder="Kitabın Adı">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Sayfa Sayısı</label>
                                <input type="text" name="page_count" value="{{ $book->page_count }}" class="form-control"
                                    placeholder="">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Kitabın Okunma Tarihi</label>
                                <input type="date" name="date" value="{{ $book->date }}" class="form-control"
                                    placeholder="Kitabın Okunma Tarihi">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Yazar</label>
                                <input type="text" name="writer" value="{{ $book->writer }}" class="form-control"
                                    placeholder="Yazar">
                            </div>
                            <br>
                            <div class="col d-flex">
                                <button type="submit" class="btn btn-success btn-md flex-grow-1">Güncelle</button>
                            </div>
                        </form>
                        <br>

                        <a href="{{ route('books.index') }}"
                            class="btn btn-danger d-flex justify-content-center">Kütüphaneme
                            Dön</a>

                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
