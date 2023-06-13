<?php

include 'connection.php';

if (isset($_SESSION['shopping_cart']) && isset($_SESSION['table_no'])) {
  foreach($_SESSION['shopping_cart'] as $row => $id) {
    $name = mysqli_real_escape_string($conn, $_SESSION['shopping_cart'][$row]['name']);
    $quantity = mysqli_real_escape_string($conn, $_SESSION['shopping_cart'][$row]['quantity']);
    $table_no = mysqli_real_escape_string($conn, $_SESSION['table_no']);
    $status = mysqli_real_escape_string($conn, "pending");

    $stmt = mysqli_prepare($conn, "INSERT INTO orders (table_no, drink_name, quantity, status) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isis", $table_no, $name, $quantity, $status);
    mysqli_stmt_execute($stmt);
  }

  $stmt->close();
  $conn->close();
}

unset($_SESSION['checkout']);
unset($_SESSION['shopping_cart']);
unset($_SESSION['table_no']);
