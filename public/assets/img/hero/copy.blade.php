@extends('admin.layouts.master')

@section('title')
    Dashboard Overview
@endsection

@section('css')
<style>
    .progress-circle {
        width: 120px;
        height: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .progress-circle p {
        position: absolute;
        font-size: 22px;
        font-weight: bold;
        color: #007bff;
    }

    .progress {
        height: 10px;
        border-radius: 10px;
    }

    .card {
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .avatar {
        font-size: 18px;
    }

    .stat-card {
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.7;
    }
</style>
@endsection

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Overview</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Stats Cards Row -->
        <div class="row">
            <!-- Doctors Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card stat-card bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted">Doctors</h5>
                                <h2 class="fw-bold">{{ \App\Models\Doctor::count() }}</h2>
                                <p class="mb-0 text-success">
                                    <i class="bi bi-arrow-up"></i> 
                                    <span>{{ \App\Models\Doctor::where('created_at', '>=', now()->subDays(7))->count() }}</span>
                                    <span class="text-muted">new this week</span>
                                </p>
                            </div>
                            <div class="stat-icon text-primary">
                                <i class="bi bi-person-check"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('doctors.index') }}" class="btn btn-sm btn-primary">View All</a>
                            <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gyms Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card stat-card bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted">Gyms</h5>
                                <h2 class="fw-bold">{{ \App\Models\Gym::count() }}</h2>
                                <p class="mb-0 text-success">
                                    <i class="bi bi-arrow-up"></i> 
                                    <span>{{ \App\Models\Gym::where('created_at', '>=', now()->subDays(7))->count() }}</span>
                                    <span class="text-muted">new this week</span>
                                </p>
                            </div>
                            <div class="stat-icon text-warning">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('gyms.index') }}" class="btn btn-sm btn-warning">View All</a>
                            <a href="{{ route('gyms.create') }}" class="btn btn-sm btn-outline-warning">Add New</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exercises Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card stat-card bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted">Exercises</h5>
                                <h2 class="fw-bold">{{ \App\Models\Exercise::count() }}</h2>
                                <p class="mb-0 text-success">
                                    <i class="bi bi-arrow-up"></i> 
                                    <span>{{ \App\Models\Exercise::where('created_at', '>=', now()->subDays(7))->count() }}</span>
                                    <span class="text-muted">new this week</span>
                                </p>
                            </div>
                            <div class="stat-icon text-success">
                                <i class="bi bi-activity"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('exercises.index') }}" class="btn btn-sm btn-success">View All</a>
                            <a href="{{ route('exercises.create') }}" class="btn btn-sm btn-outline-success">Add New</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Food Systems Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card stat-card bg-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted">Food Systems</h5>
                                <h2 class="fw-bold">{{ \App\Models\FoodSystem::count() }}</h2>
                                <p class="mb-0 text-success">
                                    <i class="bi bi-arrow-up"></i> 
                                    <span>{{ \App\Models\FoodSystem::where('created_at', '>=', now()->subDays(7))->count() }}</span>
                                    <span class="text-muted">new this week</span>
                                </p>
                            </div>
                            <div class="stat-icon text-danger">
                                <i class="bi bi-apple"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('foodsystem.index') }}" class="btn btn-sm btn-danger">View All</a>
                            <a href="{{ route('foodsystem.create') }}" class="btn btn-sm btn-outline-danger">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Activities Chart -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Activities</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="activities-chart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Completion Rate Chart -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Completion Rate</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="progress-circle mx-auto">
                            <canvas id="course-activities-chart" height="200"></canvas>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Exercises</span>
                                <span>85%</span>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Food Systems</span>
                                <span>68%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="row">
            <!-- Statistics Chart -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Yearly Statistics</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="statistics-chart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Messages/Subscribers Quick View -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recent Activities</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <span>New Messages</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ \App\Models\Contact::count() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-people text-success me-2"></i>
                                    <span>Subscribers</span>
                                </div>
                                <span class="badge bg-success rounded-pill">{{ \App\Models\Subscriber::count() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-person-check text-warning me-2"></i>
                                    <span>New Doctors</span>
                                </div>
                                <span class="badge bg-warning rounded-pill">{{ \App\Models\Doctor::where('created_at', '>=', now()->subDays(30))->count() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-building text-danger me-2"></i>
                                    <span>New Gyms</span>
                                </div>
                                <span class="badge bg-danger rounded-pill">{{ \App\Models\Gym::where('created_at', '>=', now()->subDays(30))->count() }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-outline-primary">View Messages</a>
                            <a href="{{ route('subscriber.index') }}" class="btn btn-sm btn-outline-success">View Subscribers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Entries -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Latest Doctors</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Specialty</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Doctor::latest()->take(5)->get() as $doctor)
                                    <tr>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->specialty }}</td>
                                        <td>
                                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('doctors.index') }}" class="btn btn-primary btn-sm">View All Doctors</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Latest Exercises</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Exercise::latest()->take(5)->get() as $exercise)
                                    <tr>
                                        <td>{{ $exercise->name }}</td>
                                        <td>{{ $exercise->category }}</td>
                                        <td>
                                            <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('exercises.index') }}" class="btn btn-success btn-sm">View All Exercises</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Latest Gyms</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Gym::latest()->take(5)->get() as $gym)
                                <tr>
                                    <td>{{ $gym->name }}</td>
                                    <td>{{ $gym->location }}</td>
                                    <td>
                                        <a href="{{ route('gyms.edit', $gym->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('gyms.index') }}" class="btn btn-warning btn-sm">View All Gyms</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Latest Food Systems</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\FoodSystem::latest()->take(5)->get() as $foodSystem)
                                <tr>
                                    <td>{{ $foodSystem->name }}</td>
                                    <td>{{ $foodSystem->type }}</td>
                                    <td>
                                        <a href="{{ route('foodsystem.edit', $foodSystem->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('foodsystem.index') }}" class="btn btn-danger btn-sm">View All Food Systems</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('doctors.create') }}" class="btn btn-outline-primary btn-lg w-100">
                                <i class="bi bi-plus-circle mb-2 d-block" style="font-size: 24px;"></i>
                                Add Doctor
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('gyms.create') }}" class="btn btn-outline-warning btn-lg w-100">
                                <i class="bi bi-plus-circle mb-2 d-block" style="font-size: 24px;"></i>
                                Add Gym
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('exercises.create') }}" class="btn btn-outline-success btn-lg w-100">
                                <i class="bi bi-plus-circle mb-2 d-block" style="font-size: 24px;"></i>
                                Add Exercise
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('foodsystem.create') }}" class="btn btn-outline-danger btn-lg w-100">
                                <i class="bi bi-plus-circle mb-2 d-block" style="font-size: 24px;"></i>
                                Add Food System
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-info btn-lg w-100">
                                <i class="bi bi-envelope mb-2 d-block" style="font-size: 24px;"></i>
                                Messages
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <a href="{{ route('subscriber.index') }}" class="btn btn-outline-secondary btn-lg w-100">
                                <i class="bi bi-people mb-2 d-block" style="font-size: 24px;"></i>
                                Subscribers
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
// تسجيل خاصية لإضافة الرقم في منتصف الدائرة
Chart.register({
    id: 'center-text',
    beforeDraw: function(chart) {
        if (chart.config.type === 'doughnut') {
            var width = chart.width,
                height = chart.height,
                ctx = chart.ctx;

            ctx.restore();
            var fontSize = (height / 150).toFixed(2); 
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle";

            var text = chart.data.datasets[0].data[0] + "%", 
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;

            ctx.fillStyle = "#007bff";
            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    }
});

// Course Activities Chart
const courseActivitiesCtx = document.getElementById('course-activities-chart').getContext('2d');
new Chart(courseActivitiesCtx, {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Not Completed'],
        datasets: [{
            data: [75, 25], 
            backgroundColor: ['#007bff', '#e6ecf3'],
            borderWidth: 0
            
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            }
        }
    }
});

// Activities Chart - Modified to show data for all main entities
const ctx = document.getElementById('activities-chart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        datasets: [
            {
                label: 'Doctors',
                data: [12, 19, 15, 17, 14, 18, 16, 20],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Gyms',
                data: [7, 11, 8, 14, 9, 12, 10, 15],
                borderColor: '#fd7e14',
                backgroundColor: 'rgba(253, 126, 20, 0.2)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Exercises',
                data: [25, 32, 28, 35, 30, 38, 34, 42],
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.2)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Food Systems',
                data: [15, 22, 18, 25, 20, 28, 24, 30],
                borderColor: '#dc3545',
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                fill: true,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            title: {
                display: true,
                text: 'Monthly Growth'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Entries'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            }
        }
    }
});

// Statistics Chart - Yearly user engagement
const statisticsCtx = document.getElementById('statistics-chart').getContext('2d');
new Chart(statisticsCtx, {
    type: 'bar',
    data: {
        labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
        datasets: [{
            label: 'Total Platform Users',
            data: [1250, 1850, 2400, 3700, 4850, 5650],
            backgroundColor: [
                '#dfe6f0', 
                '#dfe6f0', 
                '#dfe6f0', 
                '#dfe6f0', 
                '#007bff', 
                '#28a745'
            ],
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Users'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Year'
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Yearly User Growth'
            }
        }
    }
});
});
</script>
@endsection