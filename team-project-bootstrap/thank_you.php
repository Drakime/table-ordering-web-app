<?php
  session_start();

  // if (isset($_SESSION['checkout'])) {
    include 'php/order-to-database.php';
  // } else {
  //   header("location: index.php");
  //   exit();
  // }
?>

<?php include 'components/head.php'; ?>

<!-- Custom CSS -->
<link href="styles/cart.css" rel="stylesheet">

<title>Checkout - Funky Bar</title>
</head>
<body>
  <div class="container">
    <main>

      <div class="py-5 text-center">
        <h1 class="d-block mx-auto mb-4 pb-4 border-bottom">Funky Bar</h1>
      </div>
      <div class="py-5 text-center">
        <p class="lead" style="font-size: 2rem;">Thank you for your purchase!</p>
        <a href="index.php" role="button" class="btn btn-primary my-3">Go home</a>
      </div>
    </main>
  </div>

  <div class="container">
    <footer>
      <p class="text-muted text-center">&copy; Team 10</p>
      <i class="bi bi-123"></i>
    </footer>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
