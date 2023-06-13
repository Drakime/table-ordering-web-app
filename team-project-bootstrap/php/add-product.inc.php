<?php
session_start();

if (isset($_POST["add-drink-btn"])) {

    require_once 'connection.php';

    $name = mysqli_real_escape_string($conn, $_POST["drink-name-input"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredient-input"]);
    $price = mysqli_real_escape_string($conn, $_POST["price-input"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock-input"]);

    require_once 'functions.php';

    if (emptyName($conn, $name) == false) {
      header("location: ../admin-products.php?error=emptyname");
      exit();
    }

    if (emptyPrice($conn, $price) == false) {
      header("location: ../admin-products.php?error=emptyprice");
      exit();
    }

    addProduct($conn, $name, $ingredients, $price, $stock);

} else {
  header("location: ../admin-products.php?error=unknown");
  exit();
}
