<?php
$pageTitle = "Profil";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


?>

<div class="content-body">
    <div class="container-fluid">
        <div class="container">
            <h2><?php echo $pageTitle; ?></h2>
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Class ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_SESSION['user_id'])) {


                        $userId = $_SESSION['user_id'];

                        // Retrieve user data from the database based on user_id
                        $query = "SELECT * FROM admin WHERE id_admin = '$userId'";
                        $result = mysqli_query($connection, $query);

                        // Check if a row is found
                        if (mysqli_num_rows($result) === 1) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<tr>';

                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['gender'] . '</td>';
                            echo '<td>' . $row['birth_date'] . '</td>';
                            echo '<td>' . $row['nip'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['id_class'] . '</td>';
                            echo '</tr>';
                        } else {
                            echo '<tr><td colspan="7">No data found.</td></tr>';
                        }

                        // Close the database connection
                        mysqli_close($connection);
                    } else {
                        echo '<tr><td colspan="2">User not logged in.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <a href="profil_update.php" class="btn btn-primary">Ubah Data</a>

        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>