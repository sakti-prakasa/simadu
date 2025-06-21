<?php
function enkripsiData($data)
{
    // Generate random 256-bit AES key
    $aesKey = openssl_random_pseudo_bytes(32); // 32 bytes = 256 bit
    $iv = openssl_random_pseudo_bytes(16); // 128-bit IV

    // Enkripsi data menggunakan AES-256-CBC
    $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $aesKey, OPENSSL_RAW_DATA, $iv);

    // Enkripsi AES key menggunakan RSA public key
    $publicKey = file_get_contents('key/public.pem');
    openssl_public_encrypt($aesKey, $encryptedKey, $publicKey);

    // Return sebagai array base64
    $result = [
        'data' => base64_encode($encryptedData),
        'key'  => base64_encode($encryptedKey),
        'iv'   => base64_encode($iv)
    ];

    return base64_encode(json_encode($result));
}
?>
