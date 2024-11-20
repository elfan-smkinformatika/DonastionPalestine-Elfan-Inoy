<?php
require 'include/connection.php'; // Koneksi ke database

// Ambil nilai limit dan offset dari permintaan POST
$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 10;
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

// Query untuk mengambil data donasi
$query = "SELECT id_donatur, nama_donatur, nominal, pesan FROM donatur LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
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
    // Jika tidak ada data lagi
    echo '';
}
?>
