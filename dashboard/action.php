<?php
include("../lib/config.php");
session_start();

date_default_timezone_set("Asia/Jakarta");

$user_id = $_SESSION['user_id'];
$tgl = date('Y-m-d');
$time = date('H:i:s');

$check_absen = "SELECT * FROM absensi WHERE user_id='$user_id' AND tgl='$tgl'";
$check = $db->query($check_absen);

if ($check->num_rows > 0) {
  // jika user sudah pernah absen di hari ini 👇
  header("location:index.php?message=❌ Sorry, you're already clockin today! ❌");
} else {
  // jika user belum absen maka dia bisa absen hari ini 👇
  $sql = "INSERT INTO absensi (`id`, `user_id`, `tgl`, `jam_masuk`, `jam_keluar`) VALUES (NULL, '$user_id', '$tgl', '$time', NULL)";

  $result = $db->query($sql);

  if ($result === TRUE) {
    header("location:index.php?message=✔ Thank you for CLOCK IN today! ✔");
  } else {
    header("location:index.php?message=❌ Sorry Clockin Failed! ❌");
  }
}

?>