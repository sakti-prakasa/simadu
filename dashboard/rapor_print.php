<?php
$pageTitle = "Print Rapor";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

function deleteschedule($scheduleId, $connection)
{
    // Delete schedule
    $deletescheduleQuery = "DELETE FROM rapor WHERE id_rapor = $scheduleId";
    mysqli_query($connection, $deletescheduleQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_schedule'])) {
    $scheduleId = $_POST['schedule_id'];

    // Validate schedule ID
    if (!empty($scheduleId)) {
        // Delete the schedule
        deleteschedule($scheduleId, $connection);
    } else {
        echo "<script>alert('Invalid schedule ID');</script>";
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idSiswa = $_GET['id'];

    // kondisi cek walikelas BEGIN
    $cekguru = "SELECT * FROM guru WHERE id_guru = $userId AND id_kelas IN (1, 2, 3);";
    $resultcekguru = mysqli_query($connection, $cekguru);
    $iswalikelas = 0;
    if (mysqli_num_rows($resultcekguru) > 0) {
        $iswalikelas = 1;
    }
    // kondisi cek walikelas END


    // kondisi cek guru mapel tsb BEGIN
    $cekgurupengampu = "SELECT * FROM mapel WHERE id_guru = $userId";
    $resultcekgurupengampu = mysqli_query($connection, $cekgurupengampu);

    if (mysqli_num_rows($resultcekgurupengampu) > 0) {
        $hasilcekgurupengampu = mysqli_fetch_assoc($resultcekgurupengampu);
        $isgurupengampu = $hasilcekgurupengampu['nama'];
    }
    // kondisi cek guru mapel tsb END

    // Fetch student's data from the database based on id_siswa
    $query = "SELECT r.*, s.nama AS siswa_nama FROM rapor r
    JOIN siswa s ON r.id_siswa = s.id_siswa
    WHERE r.id_siswa = $idSiswa";
    $result = mysqli_query($connection, $query);

?>

    <div class="content-body">
        <div class="container-fluid">


            <div class="container">
                <h2> <?php echo $pageTitle; ?></h2>
                <div class="row">

                    <?php
                    // Check if the student with the provided id_siswa exists
                    if (mysqli_num_rows($result) > 0) {
                        while ($studentData = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col">
                                <h4>Nama: <?php echo $studentData['siswa_nama']; ?></h4>
                                <div class="col">
                                    <h6>Semester: <?php echo $studentData['semester']; ?></h6>
                                    <?php
                                    $tapel = $studentData['tapel'];
                                    $startYear = substr($tapel, 0, 4);
                                    $endYear = substr($tapel, 4, 4);
                                    ?>

                                    <h6>Tapel: <?php echo $startYear . '/' . $endYear; ?></h6>

                                </div>
                                <div class="col">


                                    <?php if ($iswalikelas == 1 || $role == 1) { ?>

                                        <form method="post" action="">
                                            <input type="hidden" name="schedule_id" value="<?php echo $studentData['id_rapor']; ?>">
                                            <button type="submit" name="delete_schedule" class="btn btn-danger shadow sharp" onclick="return confirm('Yakin mau menghapus rapor ini ?');">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>

                                        <a href="rapor_sendwa.php?id=<?php echo $studentData['id_rapor']; ?>" class="btn btn-success shadow <?php if ($studentData['sent'] == 1) {
                                                                                                                                                echo 'disabled';
                                                                                                                                            } ?>">
                                            <i class="fas fa-paper-plane"></i> Kirim Ke Wali Siswa
                                        </a>
                                    <?php } ?>


                                    <a href="rapor_edit.php?id=<?php echo $studentData['id_rapor']; ?>" class="btn btn-primary shadow">
                                        <i class="fas fa-pencil-alt"></i> Update Rapor
                                    </a>

                                    <a href="rapor_print_data.php?id=<?php echo $studentData['id_rapor']; ?>" class="btn btn-success shadow">
                                        <i class="fas fa-print"></i> Print Rapor
                                    </a>

                                </div>

                            </div>
                    <?php
                        }
                    } else {
                        echo "Data raport tidak ditemukan.";
                    }
                    ?>
                </div>




            </div>

        <?php
    } else {
        echo '<p>No school data found.</p>';
    }

    // Close the database connection
    mysqli_close($connection);
        ?>
        </div>
    </div>

    <?php
    include 'template/footer.php';
    ?>