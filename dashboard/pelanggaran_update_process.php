<?php
include '../connection.php';

if (isset($_POST['update_violation'])) {
    $violationId = $_POST['violation_id'];
    $name = $_POST['name'];
    $score = $_POST['score'];

    // Update the violation in the database
    $updateQuery = "UPDATE pelanggaran SET nama = '$name', skor = $score WHERE id_violation = $violationId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        // Violation updated successfully
        echo "<script>alert('Pelanggaran berhasil diupdate');</script>";
        echo "<script>window.location.href = 'pelanggaran.php';</script>";
    } else {
        // Failed to update violation
        echo "<script>alert('Failed to update violation');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
