@extends('theme.master')

@section('content')
<main style="background-image: url('{{ asset('assets/img/gallery/pexels-ella-olsson-572949-1640773.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding: 50px 0;">
    <div class="container py-5">
        <div class="section-header text-center mb-5">
            <span class="subheading">Delicious Options</span>
            <h2 class="section-title">Our <span class="text-accent">Food System</span></h2>
            <div class="divider mx-auto"></div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            @foreach($foodItems as $food)
                <div class="col">
                    <div class="food-card">
                        <div class="food-image">
                            <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}">
                            <div class="time-overlay">
                                <i class="far fa-clock"></i> {{ $food->time }}
                            </div>
                        </div>
                        <div class="food-content">
                            <h5 class="food-title">{{ $food->name }}</h5>
                            <p class="food-description">{{ $food->description }}</p>
                        </div>
                        <div class="food-footer">
                            <button class="btn-details">
                                <i class="fas fa-info-circle"></i> Details
                            </button>
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
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
    
    body {
        background-color: #f4f4f9;
        font-family: 'Inter', sans-serif;
    }
    
    /* Section Header */
    .section-header {
        margin-bottom: 3rem;
    }
    
    .subheading {
        font-size: 1rem;
        font-weight: 600;
        color: #ff5733;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .section-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #333;
    }
    
    .text-accent {
        color: #ff5733;
    }
    
    .divider {
        height: 4px;
        width: 60px;
        background: linear-gradient(to right, #ff5733, #ff914d);
        border-radius: 2px;
        margin: 10px auto;
    }
    
    /* Food Cards */
    .food-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .food-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(255, 87, 51, 0.2);
    }
    
    .food-image {
        height: 220px;
        position: relative;
        overflow: hidden;
    }
    
    .food-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .food-card:hover .food-image img {
        transform: scale(1.08);
    }
    
    .time-overlay {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(255, 87, 51, 0.9);
        color: white;
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .food-content {
        padding: 1.5rem;
        flex-grow: 1;
    }
    
    .food-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
    }
    
    .food-description {
        color: #555;
        font-size: 1rem;
        line-height: 1.5;
    }
    
    .food-footer {
        padding: 1rem;
        text-align: center;
        border-top: 1px solid #eee;
    }
    
    .btn-details {
        background: transparent;
        color: #ff5733;
        border: 2px solid #ff5733;
        padding: 10px 18px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .btn-details:hover {
        background: #ff5733;
        color: white;
    }
    
    /* Ensure max 3 cards per row and proper alignment */
    .row-cols-md-3 {
        justify-content: center !important; /* Center-align cards */
    }

    /* Adjust column width when fewer than 3 cards */
    @media (min-width: 768px) {
        .row-cols-md-3 .col {
            flex: 0 0 auto; /* Prevent full-width stretching */
            width: 32%; /* Slightly less than 33.33% for spacing */
            max-width: 400px; /* Optional: Set a max-width for consistency */
        }

        /* When only 1 card exists */
        .row-cols-md-3 .col:first-child:nth-last-child(1) {
            width: 32%; /* Fixed width for single card */
        }

        /* When 2 cards exist */
        .row-cols-md-3 .col:first-child:nth-last-child(2),
        .row-cols-md-3 .col:first-child:nth-last-child(2) ~ .col {
            width: 48%; /* Slightly less than 50% for spacing */
        }
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .row-cols-1 .col {
            width: 100%; /* Single column on small screens */
        }
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 1.8rem;
        }
        
        .food-image {
            height: 180px;
        }
    }
</style>
@endsection

@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection