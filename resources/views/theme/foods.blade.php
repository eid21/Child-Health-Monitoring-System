@extends('theme.master')
@section('content')
    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Food System</h2>
            <div class="row">
                @foreach($foodItems as $food)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-3 text-center">
                            <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top mx-auto d-block" style="width: 150px; height: 120px; object-fit: cover;" alt="{{ $food->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $food->name }}</h5>
                                <p class="card-text text-muted">{{ $food->description }}</p>
                                <p class="card-text"><strong>Time:</strong> {{ $food->time }}</p>
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
    </style>
@endsection
