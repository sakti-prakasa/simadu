<?php
$pageTitle = "Edit Siswa";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Retrieve the student data from the database 
    $query = "SELECT * FROM siswa WHERE id_siswa = $studentId";
    $result = mysqli_query($connection, $query);

    // Check if the student exists
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing student information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="siswa_update_process.php">


                                    <input type="hidden" name="student_id" value="<?php echo $student['id_siswa']; ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $student['nama']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">NISN</label>
                                                <input type="text" class="form-control" name="nis" value="<?php echo $student['nis']; ?>" placeholder="Masukkan NISN" required pattern="[0-9]{10}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $student['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nama_ortu" class="form-label">Nama Ortu</label>
                                                <input type="text" value="<?php echo $student['nama_ortu']; ?>" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan nama orang tua" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nohp_ortu" class="form-label">No HP Ortu</label>
                                                <input type="text" value="<?php echo $student['nohp_ortu']; ?>" class="form-control" id="nohp_ortu" name="nohp_ortu" placeholder="Masukkan NO HP Orang Tua" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" name="gender">
                                                    <option value="Laki Laki" <?php if ($student['gender'] == 'Laki Laki') echo 'selected'; ?>>Laki Laki</option>
                                                    <option value="Perempuan" <?php if ($student['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="birth_date" value="<?php echo $student['tanggal_lahir']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>

                                                <select class="form-select" name="class">
                                                    <option value="4" <?php if ($student['id_kelas'] == '4') echo 'selected'; ?>>Belum ada Kelas</option>

                                                    <option value="1" <?php if ($student['id_kelas'] == '1') echo 'selected'; ?>>Kelas 1</option>
                                                    <option value="2" <?php if ($student['id_kelas'] == '2') echo 'selected'; ?>>Kelas 2</option>
                                                    <option value="3" <?php if ($student['id_kelas'] == '3') echo 'selected'; ?>>Kelas 3</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update</button>
                                        <a href="siswa.php" class="btn btn-secondary">Cancel</a>
                                    </div>
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
        echo "Siswa tidak ditemukan.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid student ID.";
}

include 'template/footer.php';
?>