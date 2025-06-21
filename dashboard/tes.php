<?php
include '../connection.php';

$cek3item = "SELECT * FROM siswa WHERE id_siswa = 2";
$s = mysqli_query($connection, $cek3item);

if ($row = mysqli_fetch_assoc($s)) {
    $savedemail = $row['email'];
    $savedhp = $row['nohp_ortu'];
    $savednis = $row['nis'];

    // Check each variable and replace with "-" if null
    $savedemail = ($savedemail !== null) ? $savedemail : '-';
    $savedhp = ($savedhp !== null) ? $savedhp : '-';
    $savednis = ($savednis !== null) ? $savednis : '-';
} else {
    // Set all variables to "-" if no data is found
    $savedemail = '-';
    $savedhp = '-';
    $savednis = '-';
}

echo $savedemail . $savedhp . $savednis;
