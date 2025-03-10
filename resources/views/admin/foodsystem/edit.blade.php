@extends('admin.layouts.master')

@section('title')
    Edit Meal
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Edit Meal</h2>
            <p class="text-muted mb-0">Edit the meal's details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('foodsystem.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <form action="{{ route('foodsystem.update', $foodsystem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Meal Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $foodsystem->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Meal Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($foodsystem->image)
                        <img src="{{ asset('storage/' . $foodsystem->image) }}" alt="{{ $foodsystem->name }}" class="mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $foodsystem->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="text" class="form-control" id="time" name="time" value="{{ $foodsystem->time }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Meal</button>
            </div>
        </div>
    </form>
</div>
@endsection