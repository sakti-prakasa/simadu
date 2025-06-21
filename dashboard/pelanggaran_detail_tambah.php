<?php
$pageTitle = "Tambah Data Pelanggaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $violationId = $_POST['violation_id'];
    $studentId = $_POST['student_id'];

    // Insert the pelanggaran detail into the database
    $insertViolationDetailQuery = "INSERT INTO pelanggaran_detail (id_pelanggaran, id_siswa)
                                   VALUES ('$violationId', '$studentId')";

    if (mysqli_query($connection, $insertViolationDetailQuery)) {
        echo "<script>alert('Data pelanggaran berhasil ditambahkan.');</script>";
        echo "<script>window.location.href = 'pelanggaran_detail.php';</script>";
    } else {
        echo "<script>alert('Error adding pelanggaran detail: " . mysqli_error($connection) . "');</script>";
    }
}

// Retrieve the data from the pelanggaran table
$query = "SELECT * FROM pelanggaran";
$violationResult = mysqli_query($connection, $query);

// Retrieve the data from the student table
$query2 = "SELECT * FROM siswa";
$studentResult2 = mysqli_query($connection, $query2);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="violation_id" class="form-label">Pelanggaran</label>
                                <select name="violation_id" id="violation_id" class="form-select" required>
                                    <option value="" selected disabled>Pilih Pelanggaran</option>
                                    <?php
                                    // Display pelanggaran options
                                    while ($row = mysqli_fetch_assoc($violationResult)) {
                                        echo "<option value='" . $row['id_pelanggaran'] . "'>" . $row['nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Siswa</label>
                                <select name="student_id" id="student_id" class="form-select" required>
                                    <option value="" selected disabled>Pilih Siswa</option>
                                    <?php
                                    // Display student options
                                    while ($row2 = mysqli_fetch_assoc($studentResult2)) {
                                        $class = "";
                                        switch ($row2['id_kelas']) {
                                            case 1:
                                                $class = "X";
                                                break;
                                            case 2:
                                                $class = "XI";
                                                break;
                                            case 3:
                                                $class = "XII";
                                                break;
                                            default:
                                                // Handle cases where id_kelas is not 1, 2, or 3 if needed
                                                break;
                                        }

                                        echo "<option value='" . $row2['id_siswa'] . "'>" . $row2['nama'] . ' - Kelas ' . $class . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>