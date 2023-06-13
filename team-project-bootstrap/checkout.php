<?php
  session_start();
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
      <h2>Checkout</h2>
    </div>

    <div class="row g-3 justify-content-center align-items-center">
      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id=AZHVOGWlYKs-E7OfEH54aKsSLQeI_70Ykogk1wHUbyGH20melMT8PiqDO0QxXCp7JadhCi_VDlUDVNA3&currency=GBP"></script>
      <!-- Set up a container element for the button -->
      <div class="col-md-5 col-lg-4 m-3" id="paypal-button-container"></div>
      <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $_SESSION['cart_total']; ?>' // Can also reference a variable or function [in other words, you can replace this with PHP]
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            document.location.href = "thank_you.php";
            <?php $_SESSION['checkout'] = true; ?>
          });
        }
      }).render('#paypal-button-container');
      </script>
    </div>
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
