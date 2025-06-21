<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nama_guru_id = $_POST['nama_guru']; // This will contain the selected guru's ID

    // Insert the new mapel into the database
    $insertQuery = "INSERT INTO mapel (nama, guru_id) VALUES ('$nama', '$nama_guru_id')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        header("Location: matapelajaran.php");
        exit();
    } else {
        echo "Error adding mapel: " . mysqli_error($connection);
    }
}
