<?php
$pageTitle = "Data Pelanggaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';



?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?> Anda</h2>
                    </div>
                    <div class="card-body">

                        <?php
                        // Retrieve the data from the pelanggaran table and student table, sorted by id_siswa
                        $query = "SELECT pelanggaran_detail.id_pelanggaran_detail, GROUP_CONCAT(pelanggaran.nama) AS violation_names, SUM(pelanggaran.skor) AS total_score, siswa.nama AS student_name, siswa.id_siswa AS student_id
                                    FROM pelanggaran_detail
                                    JOIN pelanggaran ON pelanggaran_detail.id_pelanggaran = pelanggaran.id_pelanggaran
                                    JOIN siswa ON pelanggaran_detail.id_siswa = siswa.id_siswa
                                    WHERE siswa.id_siswa = $userId
                                    GROUP BY pelanggaran_detail.id_siswa
                                    ORDER BY siswa.id_siswa";






                        $result = mysqli_query($connection, $query);

                        // Check if any rows are found
                        if (mysqli_num_rows($result) === 1) {
                            // Counter variable for numbering the rows
                            $counter = 1;

                            // Fetch each row and display the data 
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Determine badge class and note based on total score
                                $badgeClass = '';
                                $note = '';

                                if ($row['total_score'] >= 90) {
                                    $badgeClass = 'badge-danger';
                                    $note = '- Surat Peringatan 3/3';
                                } elseif ($row['total_score'] >= 60) {
                                    $badgeClass = 'badge-danger';
                                    $note = '- Surat Peringatan 2/3';
                                } elseif ($row['total_score'] >= 30) {
                                    $badgeClass = 'badge-danger';
                                    $note = '- Surat Peringatan 1/3';
                                } else {
                                    $badgeClass = 'badge-success';
                                    $note = '- Aman';
                                }
                        ?>
                                <div class="row">
                                    <div class="col">
                                        <h3>Nama</h3>
                                        <h3>Pelanggaran</h3>
                                        <h3>
                                            Total Skor
                                        </h3>

                                        <h3>
                                            Download Surat Peringatan
                                        </h3>



                                    </div>

                                    <div class="col">
                                        <h3>: <?php echo $row['violation_names']; ?></h3>
                                        <h3>:
                                            <span class="badge <?php echo $badgeClass; ?>"><?php echo $row['total_score']; ?> <?php echo $note; ?></span>
                                        </h3>
                                        <h3>: <?php echo $row['student_name']; ?></h3>

                                        <?php if ($row['total_score'] > 49) { ?>
                                            <h3> : <a href="s_sp.php?id=<?php echo $row['student_id']; ?>"><span class="badge badge-primary">Download SP</span></a></h3>
                                        <?php } ?>
                                    </div>

                                </div>




                            <?php
                            }
                        } else {
                            // No data found
                            ?>
                            <h2"> Anda tidak memiliki Data Pelanggaran.</h2>
                            <?php
                        }

                        // Close the database connection
                        mysqli_close($connection);
                            ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>