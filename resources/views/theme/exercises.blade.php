@extends('theme.master')

@section('content')
<main style="background-image: url('{{ asset('assets/img/gallery/pexels-yankrukov-8613312.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding: 50px 0;">
        <div class="container py-5">
            <h2 class="text-center mb-5 section-title">Fitness <span class="text-primary">Exercises</span></h2>
            
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($exercises as $exercise)
                    <div class="col exercise-item">
                        <div class="card h-100 shadow-sm exercise-card">
                            @if($exercise->image)
                                <div class="card-img-wrapper">
                                    <img src="{{ asset('storage/' . $exercise->image) }}" class="card-img-top" alt="{{ $exercise->name }}">
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $exercise->name }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($exercise->description, 80) }}</p>
                                <div class="card-actions mt-auto">
                                    @if($exercise->video_url)
                                        <a href="{{ $exercise->video_url }}" target="_blank" class="btn btn-primary btn-sm">
                                            <i class="fas fa-play-circle me-1"></i> Watch Video
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $exercises->links() }}
            </div>
        </div>
        
        <!-- Exercise Detail Modals -->
        @foreach($exercises as $exercise)
            <div class="modal fade" id="exerciseModal-{{ $exercise->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $exercise->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5 mb-3 mb-md-0">
                                    @if($exercise->image)
                                        <img src="{{ asset('storage/' . $exercise->image) }}" class="img-fluid rounded" alt="{{ $exercise->name }}">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <h6>Description</h6>
                                    <p class="modal-description">{{ $exercise->description }}</p>
                                    
                                    <div class="exercise-details mt-4">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <strong>Difficulty:</strong> {{ $exercise->difficulty ?? 'Beginner' }}
                                            </div>
                                            <div class="col-6 mb-3">
                                                <strong>Duration:</strong> {{ $exercise->duration ?? '10 min' }}
                                            </div>
                                            <div class="col-6 mb-3">
                                                <strong>Target Muscles:</strong> {{ $exercise->target_muscles ?? 'Core' }}
                                            </div>
                                            <div class="col-6 mb-3">
                                                <strong>Equipment:</strong> {{ $exercise->equipment ?? 'None' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($exercise->video_url)
                                        <div class="mt-4">
                                            <a href="{{ $exercise->video_url }}" target="_blank" class="btn btn-primary">
                                                <i class="fas fa-play-circle me-1"></i> Watch Video Tutorial
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
        
        /* Exercise Cards */
        .exercise-card {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            transition: all 0.3s ease;
        }
        
        .exercise-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .card-img-wrapper {
            height: 180px;
            overflow: hidden;
        }
        
        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .exercise-card:hover .card-img-top {
            transform: scale(1.1);
        }
        
        .card-title {
            font-weight: 700;
            color: #333;
            font-size: 1.4rem; /* زيادة حجم الاسم */
            margin-bottom: 10px;
            line-height: 1.3;
        }
        
        .exercise-meta {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .card-text {
            font-size: 1.1rem; /* زيادة حجم الوصف */
            color: #6c757d;
            line-height: 1.6;
            font-weight: 400;
        }
        
        /* Modal description */
        .modal-description {
            font-size: 1.2rem; /* زيادة حجم الوصف في الـ modal */
            line-height: 1.7;
            color: #333;
        }
        
        /* Filter Buttons */
        .btn-filter {
            background-color: transparent;
            border: 1px solid #dee2e6;
            color: #495057;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }
        
        .btn-filter:hover, .btn-filter.active {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        
        /* Modal styling */
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        
        .modal-header {
            border-bottom: 1px solid rgba(0,0,0,0.1);
            background-color: #f8f9fa;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .row-cols-md-3 {
                --bs-gutter-x: 10px;
            }
            
            .card-img-wrapper {
                height: 160px;
            }
            
            .card-title {
                font-size: 1.2rem; /* تقليل حجم الاسم على الشاشات الصغيرة */
            }
            
            .card-text {
                font-size: 1rem; /* تقليل حجم الوصف على الشاشات الصغيرة */
            }
            
            .modal-description {
                font-size: 1.1rem; /* تقليل حجم الوصف في الـ modal على الشاشات الصغيرة */
            }
        }
    </style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterButtons = document.querySelectorAll('.btn-filter');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');
                
                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // You can add AJAX filtering here if needed
                // For now, this is just a UI demonstration
            });
        });
    });
</script>
@endsection