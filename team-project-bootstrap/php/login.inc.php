<?php
session_start();

if (isset($_POST["login-btn"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once 'connection.php';
  require_once 'functions.php';

  loginUser($conn, $username, $password);

} else {
  header("location: ../login.php?error=unknown");
  exit();
}
