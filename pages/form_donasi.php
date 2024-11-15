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
        <h1>Bersama Kita Bantu Palestina, Setiap Donasi Adalah Cahaya Harapan</h1>
        <div class="input-nominal">
            <label>Jumlah donasi anda</label><br>
            <div class="radio-container">
                <input type="radio" id="10k" name="amount" value="10000" onclick="toggleManualInput(false)">
                <label for="10k">10K</label>

                <input type="radio" id="20k" name="amount" value="20000" onclick="toggleManualInput(false)">
                <label for="20k">20K</label>

                <input type="radio" id="50k" name="amount" value="50000" onclick="toggleManualInput(false)">
                <label for="50k">50K</label>

                <input type="radio" id="100k" name="amount" value="100000" onclick="toggleManualInput(false)">
                <label for="100k">100K</label>

                <input type="radio" id="lainnya" name="amount" value="Lainnya" onclick="toggleManualInput(true)">
                <label for="lainnya">Lainnya</label>
            </div>
            <div id="manual-input-container" class="mt-2">
                <input type="number" id="manual-input" placeholder="Masukkan nominal yang ingin Anda berikan" class="w-75">
            </div>
        </div>

    </div>
    <div class="side-right col-5">

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
    </script>
</body>

</html>