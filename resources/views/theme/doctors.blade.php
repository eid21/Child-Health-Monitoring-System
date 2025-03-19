@extends('theme.master')

@section('content')
    <main class="doctors-page">
        <!-- Hero Section -->
        <div class="doctors-hero" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/img/gallery/pexels-pavel-danilyuk-5998458.jpg') }}'); background-size: cover; background-position: center; padding: 100px 0; color: white; text-align: center;">
            <div class="container">
                <h1 class="display-3 fw-bold mb-4">Our Medical Team</h1>
                <p class="lead fs-3 mb-4">Experienced professionals dedicated to your health and wellbeing</p>
                <div class="hero-separator mx-auto my-4"></div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="doctors-content-bg">
            <div class="container py-5">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="text-center mb-5 position-relative fs-1">
                            <span class="section-title-line"></span>
                            <span class="bg-white px-4 position-relative">Our <span class="text-primary">Specialists</span></span>
                        </h2>
                        <p class="text-center text-muted fs-5 max-width-800 mx-auto">Our team of expert physicians brings years of experience and specialized knowledge to provide the highest quality healthcare for you and your family.</p>
                    </div>
                </div>

                <!-- Doctors Container -->
                <div id="doctors-container">
                    <div class="row justify-content-center g-4">
                        @foreach($doctors as $doctor)
                            <div class="col-md-6 col-lg-4 doctor-card-column">
                                <div class="card doctor-card border-0 shadow hover-effect">
                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="doctor-image-container text-center mb-3">
                                            <div class="doctor-image-wrapper mx-auto">
                                                <img src="{{ asset('storage/' . $doctor->photo) }}"
                                                     class="rounded-circle"
                                                     width="120"
                                                     height="120"
                                                     alt="Dr. {{ $doctor->name }}"
                                                     loading="lazy">
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="card-title mb-1 fs-4">Dr. {{ $doctor->name }}</h5>
                                                <p class="card-subtitle text-primary mb-0 fs-5">{{ $doctor->speciality }}</p>
                                            </div>
                                        </div>

                                        <hr class="doctor-divider my-3">

                                        <!-- Bio Section -->
                                        <div class="doctor-bio mb-3 flex-grow-1">
                                            <h6 class="bio-heading mb-2"><i class="fas fa-user-md text-primary me-2"></i>About</h6>
                                            <p class="text-muted">{{ Str::limit($doctor->bio, 120) }}</p>
                                            @if (strlen($doctor->bio) > 120)
                                                <a href="#" class="text-primary text-decoration-none fw-medium read-more" data-bs-toggle="modal" data-bs-target="#bioModal{{ $doctor->id }}">
                                                    Read full profile <i class="fas fa-chevron-right small ms-1"></i>
                                                </a>
                                            @endif
                                        </div>

                                        <!-- Contact Information -->
                                        <div class="contact-info d-flex align-items-center mb-3">
                                            <i class="fas fa-phone-alt text-primary me-2"></i>
                                            <span>{{ $doctor->phone }}</span>
                                        </div>

                                        <!-- Doctor Actions -->
                                        <div class="doctor-actions d-grid gap-2 mt-auto">
                                            <a href="https://wa.me/{{ $doctor->phone }}" target="_blank"
                                               class="btn btn-success py-2">
                                                <i class="fab fa-whatsapp me-2"></i> Message on WhatsApp
                                            </a>
                                            <a href="tel:{{ $doctor->phone }}" class="btn btn-outline-primary py-2">
                                                <i class="fas fa-phone-alt me-2"></i> Call Doctor
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bio Modal -->
                            <div class="modal fade" id="bioModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="bioModalLabel{{ $doctor->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary bg-opacity-10 border-0">
                                            <h5 class="modal-title fs-2 text-primary" id="bioModalLabel{{ $doctor->id }}">Dr. {{ $doctor->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 mb-md-0">
                                                    <div class="text-center">
                                                        <img src="{{ asset('storage/' . $doctor->photo) }}"
                                                             class="rounded-circle img-fluid doctor-modal-img mb-3"
                                                             style="max-width: 180px; height: auto;"
                                                             alt="Dr. {{ $doctor->name }}">
                                                        <h6 class="fs-5 text-primary fw-bold">{{ $doctor->speciality }}</h6>
                                                        <div class="contact-info py-2">
                                                            <p class="mb-1"><i class="fas fa-phone-alt text-primary me-2"></i>{{ $doctor->phone }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="bio-section-title"><i class="fas fa-user-md text-primary me-2"></i>Professional Background</h5>
                                                    <div class="bio-content mb-4">
                                                        <p>{{ $doctor->bio }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light border-0 py-3">
                                            <a href="https://wa.me/{{ $doctor->phone }}" target="_blank" class="btn btn-success py-2 px-4">
                                                <i class="fab fa-whatsapp me-2"></i> Contact via WhatsApp
                                            </a>
                                            <a href="tel:{{ $doctor->phone }}" class="btn btn-outline-primary py-2 px-4">
                                                <i class="fas fa-phone-alt me-2"></i> Call Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .doctors-page {
            font-family: 'Roboto', sans-serif;
        }

        /* Background pattern for the doctors section */
        .doctors-content-bg {
            background: linear-gradient(rgba(245, 247, 250, 0.95), rgba(245, 247, 250, 0.95)),
            url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234e73df' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            position: relative;
            padding: 30px 0 60px;
        }

        .section-title-line {
            display: block;
            height: 1px;
            background: #e0e0e0;
            width: 100%;
            position: absolute;
            top: 50%;
            z-index: 0;
        }

        .doctor-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(to bottom, #ffffff, #f8f9fe);
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            /* Fixed height to ensure all cards are the same height */
            min-height: 500px;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12) !important;
        }

        .doctor-image-wrapper {
            position: relative;
            display: inline-block;
            width: 120px;
            height: 120px;
        }

        .doctor-image-wrapper img {
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 0 15px rgba(78, 115, 223, 0.15);
            width: 100%;
            height: 100%;
        }

        .modal-content {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Make pagination larger */
        .pagination .page-link {
            padding: 10px 15px;
            border-radius: 6px;
            margin: 0 3px;
        }

        /* Add slight shadow to section title background */
        .section-title-line + span {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.9);
        }

        /* Medical themed icons for section title */
        h2.position-relative::before {
            content: "⚕";
            font-size: 1.2em;
            color: #4e73df;
            margin-right: 10px;
            vertical-align: middle;
        }

        h2.position-relative::after {
            content: "⚕";
            font-size: 1.2em;
            color: #4e73df;
            margin-left: 10px;
            vertical-align: middle;
        }

        /* Doctor card improvements */
        .bio-heading {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .doctor-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(78, 115, 223, 0.3), transparent);
        }

        /* Hero section improvements */
        .hero-separator {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, transparent, white, transparent);
        }

        /* Bio modal improvements */
        .bio-section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(78, 115, 223, 0.2);
        }

        .bio-content {
            background: #f9f9ff;
            padding: 15px;
            border-radius: 10px;
        }

        .doctor-modal-img {
            border: 6px solid #fff;
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.2);
        }

        /* Helper class */
        .max-width-800 {
            max-width: 800px;
        }

        /* Make sure all doctors card content is properly aligned */
        .card-body {
            display: flex;
            flex-direction: column;
        }

        .doctor-bio {
            flex: 1;
        }

        .doctor-actions {
            margin-top: auto;
        }

        /* Better card distribution when having fewer cards */
        .doctor-card-column {
            display: flex;
            justify-content: center;
        }

        .doctor-card-column .doctor-card {
            width: 100%;
            max-width: 400px;
        }

        /* Ensure consistent sizing across all screen sizes */
        @media (min-width: 992px) {
            .col-lg-4 {
                flex: 0 0 auto;
                width: 33.33333%;
            }

            /* Special case for 1 or 2 doctors */
            .row-with-single-doctor .col-lg-4,
            .row-with-two-doctors .col-lg-4 {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .col-md-6 {
                flex: 0 0 auto;
                width: 50%;
            }
            
            /* For a single doctor on medium screens */
            .row-with-single-doctor .col-md-6 {
                width: 70%;
                margin: 0 auto;
            }
        }

        @media (max-width: 767.98px) {
            .doctor-card {
                min-height: auto;
            }
            
            .doctor-card-column {
                width: 100%;
            }
        }
    </style>

    <script>
        // Script to adjust layout based on number of doctor cards
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#doctors-container .row');
            const doctorCards = container.querySelectorAll('.doctor-card-column');
            
            if (doctorCards.length === 1) {
                container.classList.add('row-with-single-doctor');
            } else if (doctorCards.length === 2) {
                container.classList.add('row-with-two-doctors');
            }
        });
    </script>
@endsection