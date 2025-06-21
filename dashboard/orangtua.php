<?php
$pageTitle = "orangtua";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Function to delete the parent and parents
function deleteparent($parentId, $connection)
{
    // Delete parent
    $deleteparentQuery = "DELETE FROM parents WHERE id_parent = $parentId";
    mysqli_query($connection, $deleteparentQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_parent'])) {
    $parentId = $_POST['parent_id'];

    // Validate parent ID
    if (!empty($parentId)) {
        // Delete the parent and parents
        deleteparent($parentId, $connection);
    } else {
        echo "<script>alert('Invalid parent ID');</script>";
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
                        <a type="button" href="orangtua_tambah.php" class="btn btn-rounded btn-primary">+ Tambah orangtua</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Birth Date</th>
                                        <th>nik</th>
                                        <th>Student</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the parents table
                                    $query = "SELECT p.*, s.name AS student_name 
                                              FROM parents p
                                              INNER JOIN students s ON p.id_student = s.id_student";
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
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['birth_date']; ?></td>
                                                <td><?php echo $row['nip']; ?></td>
                                                <td><?php echo $row['student_name']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="orangtua_update.php?id=<?php echo $row['id_parent']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="parent_id" value="<?php echo $row['id_parent']; ?>">
                                                            <button type="submit" name="delete_parent" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this parent?');">
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
                                        <th>Gender</th>
                                        <th>Birth Date</th>
                                        <th>nik</th>
                                        <th>Class</th>
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