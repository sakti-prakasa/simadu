<?php
$pageTitle = "Tambah Jadwal Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if the add course button is clicked
if (isset($_POST['add_course'])) {
    $name = $_POST['name'];
    $day = $_POST['day'];
    $startHours = $_POST['start_hours'];
    $endHours = $_POST['end_hours'];

    // Insert the new course into the database
    $insertQuery = "INSERT INTO course (name, day, start_hours, end_hours) VALUES ('$name', '$day', '$startHours', '$endHours')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        // Course added successfully
        echo "<script>alert('Course added successfully');</script>";
        echo "<script>window.location.href = 'jadwalpelajaran.php';</script>";
    } else {
        // Failed to add course
        echo "<script>alert('Failed to add course');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Jadwal Pelajaran</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <select class="form-control" id="day" name="day">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="start_hours" class="form-label">Start Hours</label>
                                <input type="time" class="form-control" id="start_hours" name="start_hours" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_hours" class="form-label">End Hours</label>
                                <input type="time" class="form-control" id="end_hours" name="end_hours" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_course">Add Jadwal Pelajaran</button>
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