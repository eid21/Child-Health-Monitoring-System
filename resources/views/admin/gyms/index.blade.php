@extends('admin.layouts.master')

@section('title')
    Gyms
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Gyms</h2>
            <p class="text-muted mb-0">Manage gyms and their details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('gyms.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Add New Gym
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
                            <th class="px-4 py-3">Gym Name</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gyms as $gym)
                            <tr>
                                <td class="px-4 py-3">{{ $gym->id }}</td>
                                <td class="px-4 py-3">
                                    @if ($gym->image)
                                        <img src="{{ asset('storage/' . $gym->image) }}" alt="{{ $gym->name }}" class="rounded-circle" width="50" height="50">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-dumbbell text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 fw-medium">{{ $gym->name }}</td>
                                <td class="px-4 py-3">{{ $gym->phone }}</td>
                                <td class="px-4 py-3">{{ $gym->description }}</td>
                                <td class="px-4 py-3 text-end">
                                    <a href="{{ route('gyms.edit', $gym->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('gyms.destroy', $gym->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this gym?')">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="fas fa-dumbbell fa-2x mb-3 d-block"></i>
                                    No gyms found. Create your first gym now!
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