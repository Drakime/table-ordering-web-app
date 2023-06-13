<?php
  session_start();
?>

<?php include 'components/head.php'; ?>

  <!-- Custom CSS -->
  <link href="styles/signup.css" rel="stylesheet">

  <title>Sign Up - Funky Bar</title>
</head>
<body class="text-center">

  <main class="form-signup">
    <form action="php/register.inc.php" method="post"> <!-- Action attribute is URl of PHP file -->
      <h2 class="border-bottom"><a href="index.php">Funky Bar</a></h2>
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "existingusername") {
            echo '<p style="color: #dc3545">Username already exists</p>';
          }
          else if ($_GET["error"] == "existingemail") {
            echo '<p style="color: #dc3545">Email already exists</p>';
          }
          else if ($_GET["error"] == "mismatchedpasswords") {
            echo '<p style="color: #dc3545">Passwords do not match</p>';
          }
          else if ($_GET["error"] == "none") {
            echo '<p style="color: #0d6efd">Account created successfully!</p>';
          }
        }
      ?>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email Address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword-1" name="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword-2" name="confirm-password" placeholder="Password" required>
        <label for="floatingPassword">Confirm Password</label>
      </div>


      <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup-btn">Sign Up</button>
      <p class="mt-3">Already have an account? <a href="login.php">Log in</a></p>
      <p class="mb-3 text-muted">&copy; Team 10</p>
    </form>
  </main>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
