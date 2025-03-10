@extends('admin.layouts.master')

@section('title')
    Edit Gym
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Edit Gym</h2>
            <p class="text-muted mb-0">Edit the gym's details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('gyms.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <form action="{{ route('gyms.update', $gym->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Gym Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $gym->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $gym->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gym Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($gym->image)
                        <img src="{{ asset('storage/' . $gym->image) }}" alt="{{ $gym->name }}" class="mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $gym->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Gym</button>
            </div>
        </div>
    </form>
</div>
@endsection