<?php
require_once "include/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harapan Palestina di Tangan Kita | 2024 Tahun Berbagi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/image/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-nav py-3 shadow-sm fixed-top">
        <div class="container-fluid">
            <img src="assets/image/favicon.png" alt="" width="60px">
            <a class="navbar-brand fw-bold" href="../DonastionPalestine-Elfan-Inoy/">SanadPelastine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#program-donasi">Program Donasi</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#donasi-diterima">Donasi yang Diterima</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Start Beranda -->
    <div id="beranda">
        <div class="container py-4">
            <h1 class="tagline-home text-light">Bersama Membangun Harapan untuk Palestina</h1>
            <h4 class="desc-title-home text-light">Setiap donasi yang Anda berikan adalah secercah harapan bagi warga Palestina yang terus berjuang di tengah kesulitan. Jadilah bagian dari perubahan, dukung hidup, pendidikan, dan kesejahteraan mereka.</h4>
            <a href="pages/form_donasi.php" class="btn p-3 bg-orange text-light mt-4 d-inline-block">Donasi Sekarang</a>
            <li class="text-light mt-2">Sekecil apa pun donasi Anda, perubahan besar akan terjadi di sana.</li>
        </div>
    </div>
    <!-- End Beranda -->

    <!-- Start Tentang Kami -->
    <div id="tentang-kami" class="paddtop">
        <div class="container py-5 position-relative">
            <!-- pop laporan -->
            <?php
            // Ambil data total donasi dan target dari database
            $queryTotalDonasi = "SELECT SUM(nominal) AS total_donasi FROM donatur";
            $resultTotalDonasi = mysqli_query($conn, $queryTotalDonasi);
            $rowTotalDonasi = mysqli_fetch_assoc($resultTotalDonasi);
            $totalDonasi = $rowTotalDonasi['total_donasi'] ?? 0; // Jika NULL, maka set ke 0

            // Tentukan target donasi (misal Rp 10.000.000)
            $targetDonasi = 10000000;

            // Hitung persentase
            $persentase = ($totalDonasi / $targetDonasi) * 100;
            $persentase = $persentase > 100 ? 100 : $persentase; // Batas maksimal 100%
            ?>
            <div class="pop-laporan text-light rounded-3 p-4 position-absolute end-0">
                <h1 class="tagline-laporan">Dukungan Anda Telah Terkumpul untuk Palestina!</h1>
                <p>Bersama, kita kuat. Setiap kontribusi Anda membawa harapan.</p>
                <div class="line-statistic">
                    <!-- Menampilkan jumlah donasi terkumpul dan target -->
                    <span class="progress-text">
                        Rp. <?= number_format($totalDonasi, 0, ',', '.') ?> / Rp. <?= number_format($targetDonasi, 0, ',', '.') ?>
                    </span>
                    <div class="progress">
                        <!-- Menampilkan progres bar dengan lebar sesuai persentase -->
                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: <?= $persentase ?>%;"
                            aria-valuenow="<?= $persentase ?>"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            <?= round($persentase, 2) ?>%
                        </div>
                    </div>
                </div>
            </div>

            <!-- end pop laporan -->
            <h4 class="title-page mb-5">Tentang Kami</h4>
            <div class="d-flex d-">
                <img src="assets/image/about-gaza.png" width="400px" class="me-4 rounded">
                <div class="content-tentang">
                    <h3 class="title-tentang">Bersama untuk Palestina: Memberi Harapan di Tengah Krisis</h3>
                    <p class="paragraf-tentangkami">Kami hadir untuk menjadi jembatan antara kebaikan Anda dan harapan jutaan warga Palestina yang membutuhkan. Di tengah krisis kemanusiaan yang berkepanjangan, kami percaya bahwa setiap bantuan memiliki kekuatan untuk mengubah kehidupan. Kami berkomitmen untuk memastikan setiap donasi yang Anda berikan dapat membawa harapan dan kepedulian nyata ke setiap hati yang membutuhkan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tentang Kami -->

    <!-- Start Donasi -->
    <div id="program-donasi" class="paddtop">
        <div class="container">
            <h4 class="title-page mb-5">Program Donasi</h4>
            <!-- Card -->
            <div class="d-flex justify-content-center flex-wrap">
                <div class="card m-3" style="width: 18rem;">
                    <img src="assets/image/gaza-berbagimakanan.png" class="card-img-top rounded" alt="Bantuan Pangan dan Gizi" style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Bantuan Pangan dan Gizi</h5>
                        <p class="card-text">Program ini bertujuan untuk menyediakan makanan pokok dan nutrisi bagi keluarga yang terkena dampak konflik. Dengan akses pangan yang terbatas, banyak keluarga di Palestina mengalami krisis kelaparan dan kekurangan gizi, terutama anak-anak dan lansia.</p>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="assets/image/gaza-kesehatan.png" class="card-img-top rounded" alt="Layanan Kesehatan dan Medis" style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Layanan Kesehatan dan Medis</h5>
                        <p class="card-text">Krisis kemanusiaan di Palestina telah menyebabkan banyak warga kesulitan mendapatkan layanan kesehatan. Program ini berfokus pada penyediaan obat-obatan, perawatan medis, serta alat bantu kesehatan bagi mereka yang terdampak.</p>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="assets/image/gaza-pendidikan.png" class="card-img-top rounded" alt="Pendidikan dan Masa Depan Anak-Anak" style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Pendidikan dan Masa Depan Anak-Anak</h5>
                        <p class="card-text">Konflik berkepanjangan di Palestina membuat anak-anak sering kehilangan akses pendidikan yang layak. Program ini berfokus pada pemberian dukungan untuk pendidikan, termasuk perlengkapan sekolah dan beasiswa bagi anak-anak yang kurang mampu.</p>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="assets/image/gaza-crisiAir.png" class="card-img-top rounded" alt="Program Pembangunan Infrastruktur Air dan Sanitasi" style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Program Pembangunan Infrastruktur Air dan Sanitasi</h5>
                        <p class="card-text">Banyak warga Palestina kesulitan mendapatkan akses ke air bersih dan fasilitas sanitasi yang memadai. Program ini berfokus pada penyediaan air bersih dan pembangunan infrastruktur sanitasi untuk meningkatkan kualitas kesehatan masyarakat.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Donasi -->

    <!-- Start Donasi Diterima -->
    <div id="donasi-diterima" class="paddtop">
        <div class="container">
            <h1 class="title-page">Donasi yang Diterima</h1>
        </div>
        <div class="container-cards">
            <div class="container">
                <div id="card-container" class="container-cards">
                    <?php
                    // Query untuk mendapatkan data donasi
                    $queryDonatur = "SELECT id_donatur, nama_donatur, nominal, pesan FROM donatur LIMIT 10";
                    $resultDonatur = mysqli_query($conn, $queryDonatur);

                    // Periksa jika data ditemukan
                    if (mysqli_num_rows($resultDonatur) > 0) {
                        // Iterasi data dari hasil query
                        while ($data = mysqli_fetch_assoc($resultDonatur)) {
                            echo "
                        <div class='card-donatur'>
                            <div class='name_no-donatur'>
                                <p class='no-donatur'>#{$data['id_donatur']}</p>
                                <h1 class='name-donatur'>{$data['nama_donatur']}</h1>
                            </div>
                            <div class='count_msg'>
                                <h4 class='count-donatur'>Telah Berdonasi Rp." . number_format($data['nominal'], 0, ',', '.') . "</h4>
                                <p class='msg-donatur'>{$data['pesan']}</p>
                            </div>
                        </div>";
                        }
                    } else {
                        echo "<p class='text-center'>Belum ada donasi yang diterima.</p>";
                    }
                    ?>
                </div>
                <button id="load-more" class="load-more">Load More</button>
            </div>
        </div>
    </div>

    <!-- End Donasi Diterima -->

    <!-- Start Footer -->
    <div id="footer" class="paddtop">
        <div class="container d-flex">
            <!-- <div class="image-owner">
                <img src="assets/image/" alt="Elfan">
                <img src="assets/image/" alt="Inoyy">
            </div> -->
            <div class="navbar-footer">
                <h3>Navbar</h3>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang-kami">Tentang Kami</a></li>
                <li><a href="#program-donasi">Program Donasi</a></li>
                <li><a href="#donasi-diterima">Donasi yang Diterima</a></li>
            </div>
            <div class="contact-footer">
                <h3>Hubungi Kami</h3>
                <li><a href="wa.me/6289666192392" target="_blank"><img src="" alt="">0896-6619-2392</a></li>
                <li><img src="assets/image/" alt="">hayaniazrif@gmail.com</li>
            </div>
        </div>
        <hr>

    </div>
    <!-- End Footer -->
    <!-- Script -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        let currentIndex = 10; // Data awal yang sudah ditampilkan
        const loadMoreButton = document.getElementById('load-more');
        const container = document.getElementById('card-container');

        loadMoreButton.addEventListener('click', function() {
            // Kirim permintaan ke server untuk mendapatkan data baru
            fetch('load_more.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `offset=${currentIndex}&limit=10`, // Kirim offset dan limit
                })
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        // Tambahkan data ke halaman
                        data.forEach(item => {
                            const card = document.createElement('div');
                            card.className = 'card-donatur';
                            card.innerHTML = `
                        <div class="name_no-donatur">
                            <p class="no-donatur">#${item.id_donatur}</p>
                            <h1 class="name-donatur">${item.nama_donatur}</h1>
                        </div>
                        <div class="count_msg">
                            <h4 class="count-donatur">Telah Berdonasi Rp.${parseInt(item.nominal).toLocaleString()}</h4>
                            <p class="msg-donatur">${item.pesan}</p>
                        </div>`;
                            container.appendChild(card);
                        });

                        // Update indeks data terakhir
                        currentIndex += data.length;
                    } else {
                        // Jika tidak ada data lagi, sembunyikan tombol
                        loadMoreButton.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>