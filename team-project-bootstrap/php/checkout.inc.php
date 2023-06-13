<?php
session_start();

  if(!isset($_SESSION['table_no'])) {
    $_SESSION['table_no'] = $_POST['table-no'];

    header("location: ../checkout.php");
    exit();
  } else if (isset($_SESSION['table_no'])) {
    $_SESSION['table_no'] = $_POST['table-no'];

    header("location: ../checkout.php");
    exit();
  } else {
    header("location: ../checkout.php?error=tablefail");
    exit();
  }
