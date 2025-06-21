<?php

session_start();

if (!isset($_SESSION['user_id'])) {
  echo '<style>
    @keyframes countdown {
      from { width: 100%; }
      to { width: 0%; }
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .notification {
      background-color: #cce5ff;
      color: #004085;
      border-color: #b8daff;
      padding: 10px;
      border: 1px solid;
      border-radius: 5px;
      font-family: "Montserrat", sans-serif;
      position: relative;
      max-width: 300px;
      text-align: center;
    }

    .countdown-bar {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      width: 100%;
      background-color: #004085;
      animation: countdown 7s linear forwards;
    }
  </style>';

  echo '<div class="notification">
    <strong>Anda belum login</strong> silahkan login terlebih dahulu
    <div class="countdown-bar"></div>
  </div>';

  echo '<script>
    setTimeout(function() {
      window.location.href = "../login/login.php";
    }, 7000); // Delay in milliseconds (3 seconds in this case)
  </script>';

  exit();
}
