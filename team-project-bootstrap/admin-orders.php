<?php
include 'components/admin-session.php'
?>

<?php include 'components/head.php'; ?>

<!-- DataTables CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<!-- Custom CSS -->
<link href="styles/dashboard.css" rel="stylesheet">

<title>Admin Orders - Funky Bar</title>
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
                <span data-feather="home">  </span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="admin-orders.php">
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

      <h2>Pending Orders</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle" id="pending-orders">
          <thead>
            <tr>
              <th scope="col">Table Number</th>
              <th scope="col">Drink</th>
              <th scope="col">Quantity</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody id="pending-order-rows">
            <!-- pending-orders-table.php is displayed here -->
          </tbody>
        </table>
      </div>

      <form class="form-group row g-3" action="php/remove-pending.php" method="post">   <!-- Action attribute is URl of PHP file -->
        <div class="col-lg-5 col-md-5 col-sm-1">
          <select class="form-select" name="order-details" id="complete-order-group">
            <!-- This select group is added dynamically using JavaScript -->
          </select>
        </div>
        <div>
          <button class="btn btn-primary" type="submit" name="complete-order">Complete</button>
        </div>
      </form>

      <h2 class="my-3">Completed Orders</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle" id="completed-orders">
          <thead>
            <tr>
              <th scope="col">Table Number</th>
              <th scope="col">Drink</th>
              <th scope="col">Quantity</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody id="completed-order-rows">
            <!-- completed-orders-table.php is displayed here -->
            <?php
            include 'php/connection.php';

            $sql = "SELECT * FROM orders WHERE status = 'complete';"; // queries 'orders' tables
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td><?php echo $row['table_no'] ?></td>
                <td class="w-25"><?php echo $row['drink_name'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td class="w-25"><?php echo $row['created_at'] ?></td>
              </tr>
            <?php }
            mysqli_free_result($result);
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="scripts/order-datatable.js"></script>

<script>
  feather.replace()
</script>

<script>
setInterval(function() {
  $.ajax({
    type: "GET",
    url: "components/pending-orders-table.php",
    dataType: 'html',
    success: function(response) {
      $("#pending-order-rows").html(response);
    }
  });
}, 3000);

setInterval(function() {
  $.ajax({
    type: "GET",
    url: "components/complete-order-selection.php",
    dataType: 'html',
    success: function(response) {
      $("#complete-order-group").html(response);
    }
  });
}, 3000);
</script>

</body>
</html>
