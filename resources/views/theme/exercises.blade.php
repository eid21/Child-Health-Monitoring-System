@extends('theme.master')
@section('content')
    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Exercises</h2>
            <div class="row">
                @foreach($exercises as $exercise)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-3 text-center">
                            @if($exercise->image)
                                <img src="{{ asset('storage/' . $exercise->image) }}" class="card-img-top mx-auto d-block" style="width: 150px; height: 120px; object-fit: cover;" alt="{{ $exercise->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $exercise->name }}</h5>
                                <p class="card-text text-muted">{{ $exercise->description }}</p>
                                @if($exercise->video_url)
                                    <a href="{{ $exercise->video_url }}" target="_blank" class="btn btn-primary btn-sm">Watch Video</a>
                                @endif
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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
@endsection
