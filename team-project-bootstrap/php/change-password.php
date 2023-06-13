<?php
  session_start();

  include 'connection.php';
  include 'functions.php';

  if (isset($_POST['change-password-btn'])) {
    $old_password = $_POST['old-password'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    if (matchPasswords($conn, $new_password, $confirm_password) == false) {
      header("location: ../profile.php?error=mismatchedpasswords");
      exit();
    }

    $user_id = $_SESSION['userid'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $current_password;
    if ($row = mysqli_fetch_assoc($result)) {
      $current_password = $row['password'];
    } else {
      header("location: ../profile.php?error=usernotfound");
    }

    $verify_password = password_verify($old_password, $current_password);

    if ($verify_password === false) {
      header("location: ../profile.php?error=currentpasswordmismatch");
      exit();
    }
    else if ($verify_password === true) {
      $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

      $stmt = mysqli_prepare($conn, "UPDATE users SET password = ? WHERE id = ?;");
      mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $user_id);
      mysqli_stmt_execute($stmt);

      header("location: ../profile.php?error=none");
      exit();

      $stmt->close();
      $conn->close();
    }

  }
?>
