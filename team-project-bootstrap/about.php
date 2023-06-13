<?php
  session_start();
?>

<?php include 'components/head.php'; ?>

  <!-- Custom CSS -->
  <link href="styles/styles.css" rel="stylesheet">

  <title>About - Funky Bar</title>
</head>
<body class="d-flex flex-column vh-100 text-center text-white bg-dark">

  <?php include 'components/navbar.php' ?>

  <main class="d-flex vh-100 vw-100 align-items-center row">
    <div class="container text-center justify-content-center align-items-center px-5 col-sm-6" style="font-size: 1vw;">
      <h2>About Us</h2>
      <p class="lead">
       Hi
      </p>
    </div>
    <div class="container justify-content-center align-items-center col-sm-6">
      <img src="images/about.jpg" style="max-width: 75%;" class="img-fluid" alt="Bottle of scotch whisky and two glasses">
    </div>
  </main>

  <?php include 'components/footer.php' ?>

</body>
</html>
