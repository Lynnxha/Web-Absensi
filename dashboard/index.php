<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
  header("location:../index.php?message=Please log in first!");
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("location:../index.php?message=Thank you for visiting");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../assets/style-dashboard.css" />
  <link rel="shortcut icon" href="https://telegra.ph/file/f7d94892b32cdb66f4d36.jpg">
  <title>DASHBOARD</title>
</head>

<body>
  <h3 class="title">Dashboard</h3>
  <p class="message">
    <?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>
  </p>
  <p class="name">Halo <?= $nama_lengkap ?></>
  <p class="name">Employment Status: <?= $role ?></p>

  <div class="button-container">
    <form action="action.php" method="POST">
        <button name="absen" type="submit">Attendance</button>
    </form>
    <form action="index-admin.php" method="GET">
      <button type="submit">Report</button>
    </form>
    <form action="" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
  </div>

  <!-- showing a attendances data -->
  <?php include("absensi.php"); ?>

</body>

</html>