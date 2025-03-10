@extends('admin.layouts.master')

@section('title')
    Doctors
@endsection

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark mb-0">Doctors</h2>
            <p class="text-muted mb-0">Manage doctors and their details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('doctors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Add New Doctor
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
                            <th class="px-4 py-3">Photo</th>
                            <th class="px-4 py-3">Doctor Name</th>
                            <th class="px-4 py-3">Speciality</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $doctor)
                            <tr>
                                <td class="px-4 py-3">{{ $doctor->id }}</td>
                                <td class="px-4 py-3">
                                    @if ($doctor->photo)
                                        <img src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}" class="rounded-circle" width="50" height="50">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-user-md text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 fw-medium">{{ $doctor->name }}</td>
                                <td class="px-4 py-3">{{ $doctor->speciality }}</td>
                                <td class="px-4 py-3">
                                    {{ $doctor->phone }} 
                                    <a href="https://wa.me/{{ $doctor->phone }}" target="_blank" class="btn btn-sm btn-outline-success ms-2">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-end">
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="fas fa-user-md fa-2x mb-3 d-block"></i>
                                    No doctors found. Create your first doctor now!
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