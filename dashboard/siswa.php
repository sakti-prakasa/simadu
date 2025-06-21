<?php
$pageTitle = "Siswa";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the student and parents
function deleteStudent($studentId, $connection)
{
    // Delete parents first
    $deleteParentsQuery = "DELETE FROM ortu WHERE id_siswa = $studentId";
    mysqli_query($connection, $deleteParentsQuery);

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
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="siswa_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Siswa</a>
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
                                        <th>No HP Ortu</th>
                                        <th>Nama Ortu</th>
                                        <th>Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the siswa table
                                    $query = "SELECT * FROM siswa";
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
                                                <td><?php echo $row['nohp_ortu']; ?></td>
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
                                                        <a href="siswa_update.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-primary shadow  sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="student_id" value="<?php echo $row['id_siswa']; ?>">
                                                            <button type="submit" name="delete_student" class="btn btn-danger shadow  sharp" onclick="return confirm('Are you sure you want to delete this student and their parents?');">
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
                                            <td colspan="7">No data found.</td>
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
                                        <th>No HP Ortu</th>
                                        <th>Nama Ortu</th>
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