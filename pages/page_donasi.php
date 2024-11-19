<h1>Daftar Donasi</h1>

<!-- Form Pencarian -->
<form method="GET" action="admin.php" class="search-form">
    <div class="search-container">
        <!-- Pastikan parameter `page` tetap diikutsertakan -->
        <input type="hidden" name="page" value="donasi" />
        <input type="text" name="search" placeholder="Cari berdasarkan nama atau email" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
        <button type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<table class="table fade-in">
    <thead class="slide-in">
        <tr>
            <th>ID Donasi</th>
            <th>Nama Donatur</th>
            <th>Email</th>
            <th>Nominal Donasi</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Donasi</th>
            <th>Pesan Donatur</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Sertakan file koneksi database
        require_once 'include/connection.php';

        // Ambil nilai pencarian
        $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

        // Logika Query: Tampilkan semua data jika search kosong, atau filter jika ada pencarian
        if (!empty($search)) {
            $query = "SELECT * FROM donatur WHERE nama_donatur LIKE '%$search%' OR email LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM donatur"; // Tampilkan semua data
        }

        $result = mysqli_query($conn, $query);

        // Periksa apakah ada hasil
        if ($result && mysqli_num_rows($result) > 0) {
            $index = 0; // Inisialisasi indeks untuk animasi
            while ($data = mysqli_fetch_assoc($result)) {
                $id_donatur = $data['id_donatur'];
                $nama_donatur = $data['nama_donatur'];
                $email = $data['email'];
                $nominal = $data['nominal'];
                $metode_pembayaran = $data['metode_pembayaran'];
                $give_at = $data['give_at'];
                $pesan = $data['pesan'];
                $status = $data['status'];

                // Tentukan kelas animasi berdasarkan indeks
                $rowClass = ($index % 2 == 0) ? 'fade-in-row-left' : 'fade-in-row-right';
        ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= $id_donatur ?></td>
                    <td><?= htmlspecialchars($nama_donatur) ?></td>
                    <td><?= htmlspecialchars($email) ?></td>
                    <td>Rp. <?= number_format($nominal, 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($metode_pembayaran) ?></td>
                    <td><?= date('d/m/Y', strtotime($give_at)) ?></td>
                    <td><?= htmlspecialchars($pesan) ?></td>
                    <td><?= htmlspecialchars($status) ?></td>
                </tr>
        <?php
                $index++; // Increment indeks
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </tbody>
</table>
