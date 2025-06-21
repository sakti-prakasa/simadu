<?php
require 'encrypt.php';
require 'decrypt.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi & Dekripsi Nilai</title>
    <style>
        pre {
            background: #f0f0f0;
            padding: 10px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>
<body>

    <h2>Form Enkripsi</h2>
    <form method="post" id="formEncrypt">
        <label for="nilai_enkripsi">Masukkan Nilai untuk Enkripsi:</label><br>
        <input type="text" name="nilai_enkripsi" id="nilai_enkripsi" required><br><br>
        <button type="submit">Enkripsi</button>
    </form>

    <h2>Form Dekripsi</h2>
    <form method="post" id="formDecrypt">
        <label for="nilai_dekripsi">Masukkan Teks Enkripsi (Base64):</label><br>
        <textarea name="nilai_dekripsi" id="nilai_dekripsi" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Dekripsi</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nilai_enkripsi'])) {
        $nilai = $_POST['nilai_enkripsi'];

        $start = microtime(true);
        $hasilEnkripsi = enkripsiData($nilai);
        $end = microtime(true);
        $lama = round(($end - $start) * 1000, 3);

        echo "<pre id='result'>";
        echo "Input Enkripsi:\n$nilai\n\n";
        echo "Hasil Enkripsi:\n$hasilEnkripsi\n\n";
        echo "Waktu Proses (PHP): {$lama} ms\n";
        echo "</pre>";
    }

    if (isset($_POST['nilai_dekripsi'])) {
        $nilai = $_POST['nilai_dekripsi'];

        $start = microtime(true);
        $hasilDekripsi = dekripsiData($nilai);
        $end = microtime(true);
        $lama = round(($end - $start) * 1000, 3);

        echo "<pre id='result'>";
        echo "Input Dekripsi (Base64):\n$nilai\n\n";
        echo "Hasil Dekripsi:\n$hasilDekripsi\n\n";
        echo "Waktu Proses (PHP): {$lama} ms\n";
        echo "</pre>";
    }
}
?>

<script>
document.getElementById('formEncrypt').addEventListener('submit', function () {
    addJSProcessTime('formEncrypt');
});

document.getElementById('formDecrypt').addEventListener('submit', function () {
    addJSProcessTime('formDecrypt');
});
</script>

</body>
</html>
