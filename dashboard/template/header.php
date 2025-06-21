<?php
include 'checkExpiredUserSession.php';


$userName = '';

if (isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
    $userId = $_SESSION['user_id'];


    // Assuming you have established a database connection
    include '../connection.php';

    // Retrieve the user's name from the database based on user_id
    $query = "SELECT * FROM admin WHERE email = '$userEmail'";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM siswa WHERE email = '$userEmail'";
    $result2 = mysqli_query($connection, $query2);

    $query3 = "SELECT * FROM guru WHERE email = '$userEmail'";
    $result3 = mysqli_query($connection, $query3);

    // Initialize role and username
    $role = 0; // Default role (e.g., 0 for unknown)
    $username = "";

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $role = 1;
        $username = $row['nama'];
    } else if (mysqli_num_rows($result2) === 1) {
        $row = mysqli_fetch_assoc($result2);
        $role = 2;
        $username = $row['nama'];
    } else if (mysqli_num_rows($result3) === 1) {
        $row = mysqli_fetch_assoc($result3);
        $role = 3;
        $username = $row['nama'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- PAGE TITLE HERE -->
    <title>SIMADU - <?php echo $pageTitle; ?></title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img src="images/kemenag.png" width="40" alt="" />

                <div class="brand-title">
                    <h2 class="">SIMADU</h2>
                    <span class="brand-sub-title">Sist. Info. MA Darul Ulum</span>
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar"><?php echo $pageTitle; ?></div>
                        </div>

                        <ul class="navbar-nav header-right">


                            <li class="nav-item dropdown header-profile">
                                <h4 style="margin-bottom: 0px;"><?php echo $username; ?></h4>
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="images/user.png" width="56" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- <a href="app-profile.html" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                  </a> -->
                                    <!-- <a href="email-inbox.html" class="dropdown-item ai-icon">
                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                      <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span class="ms-2">Inbox </span>
                  </a> -->
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->