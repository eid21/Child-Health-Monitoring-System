@extends('theme.master')

@section('content')
<main class="fitness-exercises-main">
    <div class="overlay"></div>
    <div class="container py-5">
        <h2 class="text-center mb-5 section-title">Fitness <span class="text-primary">Exercises</span></h2>
        
        <!-- Exercises Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
          @foreach($exercises as $exercise)
                <div class="col exercise-item">
                    <div class="card h-100 shadow-sm exercise-card" data-bs-toggle="modal" data-bs-target="#exerciseModal-{{ $exercise->id }}">
                        @if($exercise->image)
                            <div class="card-img-wrapper">
                                <img src="{{ asset('storage/' . $exercise->image) }}" class="card-img-top" alt="{{ $exercise->name }}">
                                <div class="exercise-difficulty {{ strtolower($exercise->difficulty ?? 'beginner') }}">
                                    {{ $exercise->difficulty ?? 'Beginner' }}
                                </div>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $exercise->name }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($exercise->description, 200) }}</p>
                            <div class="card-actions mt-auto">
                                @if($exercise->video_url)
                                <div class="mt-3">
                                    <a href="{{ $exercise->video_url }}" target="_blank" class="btn btn-primary w-100">
                                        <i class="fas fa-play-circle me-1"></i> Watch Video Tutorial
                                    </a>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Empty State -->
        @if(count($exercises) == 0)
            <div class="text-center empty-state p-5">
                <i class="fas fa-dumbbell fa-3x mb-3 text-muted"></i>
                <h3>No exercises found</h3>
                <p>Try adjusting your search or filters</p>
            </div>
        @endif
        
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
                                    <img src="{{ asset('storage/' . $exercise->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $exercise->name }}">
                                    @if($exercise->video_url)
                                        <div class="mt-3">
                                            <a href="{{ $exercise->video_url }}" target="_blank" class="btn btn-primary w-100">
                                                <i class="fas fa-play-circle me-1"></i> Watch Video Tutorial
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="badge-wrapper mb-3">
                                    <span class="badge bg-{{ strtolower($exercise->difficulty ?? 'beginner') == 'beginner' ? 'success' : (strtolower($exercise->difficulty ?? '') == 'intermediate' ? 'warning' : 'danger') }} me-2">{{ $exercise->difficulty ?? 'Beginner' }}</span>
                                    <span class="badge bg-info">{{ $exercise->duration ?? '10 min' }}</span>
                                </div>
                                
                                <h6 class="detail-section-title">Description</h6>
                                <p class="modal-description">{{ $exercise->description }}</p>
                                
                                <h6 class="detail-section-title mt-4">Exercise Details</h6>
                                <div class="exercise-details">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <div class="detail-item">
                                                <div class="detail-icon"><i class="fas fa-bullseye"></i></div>
                                                <div class="detail-content">
                                                    <div class="detail-label">Target Muscles</div>
                                                    <div class="detail-value">{{ $exercise->target_muscles ?? 'Core' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="detail-item">
                                                <div class="detail-icon"><i class="fas fa-dumbbell"></i></div>
                                                <div class="detail-content">
                                                    <div class="detail-label">Equipment</div>
                                                    <div class="detail-value">{{ $exercise->equipment ?? 'None' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="detail-item">
                                                <div class="detail-icon"><i class="fas fa-fire-alt"></i></div>
                                                <div class="detail-content">
                                                    <div class="detail-label">Calories</div>
                                                    <div class="detail-value">{{ $exercise->calories ?? '150-200' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="detail-item">
                                                <div class="detail-icon"><i class="fas fa-redo"></i></div>
                                                <div class="detail-content">
                                                    <div class="detail-label">Repetitions</div>
                                                    <div class="detail-value">{{ $exercise->repetitions ?? '10-15' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <h6 class="detail-section-title mt-4">Instructions</h6>
                                <ol class="instruction-list">
                                    @if($exercise->instructions)
                                        @foreach(explode("\n", $exercise->instructions) as $instruction)
                                            <li>{{ $instruction }}</li>
                                        @endforeach
                                    @else
                                        <li>Stand with feet shoulder-width apart.</li>
                                        <li>Engage your core muscles.</li>
                                        <li>Perform the exercise with proper form.</li>
                                        <li>Breathe steadily throughout the movement.</li>
                                        <li>Complete the recommended number of repetitions.</li>
                                    @endif
                                </ol>
                            </div>
                        </div>
                        
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary save-exercise">
                                <i class="far fa-bookmark me-1"></i> Save Exercise
                            </button>
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

    .fitness-exercises-main {
        background-image: url('{{ asset('assets/img/gallery/pexels-yankrukov-8613312.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        padding: 50px 0;
    }

    .fitness-exercises-main .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.85);
        z-index: 0;
    }

    .fitness-exercises-main .container {
        position: relative;
        z-index: 1;
    }

    .section-title {
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
        color: #333;
    }

    .section-title:after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 70px;
        height: 3px;
        background-color: #007bff;
    }

    /* Search and Filter */
    .search-filter-card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
        border: none;
    }

    .search-box {
        flex: 1;
        min-width: 200px;
    }

    .search-box .form-control {
        border-radius: 20px;
        padding-left: 15px;
        border: 1px solid #e0e0e0;
    }

    /* Exercise Cards */
    .exercise-card {
        border-radius: 12px;
        overflow: hidden;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .exercise-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
    }

    .card-img-wrapper {
        height: 180px;
        overflow: hidden;
        position: relative;
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

    .exercise-difficulty {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 3px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        color: white;
    }

    .exercise-difficulty.beginner {
        background-color: #28a745;
    }

    .exercise-difficulty.intermediate {
        background-color: #ffc107;
        color: #212529;
    }

    .exercise-difficulty.advanced {
        background-color: #dc3545;
    }

    .card-title {
        font-weight: 700;
        color: #333;
        font-size: 1.4rem;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .exercise-meta {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .card-text {
        font-size: 1.1rem;
        color: #6c757d;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Modal styling */
    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    .modal-header {
        border-bottom: 1px solid rgba(0,0,0,0.1);
        background-color: #f8f9fa;
        padding: 1.25rem 1.5rem;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-description {
        font-size: 1.2rem;
        line-height: 1.7;
        color: #333;
    }

    .detail-section-title {
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .detail-icon {
        width: 40px;
        height: 40px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        color: #007bff;
    }

    .detail-content {
        flex: 1;
    }

    .detail-label {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .detail-value {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
    }

    .instruction-list {
        padding-left: 1.5rem;
    }

    .instruction-list li {
        margin-bottom: 0.75rem;
        line-height: 1.6;
    }

    /* Empty state */
    .empty-state {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
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

    /* Ensure max 3 cards per row and proper alignment */
    .row-cols-lg-3 {
        justify-content: center !important; /* Center-align cards */
    }

    /* Adjust column width when fewer than 3 cards */
    @media (min-width: 992px) {
        .row-cols-lg-3 .col {
            flex: 0 0 auto; /* Prevent full-width stretching */
            width: 32%; /* Slightly less than 33.33% for spacing */
            max-width: 400px; /* Optional: Set a max-width for consistency */
        }

        /* When only 1 card exists */
        .row-cols-lg-3 .col:first-child:nth-last-child(1) {
            width: 32%; /* Fixed width for single card */
        }

        /* When 2 cards exist */
        .row-cols-lg-3 .col:first-child:nth-last-child(2),
        .row-cols-lg-3 .col:first-child:nth-last-child(2) ~ .col {
            width: 48%; /* Slightly less than 50% for spacing */
        }
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .row-cols-md-2 .col {
            flex: 0 0 auto;
            width: 48%; /* Two cards per row */
        }
    }

    @media (max-width: 767px) {
        .row-cols-1 .col {
            width: 100%; /* Single column on small screens */
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-img-wrapper {
            height: 160px;
        }
        
        .card-title {
            font-size: 1.2rem;
        }
        
        .card-text {
            font-size: 1rem;
        }
        
        .modal-description {
            font-size: 1.1rem;
        }
        
        .fitness-exercises-main {
            padding: 30px 0;
        }
        
        .section-title {
            font-size: 1.6rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterButtons = document.querySelectorAll('.btn-filter');
        const exerciseItems = document.querySelectorAll('.exercise-item');
        const searchInput = document.querySelector('.search-box input');
        
        // Filter exercises based on difficulty
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');
                
                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Show/hide exercises based on filter
                if (filterValue === 'all') {
                    exerciseItems.forEach(item => item.style.display = 'block');
                } else {
                    exerciseItems.forEach(item => {
                        const difficultyElement = item.querySelector('.exercise-difficulty');
                        const difficulty = difficultyElement ? difficultyElement.textContent.trim().toLowerCase() : '';
                        
                        if (difficulty === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                }
                
                // Check if there are any visible exercises
                checkEmptyState();
            });
        });
        
        // Search functionality
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                exerciseItems.forEach(item => {
                    const title = item.querySelector('.card-title').textContent.toLowerCase();
                    const description = item.querySelector('.card-text').textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || description.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Check if there are any visible exercises
                checkEmptyState();
            });
        }
        
        // Check if there are visible exercises
        function checkEmptyState() {
            const visibleExercises = document.querySelectorAll('.exercise-item[style="display: block"]');
            const emptyState = document.querySelector('.empty-state');
            
            if (visibleExercises.length === 0 && !emptyState) {
                // Create empty state if it doesn't exist
                const emptyStateDiv = document.createElement('div');
                emptyStateDiv.className = 'text-center empty-state p-5 mt-4';
                emptyStateDiv.innerHTML = `
                    <i class="fas fa-dumbbell fa-3x mb-3 text-muted"></i>
                    <h3>No exercises found</h3>
                    <p>Try adjusting your search or filters</p>
                `;
                
                document.querySelector('.row.row-cols-1').after(emptyStateDiv);
            } else if (visibleExercises.length > 0 && emptyState) {
                // Remove empty state if exercises are visible
                emptyState.remove();
            }
        }
        
        // Save exercise functionality
        const saveButtons = document.querySelectorAll('.save-exercise');
        saveButtons.forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.innerHTML = '<i class="fas fa-bookmark me-1"></i> Saved';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.innerHTML = '<i class="far fa-bookmark me-1"></i> Save Exercise';
                }
            });
        });
        
        // Add click event to entire card
        const exerciseCards = document.querySelectorAll('.exercise-card');
        exerciseCards.forEach(card => {
            card.addEventListener('click', function() {
                const modalId = this.getAttribute('data-bs-target');
                const modal = new bootstrap.Modal(document.querySelector(modalId));
                modal.show();
            });
        });
    });
</script>
@endsection