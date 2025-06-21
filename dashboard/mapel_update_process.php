<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mapelId = $_POST['mapel_id'];
    $newNama = $_POST['nama'];
    $newNamaGuruId = $_POST['nama_guru']; // Retrieve the selected guru's ID from the form

    // Update the mapel record in the database
    $updateQuery = "UPDATE mapel SET nama = '$newNama', id_guru = '$newNamaGuruId' WHERE id_mapel = $mapelId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        header("Location: matapelajaran.php");
        exit();
    } else {
        echo "Error updating mapel: " . mysqli_error($connection);
    }
}
