@extends('theme.master')
@section('content')
    <main>
        <div class="container mt-5">
            <h2 class="text-center my-5">Our Gyms</h2>
            <div class="row">
                @foreach($gyms as $gym)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-3 text-center">
                            <img src="{{ asset('storage/' . $gym->image) }}" class="card-img-top mx-auto d-block" style="width: 150px; height: 120px; object-fit: cover;" alt="{{ $gym->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gym->name }}</h5>
                                <p class="card-text">📞 {{ $gym->phone }}</p>
                                <p class="card-text text-muted">{{ $gym->description }}</p>
                                <a href="https://wa.me/{{ $gym->phone }}" target="_blank" class="btn btn-success btn-sm">Contact on WhatsApp</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@section('css')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-weight: bold;
            color: #333;
        }
        .card-text {
            font-size: 14px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection
