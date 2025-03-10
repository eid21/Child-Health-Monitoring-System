@extends('admin.layouts.master')

@section('title')
    Overview
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
    }

    .avatar {
    font-size: 18px;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Activities Chart -->
        <div class="col-lg-7 col-md-12 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Activities</h3>
                    <select class="form-select form-select-sm w-auto">
                        <option selected>Week</option>
                        <option>Month</option>
                    </select>
                </div>
                <div class="card-body">
                    <canvas id="activities-chart"></canvas>
                </div>
            </div>
        </div>

        <!-- My Courses -->
        <div class="col-lg-5 col-md-12 mb-4">
            <div class="card p-3">
                <h3 class="card-title"><strong>My Courses</strong></h3>
                <br>
                <div class="course-list">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="info-box mb-3 text-bg-white d-flex align-items-center">
                        <span class="info-box-icon"> <i class="bi bi-gear-wide-connected"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Mechanical Engineering</span>
                        </div>
                    <!-- زر الخيارات -->
                    <i class="bi bi-three-dots fs-5 text-muted"></i>
                </div>
                    @endfor
                </div>
        </div>
      </div>
    </div>

    <!-- القسم الجديد: 3 أعمدة بجانب بعضها -->
    <div class="row d-flex flex-wrap">
        <!-- Statistics -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card p-3">
                <h3 class="card-title">Statistics</h3>
                <div class="card-body">
                    <canvas id="statistics-chart"></canvas>
                </div>
            </div>
        </div>

        <!-- Course Activities -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card p-3">
              <h3 class="card-title">Course Activities</h3>
              <div class="card-body d-flex flex-column align-items-center">
                  <div class="progress-circle">
                      <canvas id="course-activities-chart" width="150" height="150"></canvas>
                  </div>
                  <div class="mt-3 d-flex align-items-center">
                      <span class="me-2 text-primary fw-bold">⬤ Completed</span>
                      <span class="text-secondary">⬤ Not Completed</span>
                  </div>
              </div>
          </div>
        </div>
      
        <!-- Completed Course -->
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Completed Course</h3>
                    <i class="bi bi-three-dots"></i> <!-- أيقونة الخيارات -->
                </div>

                <div class="progress-group">
                    <p class="mb-1 text-muted">Mechanical Engineering <span class="float-end"><b>75</b>/100</span></p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 75%; background-color: #ff8000;"></div>
                    </div>
                </div>

                <div class="progress-group mt-3">
                    <p class="mb-1 text-muted">Mechanical Engineering <span class="float-end"><b>65</b>/100</span></p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 65%; background-color: #007bff;"></div>
                    </div>
                </div>

                <div class="progress-group mt-3">
                    <p class="mb-1 text-muted">Mechanical Engineering <span class="float-end"><b>30</b>/100</span></p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 30%; background-color: #7b68ee;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
          <div class="col-lg-12">
              <div class="card p-3">
                  <h3 class="card-title">Top Students</h3>
                  <p class="text-muted">Add them to the list</p>
                  <div class="row">
                      @foreach(['Anna Karlos', 'Karla May', 'Bill Jason', 'Alan Baker'] as $student)
                      <div class="col-md-6 mb-3">
                          <div class="d-flex align-items-center p-3 shadow-sm bg-white rounded">
                              <div class="avatar bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                  <i class="bi bi-person-fill text-muted"></i>
                              </div>
                              <div class="flex-grow-1">
                                  <h6 class="m-0">{{ $student }}</h6>
                                  <small class="text-muted">Mechanical Engineering</small>
                              </div>
                              <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                  <i class="bi bi-plus"></i>
                              </button>
                          </div>
                      </div>
                      @endforeach
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

    // Activities Chart
    const ctx = document.getElementById('activities-chart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['10 Oct', '12 Oct', '14 Oct', '16 Oct', '18 Oct', '20 Oct', '22 Oct', '24 Oct'],
            datasets: [
                {
                    label: 'Theory',
                    data: [2, 3, 4, 5, 3, 4, 5, 6],
                    borderColor: '#ff8000',
                    backgroundColor: 'rgba(255, 128, 0, 0.2)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Practice',
                    data: [3, 4, 3, 6, 5, 7, 5, 8],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
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
                }
            }
        }
    });

    // Statistics Chart
    const statisticsCtx = document.getElementById('statistics-chart').getContext('2d');
    new Chart(statisticsCtx, {
        type: 'bar',
        data: {
            labels: ['2017', '2018', '2019', '2020', '2021', '2022'],
            datasets: [{
                label: 'Enrolled Students',
                data: [150, 600, 400, 700, 850, 650],
                backgroundColor: ['#dfe6f0', '#dfe6f0', '#dfe6f0', '#007bff', '#dfe6f0', '#dfe6f0'],
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});
</script>
@endsection
