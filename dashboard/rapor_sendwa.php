<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $raporId = $_GET['id'];

    // Select data from the database
    $query = "SELECT * FROM rapor r JOIN siswa s ON s.id_siswa = r.id_siswa WHERE r.id_rapor = '$raporId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Extract necessary data
        $target = $data['nohp_ortu'];
        $namaSiswa = $data['nama'];
        $kelas = $data['id_kelas'];
        $semester = $data['semester'];
        $tapel = $data['tapel'];
        $idSiswa = $data['id_siswa'];
        $nis = $data['nis'];

        // API configuration
        $token = "zHuqSvWcxFiekq02au71";
        $message = "*Pesan Otomatis* _*SIMADU*_ \n"
            . "*Laporan Hasil Belajar Siswa*\n\n"
            . "Nama Siswa : $namaSiswa\n"
            . "NIS : $nis\n"
            . "Kelas: $kelas\n"
            . "Semester: $semester\n"
            . "Tahun Pelajaran: $tapel\n\n"
            . "Rapor dapat dilihat di : \n"
            . "http://localhost/simadu/dashboard/rapor_print_data.php?id=$raporId";


        // Send WhatsApp message
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        // Update 'sent' status in the database
        $query2 = "UPDATE rapor SET sent = 1 WHERE id_rapor = '$raporId'";
        $result2 = mysqli_query($connection, $query2);

        if ($result2) {
            header("Location: rapor_print.php?id=$idSiswa");
            exit();
        } else {
            echo "Error updating 'sent' status: " . mysqli_error($connection);
        }
    } else {
        echo "No data found for the specified ID.";
    }
} else {
    echo "No ID parameter provided.";
}
