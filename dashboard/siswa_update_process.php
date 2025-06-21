<?php
include '../connection.php';

if (isset($_POST['update_student'])) {
    $studentId = $_POST['student_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $nis = $_POST['nis'];
    $nohp_ortu = $_POST['nohp_ortu'];
    $nama_ortu = $_POST['nama_ortu'];
    $email = $_POST['email'];
    $idClass = $_POST['class'];
    $password = $_POST['password'];

    // Check if the provided NIS, nohp_ortu, and email already exist in the database
    $existingNisQuery = "SELECT id_siswa FROM siswa WHERE nis = '$nis' AND id_siswa != '$studentId'";
    $existingEmailQuery = "SELECT id_siswa FROM siswa WHERE email = '$email' AND id_siswa != '$studentId'";

    $existingNisResult = mysqli_query($connection, $existingNisQuery);
    $existingEmailResult = mysqli_query($connection, $existingEmailQuery);
    if (mysqli_num_rows($existingNisResult) > 0) {
        // NIS already exists, show an alert and redirect to siswa.php
        echo "<script>alert('NIS sudah ada di database.'); window.location.href = 'siswa_update.php?id';</script>";
    } elseif (mysqli_num_rows($existingEmailResult) > 0) {
        // Email already exists, show an alert and redirect to siswa.php
        echo "<script>alert('Email sudah ada di database.'); window.location.href = 'siswa_update.php?id';</script>";
    } else {
        // The provided data is unique, proceed with updating the record

        // Check if the password is provided
        if (!empty($password)) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Update the student record with the hashed password
            $query = "UPDATE siswa SET nama='$name', gender='$gender', tanggal_lahir='$birthDate', nis='$nis', nohp_ortu='$nohp_ortu', nama_ortu='$nama_ortu', email='$email', password='$hashedPassword', id_kelas='$idClass' WHERE id_siswa='$studentId'";
        } else {
            // Update the student record without changing the password
            $query = "UPDATE siswa SET nama='$name', gender='$gender', tanggal_lahir='$birthDate', nis='$nis', nohp_ortu='$nohp_ortu', nama_ortu='$nama_ortu', email='$email', id_kelas='$idClass' WHERE id_siswa='$studentId'";
        }

        $result = mysqli_query($connection, $query);

        if ($result) {
            // Redirect back to the students page with a success message
            header("Location: siswa.php");
            exit();
        } else {
            // Redirect back to the students page with an error message
            header("Location: siswa.php");
            exit();
        }
    }
}

// Close the database connection
mysqli_close($connection);
