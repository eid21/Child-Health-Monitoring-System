@extends('theme.master')

@section('content')
    <main class="doctors-page">
        <!-- Hero Section -->
        <div class="doctors-hero" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('assets/img/gallery/pexels-pavel-danilyuk-5998458.jpg') }}'); background-size: cover; background-position: center; padding: 80px 0; color: white; text-align: center;">
            <div class="container">
                <h1 class="display-3 fw-bold mb-4">Our Medical Team</h1>
                <p class="lead fs-3">Experienced professionals dedicated to your health and wellbeing</p>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="doctors-content-bg">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="text-center mb-5 position-relative fs-1">
                            <span class="section-title-line"></span>
                            <span class="bg-white px-3 position-relative">Our <span class="text-primary">Specialists</span></span>
                        </h2>
                    </div>
                </div>

                <!-- Doctors Container -->
                <div id="doctors-container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach($doctors as $doctor)
                            <div class="col">
                                <div class="card doctor-card h-100 border-0 shadow-sm hover-effect">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="doctor-image-wrapper me-3">
                                                <img src="{{ asset('storage/' . $doctor->photo) }}"
                                                     class="rounded-circle"
                                                     width="120"
                                                     height="120"
                                                     alt="Dr. {{ $doctor->name }}"
                                                     loading="lazy">
                                            </div>
                                            <div>
                                                <h5 class="card-title mb-1 fs-3">Dr. {{ $doctor->name }}</h5>
                                                <p class="card-subtitle text-primary mb-0 fs-5">{{ $doctor->speciality }}</p>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Bio Section -->
                                        <div class="doctor-bio mb-4">
                                            <p class="text-muted fs-5">{{ Str::limit($doctor->bio, 120) }}</p>
                                            @if (strlen($doctor->bio) > 120)
                                                <a href="#" class="text-primary text-decoration-none fw-medium read-more fs-5" data-bs-toggle="modal" data-bs-target="#bioModal{{ $doctor->id }}">
                                                    Read more <i class="fas fa-chevron-right small ms-1"></i>
                                                </a>
                                            @endif
                                        </div>

                                        <!-- Contact Information -->
                                        <div class="contact-info d-flex align-items-center mb-4">
                                            <i class="fas fa-phone-alt text-primary me-2 fs-5"></i>
                                            <span class="fs-5">{{ $doctor->phone }}</span>
                                        </div>

                                        <!-- Doctor Actions -->
                                        <div class="doctor-actions d-grid gap-2">
                                            <a href="https://wa.me/{{ $doctor->phone }}" target="_blank"
                                               class="btn btn-success fs-5 py-2">
                                                <i class="fab fa-whatsapp me-2"></i> Message on WhatsApp
                                            </a>
                                            <a href="tel:{{ $doctor->phone }}" class="btn btn-outline-primary fs-5 py-2">
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
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fs-2" id="bioModalLabel{{ $doctor->id }}">Dr. {{ $doctor->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <img src="{{ asset('storage/' . $doctor->photo) }}"
                                                     class="rounded-circle me-3"
                                                     width="80"
                                                     height="80"
                                                     alt="Dr. {{ $doctor->name }}">
                                                <div>
                                                    <h5 class="mb-1 fs-3">Dr. {{ $doctor->name }}</h5>
                                                    <p class="text-primary mb-0 fs-5">{{ $doctor->speciality }}</p>
                                                </div>
                                            </div>
                                            <p class="fs-5">{{ $doctor->bio }}</p>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <a href="https://wa.me/{{ $doctor->phone }}" target="_blank" class="btn btn-success fs-5 py-2">
                                                <i class="fab fa-whatsapp me-2"></i> Contact via WhatsApp
                                            </a>
                                            <a href="tel:{{ $doctor->phone }}" class="btn btn-outline-primary fs-5 py-2">
                                                <i class="fas fa-phone-alt me-2"></i> Call
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
            font-size: 18px;
        }

        /* Background pattern for the doctors section */
        .doctors-content-bg {
            background: linear-gradient(rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.92)),
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234e73df' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            position: relative;
            padding: 20px 0 50px;
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
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .doctor-image-wrapper img {
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }

        /* Increase base font size throughout the page */
        body {
            font-size: 18px;
        }

        /* Make pagination larger */
        .pagination .page-link {
            font-size: 18px;
            padding: 10px 16px;
        }

        /* Add slight shadow to section title background */
        .section-title-line + span {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
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
    </style>
@endsection
