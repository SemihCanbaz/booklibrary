@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Kitaplar
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
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
