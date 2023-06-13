<?php
include 'php/add-to-cart.inc.php';
?>

<?php include 'components/head.php'; ?>

<!-- Custom CSS -->
<link href="styles/cart.css" rel="stylesheet">

<title>Cart - Funky Bar</title>
</head>
<body class="bg-light">
  <div class="container">
    <main>
      <div class="container m-3">
        <a href="order.php"><span><i class="bi bi-arrow-left"></i> Go back to order</span></a>
      </div>
      <div class="py-5 text-center">
        <h1 class="d-block mx-auto mb-4 pb-4 border-bottom">Funky Bar</h1>
        <h2>Shopping Cart</h2>
        <p class="lead">Listed below are your items and a summary of your cart</p>
      </div>

      <div class="row g-3 justify-content-center align-items-center">
        <div class="col-md-5 col-lg-4">
          <h4 class="d-flex justify-content-center align-items-center mb-1">
            <span class="text-muted">Your cart</span>
          </h4>

          <!-- Shopping Cart -->
          <ul class="list-group mb-3 align-items-center">
            <?php
            if(!empty($_SESSION['shopping_cart'])):

              $total = 0;

              foreach($_SESSION['shopping_cart'] as $key => $row):
                ?>
                <li class="list-group-item d-flex lh-sm">
                  <div class="w-50 d-flex column align-items-center">
                    <h6 class="my-0"><?php echo $row['name']; ?></h6>
                  </div>
                  <div class="w-25 d-flex column justify-content-center align-items-center">
                    <span class="text-muted"><?php echo "Qty: " . $row['quantity']; ?></span>
                  </div>
                  <div class="w-25 d-flex column justify-content-end align-items-center">
                    <span class="text-muted"><?php echo "£" . number_format($row['price'] * $row['quantity'], 2); ?></span>
                    <a href="cart.php?action=delete&id=<?php echo $row['id']; ?>"
                      <i class="bi bi-trash p-2" style="color: #dc3545; text-align: right; font-size: 1.25rem;"></i>
                    </a>
                  </div>
                </li>
                <?php
                $total = $total + ($row['quantity'] * $row['price']);
                $_SESSION['cart_total'] = $total;
              endforeach;
              ?>
            </ul>

          </div>
        </div>

        <!-- Table number and summary -->
        <div class="row g-3 justify-content-center align-items-center">
          <div class="col-md-5 col-lg-4 col-md-0">
            <h4 class="d-flex justify-content-center align-items-center mb-1">
              <span class="text-muted">Table Number</span>
            </h4>
            <div class="">
              <form method="post" action="php/checkout.inc.php" id="confirm-checkout">
                <select class="form-select" name="table-no">
                  <option selected>1</option>
                  <option >2</option>
                  <option >3</option>
                  <option >4</option>
                  <option >5</option>
                  <option >6</option>
                  <option >7</option>
                  <option >8</option>
                  <option >9</option>
                  <option >10</option>
                </select>
              </form>
            </div>
            <h4 class="d-flex justify-content-center align-items-center mb-1">
              <span class="text-muted mt-3">Summary</span>
            </h4>
            <div class="card mb-3">
              <div class="d-flex justify-content-between p-3 lh-sm">
                <h6 class="my-0">Total</h6>
                <span class="text-muted"><?php echo "£" . number_format($total, 2); ?></span>     <!-- Replace using PHP and query. Might be possible using JavaScript, by selecting elements. -->
              </div>
            </div>
          </div>
        </div>

        <?php
        if (isset($_SESSION['shopping_cart'])):
          if (count($_SESSION['shopping_cart']) > 0):
            ?>
            <!-- Checkout button -->
            <div class="row g-3 justify-content-center align-items-center">
              <div class="col-md-5 col-lg-4 col-md-last d-flex justify-content-center align-items-center">
                <button class="btn btn-primary w-100" type="submit" name="checkout-btn" form="confirm-checkout">Checkout</a>
                </div>
              </div>
            <?php endif; endif; ?>
          <?php endif; ?>
        </main>
      </div>

      <footer>
        <p class="my-3 text-muted text-center">&copy; Team 10</p>
        <i class="bi bi-123"></i>
      </footer>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    </html>
