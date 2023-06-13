<?php
  session_start();
?>

<?php include 'components/head.php'; ?>

  <!-- Custom CSS -->
  <link href="styles/login.css" rel="stylesheet">

  <title>Log In - Funky Bar</title>
</head>
<body class="text-center">

  <main class="form-login">
    <form action="php/login.inc.php" method="post"> <!-- Action attribute is URl of PHP file -->
      <h2 class="border-bottom"><a href="index.php">Funky Bar</a></h2>
      <h1 class="h3 mb-3 fw-normal">Please log in</h1>

      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "incorrectlogin") {
            echo '<p style="color: #dc3545">Log in attempt failed</p>';
          }
        }
      ?>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
        <label for="floatingInput">Username / Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login-btn">Log In</button>
      <p class="mt-3">Not registered? <a href="signup.php">Create an account</a></p>
      <p class="mb-3 text-muted">&copy; Team 10</p>
    </form>
  </main>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
