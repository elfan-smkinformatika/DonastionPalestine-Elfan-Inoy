<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form Donasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="page_donate" class="container-fluid d-flex justify-content-center align-items-center">
        <form action="../query/qDonasi.php" method="post" class="form-donasi d-flex flex-column">
            <h1 class="title-formdonate text-center text-light">Bantu Wujudkan Harapan Mereka</h1>
            <p class="parag-formdonate text-light text-center">Donasi Anda Menjadi Cahaya Bagi Palestina</p>
            <div class="inputan-kirim_nominal">
                <label class="text-light mt-3">Kirim nominal</label><br>
                <input class="inputan" type="text" name="nominal" placeholder="" required autofocus>
            </div>
            <div class="inputan-data_diri">
                <label class="text-light mt-3">Data Diri</label><br>
                <input class="inputan" type="text" name="username" placeholder="Username" required><br>
                <input class="inputan" type="gmail" name="gmail" placeholder="Gmail" required><br>
                <input class="inputan" type="number" name="nomor" placeholder="No Telephone" required><br>
                <input type="checkbox" name="username" id="" value="orang baik">
                <label class="text-secondary mt-2">Tampilkan nama samaran sebagai anonim</label>
            </div>
            <div class="radio-pembayaran">
                <label class="text-light mt-3">Metode Pembayaran</label><br>
                <table class="w-100 text-light text-center">
                    <tr>
                        <td><input type="radio" name="pembayaran" value="dana"><img src="../assets/image/icon-dana.png"></td>
                        <td><input type="radio" name="pembayaran" value="gopay"><img src="../assets/image/icon-gopay.png"></td>
                        <td><input type="radio" name="pembayaran" value="ovo"><img src="../assets/image/icon-ovo.png"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="pembayaran" value="qris"><img src="../assets/image/icon-qris.png"></td>
                        <td><input type="radio" name="pembayaran" value="sakuku"><img src="../assets/image/icon-sakuku.png"></td>
                        <td><input type="radio" name="pembayaran" value="shopeePay"><img src="../assets/image/icon-shopeePay.png"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>