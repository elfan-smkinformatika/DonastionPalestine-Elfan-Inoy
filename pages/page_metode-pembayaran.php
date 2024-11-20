    <title>Dashboard Metode Pembayaran Donasi</title>
    <style>
        /* Desain untuk keseluruhan halaman */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f5;
            color: #333;
        }

        .main-container {
            margin-top: 40px;
            padding: 30px;
        }

        .main-title {
            text-align: center;
            font-size: 2.5em;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Styling untuk card dashboard */
        .card-item {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-item h4 {
            font-size: 1.5em;
            color: #34495e;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Styling untuk grafik */
        .chart-container {
            background-color: #f9f9f9;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .chart-title {
            font-size: 1.25em;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 20px;
        }

        /* Styling untuk dropdown pemilihan bulan */
        .month-selector {
            margin-bottom: 25px;
        }

        .month-selector label {
            font-weight: bold;
            margin-right: 10px;
        }

        .month-selector select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
            cursor: pointer;
            background-color: #fff;
        }

        /* Hover efek pada ikon */
        .hover-icon {
            transition: color 0.3s ease;
        }

        .hover-icon:hover {
            color: #1abc9c;
            cursor: pointer;
        }

        /* Responsivitas untuk elemen-elemen */
        @media (max-width: 768px) {
            .card-item {
                margin-bottom: 15px;
            }

            .chart-container {
                padding: 15px;
            }
        }
    </style>

    <body>

        <div class="container main-container">
            <h1 class="main-title">Laporan Metode Pembayaran Donasi</h1>

            <div class="row">
                <!-- Metode Pembayaran Card -->
                <div class="col-lg-6 col-md-12">
                    <div class="card-item">
                        <h4><i class="fas fa-credit-card hover-icon"></i> Metode Pembayaran yang Tersedia</h4>
                        <p>Beberapa metode pembayaran yang sering digunakan oleh para donatur kami:</p>
                        <div class="d-flex flex-wrap">
                            <img src="assets/image/icon-dana.png" alt="Dana" width="150px" class="m-2">
                            <img src="assets/image/icon-ovo.png" alt="OVO" width="150px" class="m-2">
                            <img src="assets/image/icon-gopay.png" alt="GOPAY" width="150px" class="m-2">
                            <img src="assets/image/icon-qris.png" alt="GOPAY" width="150px" class="m-2">
                            <img src="assets/image/icon-sakuku.png" alt="GOPAY" width="150px" class="m-2">
                            <img src="assets/image/icon-shopeePay.png" alt="GOPAY" width="150px" class="m-2">

                        </div>
                    </div>
                </div>

                <!-- Grafik Penggunaan Pembayaran -->
                <div class="col-lg-6 col-md-12">
                    <div class="card-item">
                        <h4><i class="fas fa-chart-line hover-icon"></i> Statistik Penggunaan Metode Pembayaran</h4>
                        <p>Grafik ini menunjukkan jumlah penggunaan setiap metode pembayaran oleh donatur kami:</p>
                        <div class="chart-container">
                            <canvas id="donationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Donatur Paling Sering -->
            <div class="card-item">
                <h4><i class="fas fa-users hover-icon"></i> 5 Donatur Paling Sering Menggunakan Metode Pembayaran</h4>
                <p>Berikut adalah 5 donatur yang paling sering menggunakan metode pembayaran tertentu:</p>
                <div class="chart-container">
                    <canvas id="topDonorsChart"></canvas>
                </div>
            </div>

        </div>

        <!-- Query untuk mendapatkan data menggunakan PHP -->
        <?php
        // Query untuk mendapatkan jumlah penggunaan metode pembayaran dari tabel donatur
        $queryMetodePembayaran = "
        SELECT metode_pembayaran, COUNT(*) AS jumlah_penggunaan
        FROM donatur
        GROUP BY metode_pembayaran
        ORDER BY jumlah_penggunaan DESC";
        $resultMetodePembayaran = mysqli_query($conn, $queryMetodePembayaran);

        $labelsMetode = [];
        $dataMetode = [];
        while ($row = mysqli_fetch_assoc($resultMetodePembayaran)) {
            $labelsMetode[] = $row['metode_pembayaran'];
            $dataMetode[] = $row['jumlah_penggunaan'];
        }

        // Query untuk mendapatkan 5 donatur yang paling sering menggunakan metode pembayaran
        $queryTopDonors = "
        SELECT nama_donatur, metode_pembayaran, COUNT(*) AS jumlah_transaksi
        FROM donatur
        " . ($method ? "WHERE metode_pembayaran = '$method'" : "") . "
        GROUP BY nama_donatur, metode_pembayaran
        ORDER BY jumlah_transaksi DESC
        LIMIT 10";

        $resultTopDonors = mysqli_query($conn, $queryTopDonors);

        $topDonors = [];
        $donorTransactions = [];
        $paymentMethods = [];
        while ($row = mysqli_fetch_assoc($resultTopDonors)) {
            $topDonors[] = $row['nama_donatur'];
            $donorTransactions[] = $row['jumlah_transaksi'];
            $paymentMethods[] = $row['metode_pembayaran'];
        }
        ?>

        <!-- Script untuk grafik menggunakan Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data dari PHP
            const labels = <?= json_encode($labelsMetode) ?>;
            const dataValues = <?= json_encode($dataMetode) ?>;
            const topDonors = <?= json_encode($topDonors) ?>;
            const donorTransactions = <?= json_encode($donorTransactions) ?>;
            const paymentMethods = <?= json_encode($paymentMethods) ?>;

            // Konfigurasi grafik penggunaan metode pembayaran
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Penggunaan Metode Pembayaran',
                    data: dataValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            };

            // Konfigurasi Chart.js untuk grafik penggunaan metode pembayaran
            const ctx1 = document.getElementById('donationChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Penggunaan'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Metode Pembayaran'
                            }
                        }
                    }
                }
            });

            // Konfigurasi Chart.js untuk grafik donatur
            const ctx2 = document.getElementById('topDonorsChart').getContext('2d');
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: topDonors.map((donor, index) => `${donor} (${paymentMethods[index]})`), // Menampilkan nama donatur dan metode pembayaran
                    datasets: [{
                        label: 'Jumlah Transaksi',
                        data: donorTransactions,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 1
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
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Transaksi'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Donatur (Metode Pembayaran)'
                            }
                        }
                    }
                }
            });
        </script>

    </body>

    </html>