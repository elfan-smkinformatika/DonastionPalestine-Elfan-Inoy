<h1>Program Donasi</h1>

<div class="chart-program-donasi">
    <canvas id="donationChart"></canvas>
</div>

<!-- <a href="" class="btn-tambah btn"><img src="" alt="">+ Tambah Program</a> -->

<div class="d-flex mt-4 d-flex gap-3">
    <div class="card-program">
        <img src="" alt="" class="img-card-program">
        <div class="detail-program p-3 py-4">
            <h3 class="title-card-program">Bantuan Pangan Dan Gizi</h3>
            <p class="progress-card-program">Rp. 2,000,000 / Rp. 500,000,000</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
            </div>
        </div>
    </div>
</div>










<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = ['Pangan', 'Kesehatan', 'Pendidikan', 'Bangunan'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Total Donasi dari setiap program donasi',
            data: [65, 59, 80, 81],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const ctx = document.getElementById('donationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>