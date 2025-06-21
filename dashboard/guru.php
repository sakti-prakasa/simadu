<?php
$pageTitle = "Guru";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the teacher and parents
function deleteteacher($teacherId, $connection)
{

    // Delete teacher
    $deleteteacherQuery = "DELETE FROM guru WHERE id_guru = $teacherId";
    mysqli_query($connection, $deleteteacherQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_teacher'])) {
    $teacherId = $_POST['teacher_id'];

    // Validate teacher ID
    if (!empty($teacherId)) {
        // Delete the teacher and parents
        deleteteacher($teacherId, $connection);
    } else {
        echo "<script>alert('Invalid teacher ID');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2>

                        <a type="button" href="guru_tambah.php" class="btn btn-rounded btn-primary">+ Tambah guru</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Jabatan</th>
                                        <th>NUPTK / REG</th>



                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the teachers table 
                                    $query = "SELECT * FROM guru";
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
                                                <td><?php echo $row['jabatan']; ?></td>
                                                <td><?php echo $row['nip']; ?></td>




                                                <td>
                                                    <div class="d-flex">
                                                        <a href="guru_update.php?id=<?php echo $row['id_guru']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="teacher_id" value="<?php echo $row['id_guru']; ?>">
                                                            <button type="submit" name="delete_teacher" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this teacher ?');">
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
                                        <th>Jabatan</th>
                                        <th>NUPTK / REG</th>


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