@extends('admin.index')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body bg-dark text-white">
        <h3 class="card-title">Dashboard</h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <div class="col-12">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h3 class="card-title text-center">Grafik Absensi</h3>
        <div style="width: 100%;margin: 0px auto;">
          <canvas id="chartAbsensi"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mb-5">
    <div class="col-12">
      <div class="card" style="width: 100%;">
        <div class="card-body table-responsive">
          <h3 class="card-title text-center mb-3">Daftar Kehadiran</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Waktu</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




<script>
  var ctx = document.getElementById("chartAbsensi").getContext('2d');
  var chartAbsensi = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Dua hari yang lalu", "Kemarin", "Hari ini"],
      datasets: [{
        label: 'Data Absensi',
        data: [
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
@endsection
