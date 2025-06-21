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

                <h2> <a href="sekolah.php"><?php echo $pageTitle; ?> </a> / Update</h2>
                <form action="sekolah_update_process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat :</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">NO HP :</label>
                        <input type="text" maxlength="20" class="form-control" id="phone" name="phone" value="<?php echo $row['no_hp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="accreditation">Akreditasi :</label>
                        <input type="text" class="form-control" id="accreditation" name="accreditation" value="<?php echo $row['akreditasi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="npsn">NPSN :</label>
                        <input type="text" maxlength="8" class="form-control" id="npsn" name="npsn" value="<?php echo $row['npsn']; ?>" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
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