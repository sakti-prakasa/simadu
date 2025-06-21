<?php
include '../connection.php';

// Check if the form is submitted

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $violationId = $_POST['violation_id'];
    $studentId = $_POST['student_id'];

    // Insert the pelanggaran detail into the database
    $insertViolationDetailQuery = "INSERT INTO pelanggaran_detail (id_violation, id_student)
                                   VALUES ('$violationId', '$studentId')";

    if (mysqli_query($connection, $insertViolationDetailQuery)) {
        echo "<script>alert('Data pelanggaran berhasil ditambahkan.');</script>";
        echo "<script>window.location.href = 'pelanggaran_detail.php';</script>";
    } else {
        echo "<script>alert('Error adding pelanggaran detail: " . mysqli_error($connection) . "');</script>";
    }
}
