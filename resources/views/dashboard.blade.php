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
                        <div class="row">
                            <div class="col-md-8">
                                {{ __('Kitaplar') }}
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <a href="{{ route('books.create') }}" class="btn btn-success">Kitap Ekle</a>
                            </div>
                        </div>
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
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books->take(5) as $book)
                                    <tr>
                                        <th scope="row">{{ $book->id }}</th>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->page_count }}</td>
                                        <td>{{ $book->date }}</td>
                                        <td>{{ $book->writer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('books.index') }}">Tümünü Gör</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Kitaplar Grafiği
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>

                <script src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Kitap');
                        data.addColumn('date', 'Tarih');

                        @foreach ($books as $book)
                            var bookDate = new Date('{{ $book->date }}');
                            data.addRow(['{{ $book->name }}', bookDate]);
                        @endforeach

                        var options = {
                            title: "Eklenen Tarihler"
                        };

                        var chart = new google.visualization.ColumnChart(
                            document.getElementById("chartContainer")
                        );
                        chart.draw(data, options);
                    }
                </script>
            </div>
        </div>
    </div>
    </div>
@endsection
