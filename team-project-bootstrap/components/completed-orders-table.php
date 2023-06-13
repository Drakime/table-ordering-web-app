<?php
include 'php/connection.php';

$sql = "SELECT * FROM orders WHERE status = 'complete';"; // queries 'orders' tables
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  ?>
  <tr>
    <td class="w-25"><?php echo $row['table_no'] ?></td>
    <td class="w-25"><?php echo $row['drink_name'] ?></td>
    <td><?php echo $row['quantity'] ?></td>
    <td class="w-50"><?php echo $row['created_at'] ?></td>
  </tr>
<?php }
mysqli_free_result($result);
?>
