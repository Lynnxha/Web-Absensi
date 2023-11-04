<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php?message=selamat datang kembali...");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="shortcut icon" href="https://telegra.ph/file/f7d94892b32cdb66f4d36.jpg">
  <title>ABSENSI PAGE</title>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <h3 class="login-title">System Login</h3>
      <form action="login.php" method="POST" class="login-form">
        <?php
        if (isset($_GET['message'])) {
          echo $_GET['message'];
        }
        ?>
        <input name="user_id" type="text" class="login-input" placeholder="Masukan ID User Anda" />
        <input name="password" type="password" class="login-input" placeholder="Masukan Password Anda" />
        <button type="submit" name="login" class="login-button">Login</button>
      </form>
    </div>
  </div>
</body>

</html>