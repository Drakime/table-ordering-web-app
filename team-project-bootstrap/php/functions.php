<?php
// Registration functions
function createUser($conn, $username, $email, $password) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
  mysqli_stmt_execute($stmt);

  header("location: ../signup.php?error=none");

  $stmt->close();
  $conn->close();

  exit();
}

function checkUsername($conn, $username) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    return $row;
  } else {
    $status = false;
    return $status;
  }

  mysqli_stmt_close($stmt);
}

function checkEmail($conn, $email) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM users where email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    return $row;
  } else {
    $status = false;
    return $status;
  }

  mysqli_stmt_close($stmt);
}

function matchPasswords($conn, $password, $confirm_password) {
  if ($password !== $confirm_password) {
    $status = false;
  } else {
    $status = true;
  }
  return $status;
}

// Login Functions
function loginUser($conn, $username, $password) {
  $usernameExists = checkUsername($conn, $username);
  $emailExists = checkEmail($conn, $username);

  if ($usernameExists || $emailExists) {

    $hashedPassword;

    if ($usernameExists ) {
      $hashedPassword = $usernameExists["password"];
    }
    else if ($emailExists) {
      $hashedPassword = $emailExists["password"];
    }

    $verifyPassword = password_verify($password, $hashedPassword);

    if ($verifyPassword === false) {
      header("location: ../login.php?error=incorrectlogin");
      exit();
    }
    else if ($verifyPassword === true) {
      session_start();

      $_SESSION["userid"];
      $_SESSION["username"];

      if ($usernameExists) {
        $_SESSION["userid"] = $usernameExists["id"];
        $_SESSION["username"] = $usernameExists["username"];
        $_SESSION["user_type"] = $usernameExists["user_type"];
      }
      else if ($emailExists) {
        $_SESSION["userid"] = $emailExists["id"];
        $_SESSION["username"] = $emailExists["username"];
        $_SESSION["user_type"] = $emailExists["user_type"];
      }
      header("location: ../index.php");
      exit();
    }
  }
  else {
    header("location: ../login.php?error=incorrectlogin");
    exit();
  }
}

// Add / remove products functions
function addProduct($conn, $name, $ingredients, $price, $stock) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM products where name = ?");
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    header("location: ../admin-products.php?error=duplicate");
    exit();
  }

  $has_stock = "";
  if ($stock == "yes") {
    $has_stock = 0;

    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, ingredients, price, stock) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssdi", $name, $ingredients, $price, $has_stock);
    mysqli_stmt_execute($stmt);

    header("location: ../admin-products.php?error=none");
    exit();

    $stmt->close();
    $conn->close();
  } else {
    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, ingredients, price) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssd", $name, $ingredients, $price);
    mysqli_stmt_execute($stmt);

    header("location: ../admin-products.php?error=none");
    exit();

    $stmt->close();
    $conn->close();
  }

}

function removeProduct($conn, $name) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM products where name = ?");
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $stmt = mysqli_prepare($conn, "DELETE FROM products WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    header("location: ../admin-products.php?error=none");
    exit();

    $stmt->close();
    $conn->close();
  } else {
    header("location: ../admin-products.php?error=fail");
    exit();
  }
}

function emptyName($conn, $name) {
  $status;
  if ($name === "") {
    $status = false;
  } else {
    $status = true;
  }
  return $status;
}

function emptyPrice($conn, $price) {
  $status;
  if ($price === "") {
    $status = false;
  } else {
    $status = true;
  }
  return $status;
}

// Stock Page Functions
function updateStock($conn, $name, $quantity) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM products where name = ?");
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $stmt = mysqli_prepare($conn, "UPDATE products SET stock = ? WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "is", $quantity, $name);
    mysqli_stmt_execute($stmt);

    header("location: ../admin-stock.php?error=none");
    exit();

    $stmt->close();
    $conn->close();
  } else {
    header("location: ../admin-stock.php?error=fail");
    exit();
  }
}
