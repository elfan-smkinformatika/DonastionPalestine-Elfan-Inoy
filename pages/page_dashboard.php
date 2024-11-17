<h3 class="mb-5">Laporan Terkumpulnya Donasi</h3>

<div class="row1 d-flex gap-3 flex-wrap">
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total donasi seluruhnya</p>
        <h2>Rp. 4,000,000</h2>
    </div>
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total donasi bulan ini</p>
        <h2>Rp. 4,000,000</h2>
        <p>+Rp. 200,000 dari bulan kemarin</p>
    </div>
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total Donatur</p>
        <h2>54</h2>
        <p>+Rp. 200,000 dari bulan kemarin</p>
    </div>
</div>

<div class="d-flex gap-3 mt-3 w-100">
    <div class="chart">
        <canvas class="" id="myChart"></canvas>
    </div>
    <div class="program-donasi">
        <h1>Program donasi</h1>
        <div class="card-program d-flex">
            <img class="img-program" src="" alt="">
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-program">Bantuan Pangan dan Gizi</h3>
                <p class="status">Status: active</p>
            </div>
        </div>
        <div class="card-program d-flex">
            <img class="img-program" src="" alt="">
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-program">Bantuan Pangan dan Gizi</h3>
                <p class="status">Status: active</p>
            </div>
        </div>
        <div class="card-program d-flex">
            <img class="img-program" src="" alt="">
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-program">Bantuan Pangan dan Gizi</h3>
                <p class="status">Status: active</p>
            </div>
        </div>
        <div class="card-program d-flex">
            <img class="img-program" src="" alt="">
            <div class="d-flex flex-column justify-content-center">
                <h3 class="title-program">Bantuan Pangan dan Gizi</h3>
                <p class="status">Status: active</p>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>