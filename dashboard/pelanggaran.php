<?php
$pageTitle = "Pelanggaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Function to delete the violation and violation
function deleteviolation($violationId, $connection)
{
    // Delete violation
    $deleteviolationQuery = "DELETE FROM pelanggaran WHERE id_pelanggaran = $violationId";
    mysqli_query($connection, $deleteviolationQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_violation'])) {
    $violationId = $_POST['violation_id'];

    // Validate violation ID
    if (!empty($violationId)) {
        // Delete the violation and violation
        deleteviolation($violationId, $connection);
    } else {
        echo "<script>alert('Invalid violation ID');</script>";
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
                        <a type="button" href="pelanggaran_tambah.php" class="btn btn-rounded btn-primary">+ Tambah Pelanggaran</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Skor</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the violation table
                                    $query = "SELECT *
                                              FROM pelanggaran";

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
                                                <td><?php echo $row['skor']; ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="pelanggaran_update.php?id=<?php echo $row['id_pelanggaran']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="violation_id" value="<?php echo $row['id_pelanggaran']; ?>">
                                                            <button type="submit" name="delete_violation" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Yakin ingin menghapus data pelanggaran ini ?');">
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
                                            <td colspan="6">No data found.</td>
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
                                        <th>Name</th>
                                        <th>Skor</th>


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