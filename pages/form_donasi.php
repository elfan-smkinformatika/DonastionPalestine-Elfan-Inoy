<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form Donasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex">

    <div class="side-left col-7 p-5">
        <h1 class="title-form-donasi">Bersama Kita Bantu Palestina, Setiap Donasi Adalah Cahaya Harapan</h1>
        <div class="input-nominal my-4">
            <form action="" method="post">
                <label>Jumlah donasi anda</label><br>
                <div class="radio-container">
                    <input type="radio" id="10k" name="amount" value="10000" onclick="document.getElementById('manual-input').value = this.value" required>
                    <label for="10k" class="nominasi-text">10K</label>

                    <input type="radio" id="20k" name="amount" value="20000" onclick="document.getElementById('manual-input').value = this.value" required>
                    <label for="20k" class="nominasi-text">20K</label>

                    <input type="radio" id="50k" name="amount" value="50000" onclick="document.getElementById('manual-input').value = this.value" required>
                    <label for="50k" class="nominasi-text">50K</label>

                    <input type="radio" id="100k" name="amount" value="100000" onclick="document.getElementById('manual-input').value = this.value" required>
                    <label for="100k" class="nominasi-text">100K</label>

                    <input type="radio" id="lainnya" name="amount" value="Lainnya" onclick="document.getElementById('manual-input').value = this.value" required>
                    <label for="lainnya" class="nominasi-text">Lainnya</label>
                </div>
                <div id="manual-input-container" class="mt-2">
                    <input type="number" id="manual-input" placeholder="Masukkan nominal yang ingin Anda berikan" class="w-100" required>
                </div>
        </div>
        <div class="inputan_nama-email d-flex mb-4 gap-3">
            <div class="inputan_nama w-100 mr-4">
                <label for="nama">Nama Anda</label><br>
                <input class="w-100 input-text" type="text" placeholder="Contoh: Ahmad Ibrahim" required>
            </div>
            <div class="inputan_nama w-100">
                <label for="nama">Alamat Email Anda</label><br>
                <input class="w-100 input-text" type="text" placeholder="Contoh: anda@gmail.com" required>
            </div>
        </div>
        <div class="inputan_kontak-pembayaran d-flex mb-4 gap-3 align-items-center">
            <div class="inputan_kontak w-100">
                <label for="nama">Nomor Kontak</label><br>
                <input class="w-100 input-text" type="text" placeholder="Contoh: 081234567890" required>
            </div>
            <div class="inputan_pembayaran w-100">
                <table class="w-100">
                    <tr>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-dana.png" alt="dana"></td>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-gopay.png" alt="dana"></td>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-ovo.png" alt="dana"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-qris.png" alt="dana"></td>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-sakuku.png" alt="dana"></td>
                        <td><input type="radio" name="pembayaran" id="input-pembayaran" value="dana" required><img src="../assets/image/icon-shopeePay.png" alt="dana"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="inputan_pesan mb-4">
            <label for="pesan-singkat">Pesan atau Doa Anda untuk Palestina</label><br>
            <textarea name="pesan" id="pesan" placeholder="Tulis pesan singkat atau doa Anda" class="w-100" required></textarea>
        </div>
        <button type="submit" class="btn bg-orange btn-donasi_sekarang text-light">Donasikan Sekarang</button>
        </form>

    </div>
    <div class="side-right col-5 p-3 position-relative">
        <div class="simple-message text-light top-100">
            <h4 class="title-simple-message">Setiap Donasi adalah Tetesan Harapan bagi Palestina</h4>
            <p class="parag-simple-message">
            Setiap rupiah yang Anda berikan bukan hanya sekadar angka, melainkan wujud nyata dari kepedulian dan cinta kasih Anda untuk saudara-saudara kita di Palestina. Bersama-sama, kita bisa membantu meringankan beban mereka dan memberikan harapan untuk masa depan yang lebih baik. Mari wujudkan perubahan, satu donasi pada satu waktu. Jadikan kontribusi Anda sebagai bagian dari langkah besar menuju kehidupan yang lebih damai dan sejahtera bagi mereka yang membutuhkan. Ayo, satukan hati, satukan langkah, dan donasikan sekarang untuk Palestina!
            </p>
        </div>
    </div>

    <!-- script js dan bootstrap -->
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        function toggleManualInput(show) {
            const manualInput = document.getElementById("manual-input");
            if (show) {
                manualInput.style.display = "block";
                manualInput.focus(); // Focus the input when it appears
            } else {
                manualInput.style.display = "none";
                manualInput.value = ""; // Clear input if not selected
            }
        }

        function validateForm(event) {
            const inputs = document.querySelectorAll('.input-text, #manual-input, textarea');
            let isValid = true;
            let emptyFields = [];

            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    emptyFields.push(input.placeholder || input.previousElementSibling.innerText);
                }
            });

            if (!isValid) {
                event.preventDefault(); // Prevent form submission
                alert("Silakan lengkapi inputan berikut: " + emptyFields.join(', '));
            }
        }

        // Tambahkan event listener pada form
        document.querySelector('form').addEventListener('submit', validateForm);
    </script>
</body>

</html>