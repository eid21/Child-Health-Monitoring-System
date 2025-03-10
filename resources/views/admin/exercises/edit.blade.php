@extends('admin.layouts.master')

@section('title')
    Edit Exercise
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Edit Exercise</h2>
            <p class="text-muted mb-0">Edit the exercise's details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('exercises.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Exercise Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $exercise->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $exercise->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Exercise Video</label>
                    <input type="file" class="form-control" id="video" name="video">
                    @if ($exercise->video)
                        <video width="200" controls class="mt-2">
                            <source src="{{ asset('storage/' . $exercise->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Exercise Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($exercise->image)
                        <img src="{{ asset('storage/' . $exercise->image) }}" alt="{{ $exercise->name }}" class="mt-2" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Exercise</button>
            </div>
        </div>
    </form>
</div>
@endsection