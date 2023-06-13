<?php
include '../php/connection.php';

$i = 0;

$sql = "SELECT * FROM orders WHERE status = 'pending';"; // queries 'orders' tables
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  $current_id = 'id-' . $i;
  $i++;
  ?>
  <tr>
    <!-- <td><?php echo $row['table_no']; ?></td>
    <td class="w-25"><?php echo $row['drink_name']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td class="w-25"><?php echo $row['created_at']; ?></td>
    <td><?php echo $row['id']; ?></td> -->
    <form method="post" action="php/remove-pending.php" id="form-row-<?php echo $current_id; ?>">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="test" value="<?php echo $row['id']; ?>">
      <td><?php echo $row['id']; ?></td>
      <td><button class="btn btn-primary btn-sm" type="submit" name="submit" form="form-row-<?php echo $current_id; ?>">Done</button></td>
    </form>
  </tr>

<?php }
// mysqli_free_result($result);
?>
