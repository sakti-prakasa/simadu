<?php
function dekripsiData($encryptedPackage)
{
    // Decode base64 dan parse JSON
    $decodedJson = base64_decode($encryptedPackage);
    $dataArray = json_decode($decodedJson, true);

    if (!isset($dataArray['data'], $dataArray['key'], $dataArray['iv'])) {
        return null; // Format tidak sesuai
    }

    // Ambil data terenkripsi dan decoding base64
    $encryptedData = base64_decode($dataArray['data']);
    $encryptedKey  = base64_decode($dataArray['key']);
    $iv            = base64_decode($dataArray['iv']);

    // Dekripsi AES key menggunakan RSA private key
    $privateKey = file_get_contents('key/private.pem');
    openssl_private_decrypt($encryptedKey, $decryptedKey, $privateKey);

    // Dekripsi data menggunakan AES-256-CBC
    $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $decryptedKey, OPENSSL_RAW_DATA, $iv);

    // Bersihkan data menjadi hanya angka
    $angkaBersih = preg_replace('/[^0-9]/', '', $decryptedData);
    $nilaiInteger = intval($angkaBersih);

    return $nilaiInteger;
}
?>
