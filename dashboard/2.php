<?php
require 'encrypt.php';
require 'decrypt.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Enkripsi & Dekripsi Nilai</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #e2e2e2;
            padding-bottom: 10px;
        }

        form {
            margin-bottom: 40px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #0066cc;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #004a99;
        }

        pre {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 8px;
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Enkripsi</h2>
    <form method="post" id="formEncrypt">
        <label for="nilai_enkripsi">Masukkan Nilai untuk Enkripsi:</label>
        <input type="text" name="nilai_enkripsi" id="nilai_enkripsi" required>
        <button type="submit">Enkripsi</button>
    </form>

    <h2>Form Dekripsi</h2>
    <form method="post" id="formDecrypt">
        <label for="nilai_dekripsi">Masukkan Teks Enkripsi (Base64):</label>
        <textarea name="nilai_dekripsi" id="nilai_dekripsi" rows="4" required></textarea>
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
            echo "🔒 Input Enkripsi:\n$nilai\n\n";
            echo "📦 Hasil Enkripsi (Base64):\n$hasilEnkripsi\n\n";
            echo "⏱️ Waktu Proses (PHP): {$lama} ms\n";
            echo "</pre>";
        }

        if (isset($_POST['nilai_dekripsi'])) {
            $nilai = $_POST['nilai_dekripsi'];

            $start = microtime(true);
            $hasilDekripsi = dekripsiData($nilai);
            $end = microtime(true);
            $lama = round(($end - $start) * 1000, 3);

            echo "<pre id='result'>";
            echo "🔓 Input Dekripsi:\n$nilai\n\n";
            echo "📝 Hasil Dekripsi:\n$hasilDekripsi\n\n";
            echo "⏱️ Waktu Proses (PHP): {$lama} ms\n";
            echo "</pre>";
        }
    }
    ?>
</div>

<script>
function addJSProcessTime(formId) {
    const startTime = performance.now();

    window.addEventListener('load', function () {
        const endTime = performance.now();
        const elapsed = (endTime - startTime).toFixed(3);

        const result = document.getElementById('result');
        if (result) {
            result.innerHTML += `\n⚡ Waktu Proses (JavaScript): ${elapsed} ms\n`;
        }
    });
}

document.getElementById('formEncrypt').addEventListener('submit', function () {
    addJSProcessTime('formEncrypt');
});

document.getElementById('formDecrypt').addEventListener('submit', function () {
    addJSProcessTime('formDecrypt');
});
</script>

</body>
</html>
