<?php include 'components/admin-session.php' ?>

<?php include 'components/head.php'; ?>

  <!-- DataTables CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

  <!-- Custom CSS -->
  <link href="styles/dashboard.css" rel="stylesheet">

  <title>Admin Products - Funky Bar</title>
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
              <a class="nav-link active" href="admin-products.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin-stock.php">
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

      <h2>Products List</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="products-list">
          <!-- Change according to drinks table in database -->
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Ingredients</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once 'php/connection.php';

              $sql = "SELECT * FROM products";    // queries the products tables
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row['name']?></td>    <!-- inserts row "name" into table row -->
              <td><?php echo $row['ingredients']?></td>
              <td><?php echo "£" . $row['price']?></td>
            </tr>
            <?php }
              mysqli_free_result($result);
            ?>
          </tbody>
        </table>
      </div>

      <h2 class="mt-3">Add Products</h2>
      <form class="form-group row g-3" action="php/add-product.inc.php" method="post">   <!-- Action attribute is URl of PHP file -->
        <div class="col-lg-3 col-md-3 col-sm-1">
          <label for="drink-name-input">Drink Name</label>
          <div class="input-group">
            <input type="text" class="form-control form-control-inline" name="drink-name-input" id="drink-name-input" aria-describedby="drinkNameHelp" required>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-1">
          <label for="ingredient-input">Ingredients</label>
          <div class="input-group">
            <input type="text" class="form-control form-control-inline" name="ingredient-input" id="ingredient-input" aria-describedby="ingredientHelp">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-1">
          <label for="price-input">Price</label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">£</span>
            <input type="text" inputmode="numeric" class="form-control form-control-inline" name="price-input" id="price-input" aria-describedby="priceHelp" required>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-1">
          <label for="stock-input">Stock</label>
          <div class="input-group">
            <select class="form-select" name="stock-input">
              <option value="no">No</option>
              <option value="yes">Yes</option>
            </select>
          </div>
        </div>
        <div>
          <button type="submit" name="add-drink-btn" class="btn btn-primary">Add</button>
        </div>
      </form>

      <h2 class="mt-5">Remove Products</h2>
      <form class="form-group row g-3" action="php/remove-product.inc.php" method="post">   <!-- Action attribute is URl of PHP file -->
        <div class="col-lg-3 col-md-3 col-sm-1">
          <select class="form-select" name="drink-option" id="product-list" onChange="update()" aria-label="Drink">
            <!-- Option list should be populated with the products from the database -->
            <option selected>Choose a product...</option>
            <?php
              require_once 'php/connection.php';

              $sql = "SELECT * FROM products";    // queries the products tables
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) {
            ?>
              <option><?php echo $row['name'] ?></option>
            <?php }
              mysqli_free_result($result);
              mysqli_close($conn);
            ?>
          </select>
        </div>
        <div>
          <button type="submit" name="remove-drink-btn" id="remove-drink-btn" class="btn btn-danger" disabled>Remove</button>
        </div>
      </form>

    </main>
  </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

<script type="text/javascript" src="scripts/disable-btn.js"></script>
<script type="text/javascript" src="scripts/products-list-datatable.js"></script>

<script>
  feather.replace()
</script>

</body>
</html>
