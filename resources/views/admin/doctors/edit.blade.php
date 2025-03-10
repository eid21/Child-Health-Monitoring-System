@extends('admin.layouts.master')

@section('title')
    Edit Doctor
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Edit Doctor</h2>
            <p class="text-muted mb-0">Edit the doctor's details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $doctor->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @if ($doctor->photo)
                        <img src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}" class="mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="speciality" class="form-label">Speciality</label>
                    <input type="text" class="form-control" id="speciality" name="speciality" value="{{ $doctor->speciality }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Doctor</button>
            </div>
        </div>
    </form>
</div>
@endsection