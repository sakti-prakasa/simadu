<?php
$pageTitle = "Edit guru";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the teacher ID is provided in the URL
if (isset($_GET['id'])) {
    $teacherId = $_GET['id'];

    // Retrieve the teacher data from the database
    $query = "SELECT * FROM guru WHERE id_guru = $teacherId";
    $result = mysqli_query($connection, $query);

    // Check if the teacher exists
    if (mysqli_num_rows($result) > 0) {
        $teacher = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing teacher information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="guru_update_process.php">
                                    <input type="hidden" name="teacher_id" value="<?php echo $teacher['id_guru']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $teacher['nama']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender" required>
                                            <option value="Laki Laki" <?php if ($teacher['gender'] == 'Laki Laki') echo 'selected'; ?>>Laki Laki</option>
                                            <option value="Perempuan" <?php if ($teacher['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" value="<?php echo $teacher['jabatan']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NUPTK / REG</label>
                                        <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $teacher['nip']; ?>" max="999999999999999999" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>

                                        <select class="form-select" name="class" required>
                                            <option value="4" <?php if ($teacher['id_kelas'] == '4') echo 'selected'; ?>>Bukan Wali Kelas</option>

                                            <option value="1" <?php if ($teacher['id_kelas'] == '1') echo 'selected'; ?>>Kelas 1</option>
                                            <option value="2" <?php if ($teacher['id_kelas'] == '2') echo 'selected'; ?>>Kelas 2</option>
                                            <option value="3" <?php if ($teacher['id_kelas'] == '3') echo 'selected'; ?>>Kelas 3</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $teacher['email']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_teacher" class="btn btn-primary">Update</button>
                                        <a href="guru.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "teacher not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid teacher ID.";
}

include 'template/footer.php';
?>