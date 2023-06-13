<?php
  session_start();
?>

<?php include 'components/head.php'; ?>

  <!-- DataTables CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

  <!-- Custom CSS -->
  <link href="styles/styles.css" rel="stylesheet">

  <title>Drinks - Funky Bar</title>
</head>
<body class="d-flex flex-column vh-100 text-center text-white bg-dark">

  <?php include 'components/navbar.php' ?>

  <main class="d-flex flex-column vh-100 justify-content-center align-items-center">
    <div class="container d-flex">
      <h1>Drinks</h1>
    </div>
    <div class="container">
      <table class="table table-bordered table-dark" id="drinks-table">
        <caption>List of Drinks</caption>
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
            mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <?php include 'components/footer.php' ?>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script type="text/javascript" src="scripts/drinks-page-datatable.js"></script>

</body>

</html>
