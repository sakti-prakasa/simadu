<?php
$pageTitle = "Print Rapor";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Fetch student's data from the database based on id_siswa
$query = "SELECT r.*, s.nama AS siswa_nama FROM rapor r
    JOIN siswa s ON r.id_siswa = s.id_siswa
    WHERE r.id_siswa = $userId";
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
                                <a href="rapor_print_data.php?id=<?php echo $studentData['id_rapor']; ?>" class="btn btn-success shadow">
                                    <i class="fas fa-eye"></i> Lihat Rapor
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


        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>
</div>

<?php
include 'template/footer.php';
?>