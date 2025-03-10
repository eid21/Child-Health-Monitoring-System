@extends('admin.layouts.master')

@section('title')
    Food System
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Food System</h2>
            <p class="text-muted mb-0">Manage meals and their details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('foodsystem.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Add New Meal
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Meal Name</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Time</th>
                            <th class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($foods as $food)
                            <tr>
                                <td class="px-4 py-3">{{ $food->id }}</td>
                                <td class="px-4 py-3">
                                    @if ($food->image)
                                        <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="rounded-circle" width="50" height="50">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-utensils text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 fw-medium">{{ $food->name }}</td>
                                <td class="px-4 py-3">{{ $food->description }}</td>
                                <td class="px-4 py-3">{{ $food->time }}</td>
                                <td class="px-4 py-3 text-end">
                                    <a href="{{ route('foodsystem.edit', $food->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('foodsystem.destroy', $food->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this meal?')">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="fas fa-utensils fa-2x mb-3 d-block"></i>
                                    No meals found. Create your first meal now!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection