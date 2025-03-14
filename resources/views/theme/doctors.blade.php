@extends('theme.master')
@section('content')
    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Our Doctors</h2>
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm p-3 text-center">
                            <img src="{{ asset('storage/' . $doctor->photo) }}" class="card-img-top rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" alt="{{ $doctor->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $doctor->name }}</h5>
                                <p class="card-text text-muted">{{ $doctor->speciality }}</p>
                                <p class="card-text">📞 {{ $doctor->phone }}</p>
                                <a href="https://wa.me/{{ $doctor->phone }}" target="_blank" class="btn btn-success btn-sm">Contact on WhatsApp</a>
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
