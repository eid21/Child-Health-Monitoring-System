@extends('theme.master')

@section('content')
<main style="background-image: url('{{ asset('assets/img/gallery/pexels-pixabay-260447.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding: 50px 0;">
        <div class="container py-5">
            <h2 class="text-center mb-5 section-title"> <span class="text-success"> Our Fitness Centers</span></h2>
            
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($gyms as $gym)
                    <div class="col">
                        <div class="card gym-card h-100 shadow-sm">
                            <div class="gym-image-wrapper">
                                <img src="{{ asset('storage/' . $gym->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $gym->name }}">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $gym->name }}</h5>
                                <div class="gym-badge mb-2">Fitness Center</div>
                                <p class="card-text">
                                    <small class="text-muted">{{ $gym->description }}</small>
                                </p>
                                <hr>
                                <div class="contact-info">
                                    <p class="phone-number mb-3">
                                        <i class="fas fa-phone-alt me-2"></i> {{ $gym->phone }}
                                    </p>
                                    <div class="gym-actions">
                                        <a href="https://wa.me/{{ $gym->phone }}" target="_blank" 
                                           class="btn btn-whatsapp btn-sm">
                                            <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                        </a>
                                        <a href="tel:{{ $gym->phone }}" class="btn btn-outline-success btn-sm">
                                            <i class="fas fa-phone-alt me-1"></i> Call
                                        </a>
                                    </div>
                                </div>
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
            background-color: #28a745;
        }
        
        /* Gym Cards */
        .gym-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            transition: all 0.3s ease;
        }
        
        .gym-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(40,167,69,0.1) !important;
        }
        
        .gym-image-wrapper {
            height: 180px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        
        .gym-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .gym-card:hover .gym-image-wrapper img {
            transform: scale(1.05);
        }
        
        .card-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }
        
        .gym-badge {
            display: inline-block;
            background-color: #e7f7ed;
            color: #28a745;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .contact-info {
            margin-top: 10px;
        }
        
        .phone-number {
            font-size: 16px;
            color: #444;
        }
        
        .gym-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-whatsapp {
            background-color: #25d366;
            border-color: #25d366;
            color: white;
        }
        
        .btn-whatsapp:hover {
            background-color: #22c55e;
            border-color: #22c55e;
            color: white;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .gym-image-wrapper {
                height: 150px;
            }
        }
    </style>
@endsection

@section('header')
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection