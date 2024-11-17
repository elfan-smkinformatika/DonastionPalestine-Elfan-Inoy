<h1>Daftar Donasi</h1>

<table class="table">
    <thead>
        <td>ID Donasi</td>
        <td>Nama Donatur</td>
        <td>Email</td>
        <td>Nominal Donasi</td>
        <td>Metode Pembayaran</td>
        <td>Tanggal Donasi</td>
        <td>Pesan Donatur</td>
        <td>Status</td>
    </thead>

    <tbody>
        <?php
        $queryGallery = mysqli_query($conn, "select * from donatur");
        while ($data = mysqli_fetch_assoc($queryGallery)) {
            $id_donatur = $data['id_donatur'];
            $nama_donatur = $data['nama_donatur'];
            $telephone = $data['telephone'];
            $nominal = $data['nominal'];
            $email = $data['email'];
            $metode_pembayaran = $data['metode_pembayaran'];
            $pesan = $data['pesan'];
            $give_at = $data['give_at'];
            $status = $data['status'];
        ?>
            <tr>
                <td><?= $id_donatur ?></td>
                <td><?= $nama_donatur ?></td>
                <td><?= $email ?></td>
                <td>Rp. <?= number_format($nominal) ?></td>
                <td><?= $metode_pembayaran ?></td>
                <td><?= date('d/m/Y', strtotime($give_at)) ?></td>
                <td><?= $pesan ?></td>
                <td><?= $status ?></td>
            </tr>
        <?php
        }
        ?>


    </tbody>
</table>