<?php
include 'php/connection.php';

$stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE stock IS NOT NULL");
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while($row = mysqli_fetch_array($result)) {
  ?>
  <tr>
    <td class="w-25"><?php echo $row['name'] ?></td>
    <td class="w-25"><?php echo $row['stock'] ?></td>
  </tr>
<?php }
mysqli_stmt_close($stmt);
?>
