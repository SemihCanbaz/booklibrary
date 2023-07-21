@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kitap Ekle') }}</div>
                    <div class="card-body">
                        <br>

                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Kitabın Adı</label>
                                <input type="text" name="name" class="form-control" placeholder="Kitabın Adı">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Sayfa Sayısı</label>
                                <input type="text" name="page_count" class="form-control" placeholder="Sayfa Sayısı">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Kitabın Okunma Tarihi</label>
                                <input type="date" name="date" class="form-control"
                                    placeholder="Kitabın Okunma Tarihi">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Yazar</label>
                                <input type="text" name="writer" class="form-control" placeholder="Yazar">
                            </div>
                            <br>
                            <div class="col d-flex">
                                <button type="submit" class="btn btn-success btn-md flex-grow-1"
                                    id="go-to-index">Kütüphaneme Kaydet</button>
                            </div>
                            <br>
                        </form>
                        <div class="col d-flex">
                            <a href="{{ route('books.index') }}" class="btn btn-danger btn-md flex-grow-1">Kütüphaneme
                                Dön</a>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
