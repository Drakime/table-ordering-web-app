<?php
  session_start();
?>

<?php include 'components/head.php'; ?>


  <!-- Custom CSS -->
  <link href="styles/styles.css" rel="stylesheet">

  <title>Home - Funky Bar</title>
</head>
<body class="d-flex flex-column vh-100 text-center text-white bg-dark">

  <?php include 'components/navbar.php' ?>

  <main class="d-flex flex-column vh-100 justify-content-center align-items-center">
    <div class="container">
      <h2>Welcome!</h2>
      <p class="lead">
        This is the place to come for all things Funky Bar!
        Click the button below to start ordering, or use the
        sidebar to access other sections!
      </p>
      <p class="lead">
        <a href="order.php" class="btn btn-lg btn-light fw-bold">Order</a>
      </p>
    </div>
  </main>

  <?php include 'components/footer.php' ?>

</body>
</html>
