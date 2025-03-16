@extends('theme.master')

@section('content')
    <main>
        <div class="container py-5">
            <h2 class="text-center mb-5 section-title">Our <span class="text-danger">Food System</span></h2>
            
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($foodItems as $food)
                    <div class="col">
                        <div class="card food-card h-100 shadow-sm">
                            <div class="food-image-wrapper">
                                <img src="{{ asset('storage/' . $food->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $food->name }}">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $food->name }}</h5>
                                <div class="time-badge mb-2">
                                    <i class="far fa-clock me-1"></i> {{ $food->time }}
                                </div>
                                <p class="card-text">
                                    <small class="text-muted">{{ $food->description }}</small>
                                </p>
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
        
        .section-title {
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #dc3545;
        }
        
        /* Food Cards */
        .food-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            transition: all 0.3s ease;
        }
        
        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(220,53,69,0.1) !important;
        }
        
        .food-image-wrapper {
            height: 180px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        
        .food-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .food-card:hover .food-image-wrapper img {
            transform: scale(1.05);
        }
        
        .card-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }
        
        .time-badge {
            display: inline-block;
            background-color: #fcf0f1;
            color: #dc3545;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .card-text {
            margin-top: 10px;
            font-size: 14px;
            line-height: 1.5;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .food-image-wrapper {
                height: 150px;
            }
        }
    </style>
@endsection

@section('header')
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection