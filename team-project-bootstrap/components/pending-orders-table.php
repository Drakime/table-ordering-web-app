<?php
include '../php/connection.php';

$i = 0;

$sql = "SELECT * FROM orders WHERE status = 'pending';"; // queries 'orders' tables
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  $current_id = 'id-' . $i;
  $i++;
    echo "<tr>";
      echo "<td>" . $row['table_no'] . "</td>";
      echo "<td class=\"w-25\">" . $row['drink_name'] . "</td>";
      echo "<td>" . $row['quantity'] . "</td>";
      echo "<td class=\"w-25\">" . $row['created_at'] . "</td>";
    echo "</tr>";
}
mysqli_free_result($result);
?>
