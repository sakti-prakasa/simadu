<?php
$pageTitle = "Kelas";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the class and parents
function deleteclass($classId, $connection)
{

    // Delete class
    $deleteclassQuery = "DELETE FROM kelas WHERE id_kelas = $classId";
    mysqli_query($connection, $deleteclassQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_class'])) {
    $classId = $_POST['class_id'];

    // Validate class ID
    if (!empty($classId)) {
        // Delete the class and parents
        deleteclass($classId, $connection);
    } else {
        echo "<script>alert('Invalid class ID');</script>";
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
                        <!-- <a type="button" href="kelas_tambah.php" class="btn btn-rounded btn-primary">+ Tambah kelas</a> -->
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the class table
                                    $query = "SELECT * FROM kelas WHERE id_kelas != 4";
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
                                                <td>
                                                    <div class="d-flex">
                                                        <!-- <a href="kelas_update.php?id=<?php echo $row['id_kelas']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a> -->
                                                        <form method="post" action="">
                                                            <input type="hidden" name="class_id" value="<?php echo $row['id_kelas']; ?>">
                                                            <button type="submit" name="delete_class" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this class ?');">
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
                                        <th>Name</th>

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