<?php
session_start();

if (isset($_POST["remove-drink-btn"])) {

  require_once 'connection.php';
  
  $name = mysqli_real_escape_string($conn, $_POST["drink-option"]);

  require_once 'functions.php';

  removeProduct($conn, $name);

} else {
  header("location: ../admin-product.php?error=unknown");
  exit();
}
