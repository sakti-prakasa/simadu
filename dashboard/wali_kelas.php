<?php
$pageTitle = "Wali Kelas";
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
                                        <th>Wali Kelas</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the class table
                                    $query = "SELECT * FROM guru WHERE id_kelas IN (1, 2, 3)";
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
                                                <td><?php echo $row['id_kelas']; ?></td>


                                            </tr>
                                        <?php

                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada wali kelas.</td>
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
                                        <th>Wali Kelas</th>

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