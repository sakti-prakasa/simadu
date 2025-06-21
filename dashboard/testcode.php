<?php
include '../connection.php';

include 'checkExpiredUserSession.php';


$userName = '';

if (isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
    $userId = $_SESSION['user_id'];

    // Retrieve the user's name from the database based on user_id
    $query = "SELECT * FROM admin WHERE email = '$userEmail'";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM siswa WHERE email = '$userEmail'";
    $result2 = mysqli_query($connection, $query2);

    $query3 = "SELECT * FROM guru WHERE email = '$userEmail'";
    $result3 = mysqli_query($connection, $query3);

    // Initialize role and username
    $role = 0; // Default role (e.g., 0 for unknown)
    $username = "";

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $role = 1;
        $username = $row['nama'];
    } else if (mysqli_num_rows($result2) === 1) {
        $row = mysqli_fetch_assoc($result2);
        $role = 2;
        $username = $row['nama'];
    } else if (mysqli_num_rows($result3) === 1) {
        $row = mysqli_fetch_assoc($result3);
        $role = 3;
        $username = $row['nama'];
    }
}


$cekgm = "SELECT * FROM mapel WHERE id_guru = $userId";
$resultgm = mysqli_query($connection, $cekgm);

while ($row = mysqli_fetch_assoc($resultgm)) {
    $arraygm[] = $row['nama'];
}
print_r($arraygm);

$isgurupengampu = isset($arraygm[0]) ? $arraygm[0] : '';
$isgurupengampu2 = isset($arraygm[1]) ? $arraygm[1] : '';

echo 'Mapel 1 = ' . $isgurupengampu . '---Mapel 2' . $isgurupengampu2;
