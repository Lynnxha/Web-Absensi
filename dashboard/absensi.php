<table class="table">
  <tr class="tr">
    <th class="th">Date</th>
    <th class="th">Clock In</th>
    <th class="th">Clock Out</th>
    <th class="th">Performance</th>
  </tr>

  <?php

  include("../lib/config.php");

  date_default_timezone_set("Asia/Jakarta");

  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM absensi WHERE user_id='$user_id'";
  $result = $db->query($sql);
  $tgl = date('Y-m-d');
  $time = date('H:i:s');

  if (isset($_POST['clockout'])) {
    $sql = "UPDATE absensi SET jam_keluar='$time' WHERE user_id='$user_id' AND tgl='$tgl'";

    $clockout = $db->query($sql);
    if ($clockout === TRUE) {
      session_start();
      session_destroy();
      header("location:../index.php?message=Thanks You! Login Now Again");
    } else {
      echo "Sorry an error occurred";
    }

  }

  while ($data = $result->fetch_assoc()) {
    echo "<tr class='tr'>";
    echo "<td class='td'> " . $data['tgl'] . " </td>";
    echo "<td class='td'> " . $data['jam_masuk'] . " </td>";
    if (empty($data['jam_keluar']) && !empty($data['jam_masuk']) && $data['tgl'] == $tgl) {
      echo "<td class='td'>
      <form action='' method='POST'>
        <button name='clockout' type='submit' class='small-button'>Absen Clock Out</button>
      </form>
      </td>";
    } else {
      echo "<td class='td'> " . $data['jam_keluar'] . " </td>";
    }
    if (!empty($data['jam_masuk']) && !empty($data['jam_keluar'])) {
      echo "<td class='td'>✔</td>";
    } else {
      echo "<td class='td'>❌</td>";
    }
    echo "</tr>";
  }
  ?>
</table>
