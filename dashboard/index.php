<?php
$pageTitle = "Sekolah";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';
?>

<div class="content-body">
    <div class="container-fluid">

        <?php
        // Assuming you have established a database connection

        // Retrieve the school data
        $query = "SELECT * FROM sekolah";
        $result = mysqli_query($connection, $query);

        // Check if any rows are found
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>

            <div class="container">
                <h2> <?php echo $pageTitle; ?></h2>
                <table class="table">
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Akreditasi</th>
                        <th>NPSN</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['no_hp']; ?></td>
                        <td><?php echo $row['akreditasi']; ?></td>
                        <td><?php echo $row['npsn']; ?></td>
                    </tr>
                </table>

                <?php if ($role == 1) { ?>
                    <a href="sekolah_update.php" class="btn btn-primary">Update Data</a>
                <?php } ?>
            </div>

        <?php
        } else {
            echo '<p>No school data found.</p>';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>
</div>

<?php
include 'template/footer.php';
?>