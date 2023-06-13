<?php
session_start();

if (isset($_POST["complete-order"])) {

  require_once 'connection.php';

  if (isset($_POST['order-details'])) {

    $order_id = mysqli_real_escape_string($conn, $_POST['order-details']);

    $stmt = mysqli_prepare($conn, "UPDATE orders SET status = 'complete' WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $drink_name = "";
    $quantity_used = "";

    while($row = mysqli_fetch_assoc($result)) {
      $drink_name = $row['drink_name'];
      $quantity_used = $row['quantity'];
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE name =?");
    mysqli_stmt_bind_param($stmt, "s", $drink_name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $new_stock = "";

    while($row = mysqli_fetch_assoc($result)) {
      if ($row['stock'] !== NULL) {
        $new_stock = $row['stock'] - $quantity_used;
        $stmt = mysqli_prepare($conn, "UPDATE products SET stock = ? WHERE name = ?;");
        mysqli_stmt_bind_param($stmt, "is", $new_stock, $drink_name);
        mysqli_stmt_execute($stmt);
      } else {
        header("location: ../admin-orders.php?error=nostock");
        exit();
      }
    }

    header("location: ../admin-orders.php?error=none");
    exit();
  } else {
    header("location: ../admin-orders.php?error=failed");
    exit();
  }
} else {
  header("location: ../admin-product.php?error=unknown");
  exit();
}
