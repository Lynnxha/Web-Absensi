<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../assets/style-dashboard.css" />
  <link rel="shortcut icon" href="https://telegra.ph/file/f7d94892b32cdb66f4d36.jpg">
  <title>Dashboard Admin</title>
</head>

<body>
  <div>
  <h3 class="title">Dashboard</h3>
  <p class="message">
    <?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>
  </p>
  <p class="name">Halo <?= $nama_lengkap ?></>
  <p class="name">Status kepegawaian: <?= $role ?></p>
  
    <table class="table">
      <tr class="tr">
        <th class="th">#</th>
        <th class="th">Name</th>
        <th class="th">Position</th>
        <th class="th">Date</th>
        <th class="th">Clock in</th>
        <th class="th">Clockout</th>
      </tr>

      <?php
      include("../lib/config.php");
      $user_id = $_SESSION['user_id'];

      $sql = "SELECT * FROM users JOIN absensi ON users.user_id = absensi.user_id";

      $result = $db->query($sql);

      $no = 1;
      while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['role'] . "</td>";
        echo "<td class='td'>" . $data['tgl'] . "</td>";
        echo "<td class='td'>" . $data['jam_masuk'] . "</td>";
        echo "<td class='td'>" . $data['jam_keluar'] . "</td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align:center" onclick="window.print()">Print Report</button>
    <a href="../dashboard" style="text-align:center; margin-left: 3px;">Back To Dashboard</a>
  </div>
</body>

</html>