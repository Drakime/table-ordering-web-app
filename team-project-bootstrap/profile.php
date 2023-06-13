<?php include 'components/required-session.php' ?>

<?php include 'components/head.php'; ?>

<!-- Custom CSS -->
<link href="styles/dashboard.css" rel="stylesheet">

<title>Profile - Funky Bar</title>
</head>
<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Funky Bar</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php">
                <span data-feather="home"></span>
                Account Details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="php/logout.php">
                <span data-feather="log-out"></span>
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="align-items-center pt-3 pb-2 mb-3">
        <?php
          include 'php/connection.php';

          $user_id = $_SESSION['userid'];
          $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
          mysqli_stmt_bind_param($stmt, "i", $user_id);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="mb-3 row">
          <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticUsername" value="<?php echo $row['username']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['email']; ?>">
          </div>
        </div>
        <form action="php/change-password.php" method="post">
        <div class="mb-3 row">
          <label for="inputOldPassword" class="col-sm-2 col-form-label">Old Password</label>
          <div class="col-md-5 col-sm-10">
            <input type="password" class="form-control" name="old-password" id="old-password">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-md-5 col-sm-10">
            <input type="password" class="form-control" name="new-password" id="new-password">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm New Password</label>
          <div class="col-md-5 col-sm-10">
            <input type="password" class="form-control" name="confirm-password" id="confirm-password">
          </div>
        </div>
        <div>
          <button class="btn btn-primary" type="submit" name="change-password-btn">Confirm</button>
        </div>
      </form>
      <?php }
        ?>
      </div>

      <div>
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "none") {
              echo '<p style="color: #0d6efd">Password changed successfully</p>';
            }
            elseif ($_GET['error'] == "usernotfound") {
              echo '<p style="color: #dc3545">User details not found</p>';
            }
            elseif ($_GET['error'] == "currentpasswordmismatch") {
              echo '<p style="color: #dc3545">Old password is incorrect</p>';
            }
            elseif ($_GET['error'] == "mismatchedpasswords") {
              echo '<p style="color: #dc3545">New password and confirm password does not match</p>';
            }
          }
        ?>
      </div>

    </main>

  </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

</body>
</html>
