<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $nis = $_POST['nis'];
    $nohp_ortu = $_POST['nohp_ortu'];
    $nama_ortu = $_POST['nama_ortu'];

    $email = $_POST['email'];
    $idClass = $_POST['id_class'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $emailCheckQuery = "SELECT id_siswa FROM siswa WHERE email = '$email'";
    $emailCheckResult = mysqli_query($connection, $emailCheckQuery);



    $nisCheckQuery = "SELECT id_siswa FROM siswa WHERE nis = '$nis'";
    $nisCheckResult = mysqli_query($connection, $nisCheckQuery);
    if (mysqli_num_rows($emailCheckResult) > 0) {
        echo "<script>alert('Email sudah ada. Silahkan pilih email lain.'); window.location.href = 'siswa_tambah.php';</script>";
    } else if (mysqli_num_rows($nisCheckResult) > 0) {
        echo "<script>alert('NIS sudah ada. Silahkan pilih NIS lain.'); window.location.href = 'siswa_tambah.php';</script>";
    } else {
        // Perform the insert operation to add a new student
        $query = "INSERT INTO siswa (nama, gender, tanggal_lahir, nis, nama_ortu, nohp_ortu, email, password, id_kelas) VALUES ('$name', '$gender', '$birthDate', '$nis', '$nama_ortu', '$nohp_ortu', '$email', '$hashedPassword', '$idClass')";

        $result = mysqli_query($connection, $query);

        // Close the database connection
        mysqli_close($connection);

        // Redirect back to the students page with the toast notification parameters in the URL
        header("Location: siswa.php");
        exit();
    }
}
