<?php
session_start();

if (isset($_POST["update-stock-btn"])) {

  require_once 'connection.php';

  $name = mysqli_real_escape_string($conn, $_POST["update-option"]);
  $quantity = mysqli_real_escape_string($conn, $_POST["quantity-input"]);

  if ($quantity < 0) {
    header("location: ../admin-stock.php?error=invalidquantity");
    exit();
  }

  require_once 'functions.php';

  updateStock($conn, $name, $quantity);

} else {
  header("location: ../admin-stock.php?error=unknown");
  exit();
}
