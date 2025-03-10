@extends('admin.layouts.master')

@section('title')
    Add New Exercise
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Add New Exercise</h2>
            <p class="text-muted mb-0">Fill in the details for the new exercise</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('exercises.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <form action="{{ route('exercises.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Exercise Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Exercise Video</label>
                    <input type="file" class="form-control" id="video" name="video">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Exercise Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Exercise</button>
            </div>
        </div>
    </form>
</div>
@endsection