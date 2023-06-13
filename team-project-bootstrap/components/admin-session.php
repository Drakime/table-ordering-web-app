<?php
  session_start();

  if (!isset($_SESSION["username"]) || $_SESSION["user_type"] !== "admin") {
    header("location: login.php");
    exit();
  }
?>
