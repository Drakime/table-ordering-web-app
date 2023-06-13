<?php
  session_start();
?>

<?php include 'components/head.php'; ?>

  <!-- Custom CSS -->
  <link href="styles/styles.css" rel="stylesheet">
  <link href="styles/contact.css" rel="stylesheet">

  <!-- CDN for map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin="">
  </script>

  <title>Contact - Funky Bar</title>
</head>
<body class="d-flex flex-column vh-auto text-white text-center bg-dark">

  <?php include 'components/navbar.php' ?>

  <main class="d-flex flex-column vh-auto justify-content-center align-items-center column">
    <div class="container d-flex flex-row justify-content-center align-items-center pb-3 row">
      <form class="card text-start text-black shadow-lg col-sm-6" action="php/send-email.php">
        <h2>Contact Form</h2>
        <div class="form-group">
          <label for="name-input">Full Name</label>
          <input type="text" class="form-control form-control-inline" name="name-input" id="name-input" aria-describedby="nameHelp" required>
        </div>
        <div class="form-group">
          <label for="email-input">Email address</label>
          <input type="email" class="form-control form-control-inline" name="email-input" id="email-input" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="subject-input">Subject</label>
          <input type="text" class="form-control form-control-inline" name="subject-input" id="subject-input" aria-describedby="subjectHelp" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control form-control-inline" name="message" id="message" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary m-0 mt-3">Submit</button>
      </form>

      <div class="card contact-details text-center text-black justify-content-center shadow-lg col-sm-6">
        <h2>Contact Details</h2>
        <p><i class="bi bi-envelope" style="font-size: 1.5rem; padding-right: 2px;" alt="email"></i> funkybar@example.com</p>
        <p><i class="bi bi-telephone" style="font-size: 1.5rem;" alt="telephone"></i> 0113 000 0000</p>
        <address><i class="bi bi-geo-alt" style="font-size: 1.5rem;" alt="address"></i> Example Lane, Example, Leeds, LS1 ABC</address>
      </div>
    </div>

      <div class="container-fluid" id="map"></div>
  </main>

  <?php include 'components/footer.php' ?>

  <!-- Map Script -->
  <script type="text/javascript" src="scripts/map.js"></script>

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</body>
</html>
