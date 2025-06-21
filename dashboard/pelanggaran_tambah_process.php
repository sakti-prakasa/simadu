<?php
include '../connection.php';

if (isset($_POST['add_violation'])) {
    $name = $_POST['name'];
    $score = $_POST['score'];

    // Insert the new violation into the database
    $insertQuery = "INSERT INTO pelanggaran (nama, skor) VALUES ('$name', $score)";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        // Violation added successfully
        echo "<script>alert('Pelanggaran berhasil ditambah');</script>";
        echo "<script>window.location.href = 'pelanggaran.php';</script>";
    } else {
        // Failed to add violation
        echo "<script>alert('Failed to add violation');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
