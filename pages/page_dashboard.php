<h3 class="mb-5">Laporan Terkumpulnya Donasi</h3>

<div class="row1 d-flex gap-3 flex-wrap">
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total donasi seluruhnya</p>
        <?php
        $queryTotal = "SELECT SUM(nominal) AS total_donasi FROM donatur";
        $resultTotal = mysqli_query($conn, $queryTotal);
        $rowTotal = mysqli_fetch_assoc($resultTotal);
        ?>
        <h2>Rp. <?= number_format($rowTotal['total_donasi']) ?></h2>
    </div>
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total donasi bulan ini</p>
        <?php
        $queryTotalMoon = "SELECT SUM(nominal) AS total_donasi_bulan_ini FROM donatur WHERE MONTH(give_at) = MONTH(CURRENT_DATE)";
        $resultTotalMoon = mysqli_query($conn, $queryTotalMoon);
        $rowTotalMoon = mysqli_fetch_assoc($resultTotalMoon);
        ?>
        <h2>Rp. <?= number_format($rowTotalMoon['total_donasi_bulan_ini']) ?></h2>
        <?php
        $querySelisih = "SELECT SUM(nominal) AS selisih_nominal FROM donatur WHERE MONTH(give_at) = MONTH(CURRENT_DATE) - 1";
        $resultSelisih = mysqli_query($conn, $querySelisih);
        $rowSelisih = mysqli_fetch_assoc($resultSelisih);
        ?>
        <p>+Rp. <?= number_format($rowSelisih['selisih_nominal']) ?> adalah selisih nominal dari bulan kemarin</p>
    </div>
    <div class="card-dashboard card-total_donasi">
        <p class="title-card-dashboard">Total Donatur</p>
        <?php
        $queryTotalDonatur = "SELECT COUNT(DISTINCT nama_donatur) AS total_donatur FROM donatur";
        $resultTotalDonatur = mysqli_query($conn, $queryTotalDonatur);
        $rowTotalDonatur = mysqli_fetch_assoc($resultTotalDonatur);
        ?>
        <h2><?= $rowTotalDonatur['total_donatur'] ?></h2>
        <?php
        $queryBulanIni = "SELECT COUNT(DISTINCT nama_donatur) AS jumlah_orang_bulan_ini FROM donatur WHERE MONTH(give_at) = MONTH(CURRENT_DATE)";
        $resultBulanIni = mysqli_query($conn, $queryBulanIni);
        $rowBulanIni = mysqli_fetch_assoc($resultBulanIni);

        $queryBulanKemarin = "SELECT COUNT(DISTINCT nama_donatur) AS jumlah_orang_bulan_kemarin FROM donatur WHERE MONTH(give_at) = MONTH(CURRENT_DATE) - 1";
        $resultBulanKemarin = mysqli_query($conn, $queryBulanKemarin);
        $rowBulanKemarin = mysqli_fetch_assoc($resultBulanKemarin);

        $selisihOrang = $rowBulanIni['jumlah_orang_bulan_ini'] - $rowBulanKemarin['jumlah_orang_bulan_kemarin'];
        ?>
        <p>selisih orang yang berdonasi menambah <?= $selisihOrang ?> orang</p>
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
<?php
// Query untuk mendapatkan top 10 donatur
$queryTopDonatur = "
    SELECT nama_donatur, SUM(nominal) AS total_donasi
    FROM donatur
    GROUP BY nama_donatur
    ORDER BY total_donasi DESC
    LIMIT 10";
$resultTopDonatur = mysqli_query($conn, $queryTopDonatur);

// Siapkan data untuk JavaScript
$labels = [];
$data = [];
while ($row = mysqli_fetch_assoc($resultTopDonatur)) {
    $labels[] = $row['nama_donatur'];
    $data[] = $row['total_donasi'];
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    // Data dari PHP
    const labels = <?= json_encode($labels) ?>;
    const data = <?= json_encode($data) ?>;

    // Membuat grafik
    const config = {
        type: 'line', // Tipe grafik adalah line
        data: {
            labels: labels,
            datasets: [{
                label: 'Nominal Donasi (Rp)',
                data: data,
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderWidth: 2,
                tension: 0.4 // Menambahkan efek lengkung pada garis
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    title: {
                        display: true,
                        text: 'Nominal Donasi (Rp)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Nama Donatur'
                    }
                }
            }
        }
    };

    // Render Chart
    new Chart(ctx, config);
</script>