@extends('theme.master')

@section('content')
<main style="background-image: url('{{ asset('assets/img/gallery/pexels-pavel-danilyuk-5998458.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding: 50px 0;">
    <div class="container py-5">
            <h2 class="text-center mb-5 section-title"> <span class="text-primary">Our Medical Team</span></h2>
            
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($doctors as $doctor)
                    <div class="col">
                        <div class="card doctor-card h-100 shadow-sm">
                            <div class="doctor-image-wrapper">
                                <img src="{{ asset('storage/' . $doctor->photo) }}" 
                                     class="card-img-top rounded-circle" 
                                     alt="{{ $doctor->name }}">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Dr. {{ $doctor->name }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">{{ $doctor->speciality }}</small>
                                </p>
                                <hr>
                                <div class="contact-info">
                                    <p class="phone-number mb-3">
                                        <i class="fas fa-phone-alt me-2"></i> {{ $doctor->phone }}
                                    </p>
                                    <div class="doctor-actions">
                                        <a href="https://wa.me/{{ $doctor->phone }}" target="_blank" 
                                           class="btn btn-whatsapp btn-sm">
                                            <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                        </a>
                                        <a href="tel:{{ $doctor->phone }}" class="btn btn-outline-primary btn-sm">
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
            background-color: #007bff;
        }
        
        /* Doctor Cards */
        .doctor-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            transition: all 0.3s ease;
        }
        
        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,123,255,0.1) !important;
        }
        
        .doctor-image-wrapper {
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        
        .doctor-image-wrapper img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .doctor-card:hover .doctor-image-wrapper img {
            transform: scale(1.05);
        }
        
        .card-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }
        
        .specialty-badge {
            display: inline-block;
            background-color: #e7f3ff;
            color: #007bff;
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
        
        .doctor-actions {
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
            .doctor-image-wrapper img {
                width: 120px;
                height: 120px;
            }
        }
    </style>
@endsection

@section('header')
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection