<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Donasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container main-side">
        <h3 class="mb-5">Laporan Terkumpulnya Donasi</h3>

        <!-- Dropdown untuk memilih bulan -->
        <form method="GET" class="mb-3">
            <label for="bulan">Pilih Bulan:</label>
            <select name="bulan" id="bulan" onchange="this.form.submit()">
                <?php
                // Daftar bulan
                $months = [
                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                ];
                $selectedMonth = isset($_GET['bulan']) ? (int)$_GET['bulan'] : date('n');
                foreach ($months as $key => $value) {
                    echo "<option value='$key' " . ($key == $selectedMonth ? 'selected' : '') . ">$value</option>";
                }
                ?>
            </select>
        </form>

        <div class="row1 d-flex gap-3 flex-wrap">
            <div class="card-dashboard fade-in">
                <p class="title-card-dashboard">Total Donasi Seluruhnya</p>
                <?php
                $queryTotal = "SELECT SUM(nominal) AS total_donasi FROM donatur";
                $resultTotal = mysqli_query($conn, $queryTotal);
                $rowTotal = mysqli_fetch_assoc($resultTotal);
                ?>
                <h2>Rp. <?= number_format($rowTotal['total_donasi']) ?></h2>
            </div>
            <div class="card-dashboard fade-in-row-right">
                <p class="title-card-dashboard">Total Donasi Bulan Ini</p>
                <?php
                $queryTotalMoon = "SELECT SUM(nominal) AS total_donasi_bulan_ini FROM donatur WHERE MONTH(give_at) = $selectedMonth";
                $resultTotalMoon = mysqli_query($conn, $queryTotalMoon);
                $rowTotalMoon = mysqli_fetch_assoc($resultTotalMoon);
                ?>
                <h2>Rp. <?= number_format($rowTotalMoon['total_donasi_bulan_ini']) ?></h2>
                <?php
                $querySelisih = "SELECT SUM(nominal) AS selisih_nominal FROM donatur WHERE MONTH(give_at) = $selectedMonth - 1";
                $resultSelisih = mysqli_query($conn, $querySelisih);
                $rowSelisih = mysqli_fetch_assoc($resultSelisih);
                ?>
                <p>+Rp. <?= number_format($rowSelisih['selisih_nominal']) ?> adalah selisih nominal dari bulan kemarin</p>
            </div>
            <div class="card-dashboard zoom-in">
                <p class="title-card-dashboard">Total Donatur</p>
                <?php
                $queryTotalDonatur = "SELECT COUNT(DISTINCT nama_donatur) AS total_donatur FROM donatur";
                $resultTotalDonatur = mysqli_query($conn, $queryTotalDonatur);
                $rowTotalDonatur = mysqli_fetch_assoc($resultTotalDonatur);
                ?>
                <h2><?= $rowTotalDonatur['total_donatur'] ?></h2>
                <?php
                $queryBulanIni = "SELECT COUNT(DISTINCT nama_donatur) AS jumlah_orang_bulan_ini FROM donatur WHERE MONTH(give_at) = $selectedMonth";
                $resultBulanIni = mysqli_query($conn, $queryBulanIni);
                $rowBulanIni = mysqli_fetch_assoc($resultBulanIni);

                $queryBulanKemarin = "SELECT COUNT(DISTINCT nama_donatur) AS jumlah_orang_bulan_kemarin FROM donatur WHERE MONTH(give_at) = $selectedMonth - 1";
                $resultBulanKemarin = mysqli_query($conn, $queryBulanKemarin);
                $rowBulanKemarin = mysqli_fetch_assoc($resultBulanKemarin);

                $selisihOrang = $rowBulanIni['jumlah_orang_bulan_ini'] - $rowBulanKemarin['jumlah_orang_bulan_kemarin'];
                ?>
                <p>Selisih orang yang berdonasi menambah <?= $selisihOrang ?> orang</p>
            </div>
        </div>

        <div class="d-flex gap-3 mt-3 w-100">
            <div class="chart fade-in-row-left">
                <canvas id="myChart"></canvas>
            </div>
            <div class="program-donasi">
                <h1>Program Donasi</h1>
                <div class="card-program d-flex fade-in">
                    <img class="img-program" src="" alt="">
                    <div>
                        <h3 class="title-program">Bantuan Pangan dan Gizi</h3>
                        <p class="status">Status: Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Query untuk mendapatkan total donasi setiap harinya selama bulan yang dipilih
    $queryTotalDonasiHarian = "
    SELECT DAY(give_at) AS hari, SUM(nominal) AS total_donasi
    FROM donatur
    WHERE MONTH(give_at) = $selectedMonth
    GROUP BY DAY(give_at)
    ORDER BY total_donasi DESC";
    $resultTotalDonasiHarian = mysqli_query($conn, $queryTotalDonasiHarian);

    // Menambahkan nama bulan
    $bulan = $months[$selectedMonth]; // Nama bulan sekarang
    $labels = [];
    $data = [];
    while ($row = mysqli_fetch_assoc($resultTotalDonasiHarian)) {
        $labels[] = $row['hari']; // Menyimpan hari untuk label
        $data[] = $row['total_donasi']; // Menyimpan total donasi per hari
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        // Data dari PHP
        const labels = <?= json_encode($labels) ?>;
        const data = <?= json_encode($data) ?>;

        // Menambahkan keterangan bulan
        const bulan = '<?= $bulan ?>'; // Menambahkan nama bulan ke chart

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
                            text: 'Hari pada Bulan ' + bulan // Menambahkan bulan ke keterangan sumbu X
                        }
                    }
                }
            }
        };

        // Render Chart
        new Chart(ctx, config);
    </script>
</body>

</html>