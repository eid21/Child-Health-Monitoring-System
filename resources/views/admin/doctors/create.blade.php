@extends('admin.layouts.master')

@section('title')
    Add New Doctor
@endsection

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h2 class="fw-bold text-dark mb-0">Add New Doctor</h2>
                <p class="text-muted mb-0">Fill in the details for the new doctor</p>
            </div>
            <div class="col-auto">
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>

        <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="speciality" class="form-label">Speciality</label>
                        <input type="text" class="form-control" id="speciality" name="speciality" required>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Enter a brief bio about the doctor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Doctor</button>
                </div>
            </div>
        </form>
    </div>
@endsection
