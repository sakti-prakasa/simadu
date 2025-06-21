<?php
$pageTitle = "Tambah orangtua";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Retrieve data from the class table
$query = "SELECT * FROM students";
$result = mysqli_query($connection, $query);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $pageTitle; ?></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="orangtua_tambah_process.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">nip</label>
                                <input type="text" class="form-control" id="nip" name="nip" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_student" class="form-label">Class</label>
                                <select class="form-select" id="id_student" name="id_student" required>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id_student'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create parent</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>