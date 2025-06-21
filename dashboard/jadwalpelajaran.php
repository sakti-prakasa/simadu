<?php
$pageTitle = "Jadwal Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Function to delete the schedule
function deleteschedule($scheduleId, $connection)
{
    // Delete schedule
    $deletescheduleQuery = "DELETE FROM jadpel WHERE jadpel_id = $scheduleId";
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



?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                        <a type="button" href="jadwalpelajaran_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Jadwal Pelajaran</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Kelas</th>

                                        <th>Jam ke - 1 (07.30 – 08.00)</th>
                                        <th>Jam ke - 2 (08.00 – 08.30)</th>
                                        <th>Jam ke - 3 (08.30 – 09.00)</th>
                                        <th>Jam ke - 4 (09.00 – 09.30)</th>
                                        <th>Jam ke - 5 (10.00 - 10.30)</th>
                                        <th>Jam ke - 6 (10.30 – 11.00)</th>
                                        <th>Jam ke - 7 (11.00 – 11.30)</th>
                                        <th>Jam ke - 8 (11.30 – 12.00)</th>



                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the course table
                                    $query = "SELECT j.*, k.nama AS nama_kelas, 
                 m1.nama AS nama_mapel_jk1, 
                 m2.nama AS nama_mapel_jk2,
                 m3.nama AS nama_mapel_jk3,
                 m4.nama AS nama_mapel_jk4,
                 m5.nama AS nama_mapel_jk5,
                 m6.nama AS nama_mapel_jk6,
                 m7.nama AS nama_mapel_jk7,
                 m8.nama AS nama_mapel_jk8,

                 m1.id_guru AS guru_mapel_jk1, 
                 m2.id_guru AS guru_mapel_jk2,
                 m3.id_guru AS guru_mapel_jk3,
                 m4.id_guru AS guru_mapel_jk4,
                 m5.id_guru AS guru_mapel_jk5,
                 m6.id_guru AS guru_mapel_jk6,
                 m7.id_guru AS guru_mapel_jk7,
                 m8.id_guru AS guru_mapel_jk8
          FROM jadpel j
          JOIN kelas k ON j.id_kelas = k.id_kelas
          JOIN mapel m1 ON j.jadpel_jk1 = m1.id_mapel
          JOIN mapel m2 ON j.jadpel_jk2 = m2.id_mapel
          JOIN mapel m3 ON j.jadpel_jk3 = m3.id_mapel
          JOIN mapel m4 ON j.jadpel_jk4 = m4.id_mapel
          JOIN mapel m5 ON j.jadpel_jk5 = m5.id_mapel
          JOIN mapel m6 ON j.jadpel_jk6 = m6.id_mapel
          JOIN mapel m7 ON j.jadpel_jk7 = m7.id_mapel
          JOIN mapel m8 ON j.jadpel_jk8 = m8.id_mapel";

                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        // Fetch each row and display the data 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['jadpel_hari']; ?></td>
                                                <td><?php echo $row['nama_kelas']; ?></td>

                                                <td><?php
                                                    $idguru = $row['guru_mapel_jk1'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk1'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk2'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk2'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk3'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk3'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk4'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk4'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk5'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk5'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk6'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk6'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk7'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk7'] . ' // ' . $namaguru;

                                                    ?></td>
                                                <td><?php

                                                    $idguru = $row['guru_mapel_jk8'];

                                                    $queryguru = "SELECT nama FROM guru WHERE id_guru='$idguru'";
                                                    $querygurur = mysqli_query($connection, $queryguru);
                                                    $roww = mysqli_fetch_assoc($querygurur);
                                                    $namaguru = $roww['nama'];
                                                    echo $row['nama_mapel_jk8'] . ' // ' . $namaguru;

                                                    ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="jadwalpelajaran_update.php?id=<?php echo $row['jadpel_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="schedule_id" value="<?php echo $row['jadpel_id']; ?>">
                                                            <button type="submit" name="delete_schedule" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Yakin mau menghapus jadwal pelajaran ini ?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="12" class="text-center">Belum ada data.</td>
                                        </tr>
                                    <?php
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Kelas</th>

                                        <th>Jam ke-1</th>
                                        <th>Jam ke-2</th>
                                        <th>Jam ke-3</th>
                                        <th>Jam ke-4</th>
                                        <th>Jam ke-5</th>
                                        <th>Jam ke-6</th>
                                        <th>Jam ke-7</th>
                                        <th>Jam ke-8</th>

                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>