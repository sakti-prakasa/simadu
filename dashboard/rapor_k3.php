<?php
$pageTitle = "Rapor Kelas XII";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the student and parents
function deleteStudent($studentId, $connection)
{


    // Delete student
    $deleteStudentQuery = "DELETE FROM siswa WHERE id_siswa = $studentId";
    mysqli_query($connection, $deleteStudentQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_student'])) {
    $studentId = $_POST['student_id'];

    // Validate student ID
    if (!empty($studentId)) {
        // Delete the student and parents
        deleteStudent($studentId, $connection);
    } else {
        echo "<script>alert('Invalid student ID');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="siswa_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Rapor</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIS</th>
                                        <th>Nama Wali</th>
                                        <th>Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the siswa table
                                    $query = "SELECT * FROM siswa WHERE id_kelas = 3";
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
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($row['tanggal_lahir'])); ?></td>
                                                <td><?php echo $row['nis']; ?></td>
                                                <td><?php echo $row['nama_ortu']; ?></td>

                                                <td><?php
                                                    if ($row['id_kelas'] === "4") {
                                                        echo "Tidak ada kelas";
                                                    } else {
                                                        echo $row['id_kelas'];
                                                    }
                                                    ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="rapor_tambah.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-primary shadow" style="margin-right: 20px;">
                                                            <i class="fas fa-plus"></i>
                                                        </a>

                                                        <?php
                                                        // Check if there is a record for this student in the rapor table
                                                        $raporQuery = "SELECT id_siswa FROM rapor WHERE id_siswa = " . $row['id_siswa'];
                                                        $raporResult = mysqli_query($connection, $raporQuery);

                                                        // Display the print button only if a record exists in the rapor table
                                                        if (mysqli_num_rows($raporResult) > 0) {
                                                        ?>
                                                            <a href="rapor_print.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-success shadow">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        <?php
                                                        }

                                                        // Close the result set for the rapor query
                                                        mysqli_free_result($raporResult);
                                                        ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data rapor</td>
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
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tanggal Lahir</th>
                                        <th>NIS</th>
                                        <th>Nama Wali</th>
                                        <th>Kelas</th>
                                        <th>Action</th>
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