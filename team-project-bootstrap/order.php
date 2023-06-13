<?php
include 'php/add-to-cart.inc.php';
?>

<?php include 'components/head.php'; ?>

<!-- Custom CSS -->
<link href="styles/styles.css" rel="stylesheet">

<title>Order - Funky Bar</title>
</head>
<body class="d-flex flex-column vh-auto text-center text-white bg-dark">

  <?php include 'components/navbar.php'; ?>

  <main class="d-flex flex-column vh-auto justify-content-center align-items-center">
    <div class="d-flex justify-content-center align-items-center text-black">
      <div class="container">
        <div class="row">
          <?php
          require_once 'php/connection.php';

          $i = 0;

          $sql = "SELECT * FROM products";    // queries the products tables
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)) {
            $current_id = 'id-' . $i;
            $i++;
          ?>
            <div class="d-flex align-items-center justify-content-center col-sm col-xs-12">
              <div class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="https://picsum.photos/286/180" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['name']?></h5>
                  <a class="view-ingredients" data-bs-toggle="collapse" data-bs-target="<?php echo "#" . $current_id ?>" role="button" aria-expanded="false" aria-controls="<?php echo $current_id ?>">
                    View Ingredients
                  </a>
                  <p class="card-text collapse mt-3" id="<?php echo $current_id ?>"><?php echo $row['ingredients']?></p>
                  <p class="card-text mt-1 mb-1"><?php echo "£" . $row['price']?></p>
                  <form method="post" action="order.php?action=add&id=<?php echo $row['id']; ?>">
                    <div class="container d-flex">
                      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                      <input class="btn btn-primary mx-3" type="submit" name="add-to-cart" value="Add to cart">
                      <input type="number" class="form-control w-25" name="quantity" value="1" min="1" max="99">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php }
          ?>
        </div>
      </div>
    </div>
  </main>

  <?php include 'components/footer.php' ?>

</body>

</html>
