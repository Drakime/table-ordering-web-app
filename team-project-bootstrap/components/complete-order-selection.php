<?php
include '../php/connection.php';

$sql = "SELECT * FROM orders WHERE status = 'pending';"; // queries 'orders' tables
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  echo '<option value="' . $row['id'] . '"> Table: ' . $row['table_no'] . ', Drink: ' . $row['drink_name'] . ', Qty: ' . $row['quantity'];
}
// mysqli_free_result($result);
?>
