<?php include 'components/admin-session.php' ?>

<?php include 'components/head.php'; ?>

<!-- Custom CSS -->
<link href="styles/dashboard.css" rel="stylesheet">

<title>Admin Stock - Funky Bar</title>
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
              <a class="nav-link" aria-current="page" href="admin-dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin-orders.php">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin-products.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="admin-stock.php">
                <span data-feather="bar-chart-2"></span>
                Stock
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">

      <h2>Stock</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Stock Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php include 'components/stock-table.php'; ?>
          </tbody>
        </table>
      </div>

      <div class="container m-3 text-center">
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "none") {
              echo '<p style="color: #0d6efd">Stock updated successfully</p>';
            }
            elseif ($_GET['error'] == "fail") {
              echo '<p style="color: #dc3545">Failed to update stock</p>';
            }
            elseif ($_GET['error'] == "invalidquantity") {
              echo '<p style="color: #dc3545">Quantity must be greater than 0</p>';
            }
            elseif ($_GET['error'] == "unknown") {
              echo '<p style="color: #dc3545">An unknown error occurred</p>';
            }
          }
        ?>
      </div>

      <form class="form-group row g-3 my-3" action="php/update-stock.inc.php" method="post">   <!-- Action attribute is URl of PHP file -->
        <div class="col-lg-3 col-md-3 col-sm-1">
          <select class="form-select" name="update-option" id="product-update-list" onChange="updateUpdateBtn()" aria-label="Drink">
            <!-- Option list should be populated with the products from the database -->
            <option selected>Choose a product...</option>
            <?php
            require_once 'php/connection.php';

            $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE stock IS NOT NULL");
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <option><?php echo $row['name'] ?></option>
              </tr>
            <?php }
            mysqli_stmt_close($stmt);
            ?>
            ?>
          </select>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-1">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">#</span>
            <input type="text" inputmode="numeric" class="form-control form-control-inline" placeholder="Quantity" name="quantity-input" id="quantity-input" aria-describedby="quantityHelp">
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" name="update-stock-btn" id="update-stock-btn" class="btn btn-primary" disabled>Update</button>
        </div>
      </form>
    </main>
  </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/disable-btn.js"></script>

<script>
  feather.replace()
</script>

</body>
</html>
