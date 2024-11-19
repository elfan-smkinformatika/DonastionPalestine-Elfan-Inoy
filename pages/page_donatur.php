<h1>Daftar Donatur</h1>
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
        $queryGallery = mysqli_query($conn, "SELECT id_donatur, nama_donatur, email, telephone, SUM(nominal) AS total_donasi, COUNT(DISTINCT id_donatur) AS jumlah_donasi FROM donatur GROUP BY nama_donatur");
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
        ?>
    </tbody>
</table>