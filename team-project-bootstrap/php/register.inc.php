<?php
session_start();

if (isset($_POST["signup-btn"])) {

  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm-password"];

  require_once 'connection.php';
  require_once 'functions.php';

  if (checkUsername($conn, $username) !== false) {
    header("location: ../signup.php?error=existingusername");
    exit();
  }

  if (checkEmail($conn, $email) !== false) {
    header("location: ../signup.php?error=existingemail");
    exit();
  }

  if (matchPasswords($conn, $password, $confirm_password) == false) {
    header("location: ../signup.php?error=mismatchedpasswords");
    exit();
  }

  createUser($conn, $username, $email, $password, $confirm_password);

} else {
  header("location: ../signup.php?error=unknown");
  exit();
}
