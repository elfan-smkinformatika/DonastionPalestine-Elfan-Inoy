<h1>Daftar Donatur</h1>

<!-- Form Pencarian -->
<form method="GET" action="admin.php" class="search-form">
    <div class="search-container">
        <input type="hidden" name="page" value="donatur" />
        <input type="text" name="search" placeholder="Cari berdasarkan nama atau email" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
        <button type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<table class="table fade-in">
    <thead class="slide-in">
        <td>ID Donatur</td>
        <td>Nama Donatur</td>
        <td>Email</td>
        <td>Nomor Telepon</td>
        <td>Total Donasi</td>
        <td>Jumlah Donasi</td>
    </thead>

    <tbody>
        <?php
        // Ambil nilai pencarian
        $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

        // Logika Query: Tampilkan semua data jika search kosong, atau filter jika ada pencarian
        if (!empty($search)) {
            $queryGallery = mysqli_query($conn, "SELECT id_donatur, nama_donatur, email, telephone, SUM(nominal) AS total_donasi, COUNT(DISTINCT id_donatur) AS jumlah_donasi FROM donatur WHERE nama_donatur LIKE '%$search%' OR email LIKE '%$search%' GROUP BY nama_donatur");
        } else {
            $queryGallery = mysqli_query($conn, "SELECT id_donatur, nama_donatur, email, telephone, SUM(nominal) AS total_donasi, COUNT(DISTINCT id_donatur) AS jumlah_donasi FROM donatur GROUP BY nama_donatur");
        }

        // Periksa apakah ada hasil
        if (mysqli_num_rows($queryGallery) > 0) {
            $index = 0; // Inisialisasi indeks untuk animasi
            while ($data = mysqli_fetch_assoc($queryGallery)) {
                $id_donatur = $data['id_donatur'];
                $nama_donatur = $data['nama_donatur'];
                $email = $data['email'];
                $telephone = $data['telephone'];
                $total_donasi = $data['total_donasi'];
                $jumlah_donasi = $data['jumlah_donasi'];

                // Tentukan kelas berdasarkan indeks
                $rowClass = ($index % 2 == 0) ? 'fade-in-row-left' : 'fade-in-row-right';
        ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= $id_donatur ?></td>
                    <td><?= $nama_donatur ?></td>
                    <td><?= $email ?></td>
                    <td><?= $telephone ?></td>
                    <td>Rp. <?= number_format($total_donasi) ?></td>
                    <td><?= $jumlah_donasi ?></td>
                </tr>
        <?php
                $index++; // Increment indeks
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </tbody>
</table>