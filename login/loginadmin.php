<?php
session_start();

include 'checkActiveUserSession.php';

// Assuming you have established a database connection
include '../connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted email and password
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Perform database query to validate credentials
  $query = "SELECT * FROM admin WHERE email = '$email'";
  $result = mysqli_query($connection, $query);

  // Check if a matching row is found
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    // Verify the password
    if (password_verify($password, $storedPassword)) {
      // Password is correct, log in the user and redirect to the dashboard or home page
      $_SESSION['user_id'] = $row['id_admin'];
      $_SESSION['user_email'] = $row['email'];

      header('Location: ../dashboard/index.php');
      exit();
    } else {
      // Password is incorrect
      $error = 'Invalid password';
    }
  } else {
    // No matching user found
    $error = 'User not found';
  }
}
?>

<!-- Your HTML login form -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
  <title>MA Darul Ulum - Login</title>
  <link rel="shortcut icon" type="image/png" href="../dashboard/images/favicon.png">

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-2"></div>
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-key">
          <i class="fa fa-key" aria-hidden="true"></i>
        </div>
        <div class="col-lg-12 login-title">MA DARUL ULUM</div>
        <h4 style="color: aliceblue;"> Login Admin </h4>

        <?php if (isset($error)) : ?>
          <p style="color: red; background-color: aliceblue;"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="col-lg-12 login-form">
          <form action="loginadmin.php" method="POST">
            <fieldset>
              <div class="form-group">
                <label class="form-control-label" for="email">EMAIL</label>
                <input type="email" id="email" name="email" class="form-control" required />
              </div>
              <div class="form-group">
                <label class="form-control-label" for="password">PASSWORD</label>
                <input type="password" id="password" name="password" class="form-control" required />
              </div>
              <div class="form-group">
                <!-- <a href="forgot_password.php" style="color: white;">Lupa Password?</a> -->

                <a href="loginsiswa.php" style="padding-left: 20px; color: white;">Login sebagai Siswa </a>
                <a href="loginguru.php" style="padding-left: 20px; color: white;">Login sebagai Guru </a>


              </div>
              <div class="form-group">

              </div>
              <div class="col-lg-12 loginbttm">
                <div class="col-lg-6 login-btm login-text">
                  <!-- Error Message -->
                </div>
                <div class="col-lg-6 login-btm login-button">
                  <input type="submit" class="btn btn-outline-primary" value="Login">

                  </input>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="col-lg-3 col-md-2"></div>
      </div>
    </div>
  </div>
</body>

</html>