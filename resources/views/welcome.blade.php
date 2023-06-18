<!-- welcome.blade.php -->

@extends('layouts.app')
<style>
    body {
        background-image: url('{{ asset('images/library.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .book-image-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .book-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .your-style {
        font-family: 'Caveat', 'cursive';
        font-size: 35px;
        font-weight: normal;
        font-style: normal;
    }

    .card-body {
        text-align: center;
    }

    .card-header {
        font-family: 'Caveat', 'cursive';
        font-weight: normal;
        font-style: normal;
    }

    .button-container a {
        display: flex;
        margin-bottom: 10px;
        /* İstenilen boşluğu burada belirleyebilirsiniz */
        justify-content: center;
    }
</style>
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('BOOK-BOOK-BOOK!!!') }}</div>
                    <br>
                    <div class="card-body">
                        <br>
                        <h1 class="your-style">Welcome To Your Personal Library!</h1>
                        <br>
                        <p class="your-style">Here you can organize and keep track of your books.</p>
                        <br>
                        <div class="button-container">
                            <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="book-image-container">
        <img src="{{ asset('images/library.jpg') }}" alt="Book Image">
    </div>
@endsection
