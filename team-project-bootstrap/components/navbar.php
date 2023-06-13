<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark shadow-sm rounded" aria-label="Navigation Bar">
  <div class="container-fluid navbar-container">
    <a class="navbar-brand" href="index.php">Funky Bar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-start" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="drinks.php">Drinks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <?php
        if (isset($_SESSION["username"])) {
          if ($_SESSION["user_type"] == "admin") {
            echo '<a class="btn btn-light btn-sm" href="admin-dashboard.php" role="button">' .$_SESSION["username"]. '</a>';
          }
          else {
            echo '<a class="btn btn-light btn-sm" href="profile.php" role="button">' .$_SESSION["username"]. '</a>';
          }
          echo '<a class="btn btn-primary btn-sm" href="php/logout.php" role="button">Log Out</a>';
        } else {
          echo '<a class="btn btn-light btn-sm" href="login.php" role="button">Log In</a>';
          echo '<a class="btn btn-primary btn-sm" href="signup.php" role="button">Sign Up</a>';
        }
      ?>
    </div>
    <a class="btn btn-warning btn-sm" href="cart.php" role="button" id="cart">
      <i class="bi bi-cart3"></i> Cart
    </a>
  </div>
</nav>
