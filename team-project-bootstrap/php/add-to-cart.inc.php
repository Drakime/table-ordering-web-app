<?php
session_start();

$product_ids = array();

// check if Add to Cart button has been submitted
if (filter_input(INPUT_POST, 'add-to-cart')) {
  if (isset($_SESSION['shopping_cart'])) {

    // track how many products in shopping cart
    $count = count($_SESSION['shopping_cart']);

    // create sequential array to match array keys to product ids
    $product_ids = array_column($_SESSION['shopping_cart'], 'id');

    if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
      $_SESSION['shopping_cart'][$count] = array
      (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
      );
    } else {  // product already exists - increase quantity
      // match array key to id of product being added to the cart
      for ($k = 0; $k < count($product_ids); $k++) {
        if ($product_ids[$k] == filter_input(INPUT_GET, 'id')) {
          // add item quantity to existing product in array
          $_SESSION['shopping_cart'][$k]['quantity'] += filter_input(INPUT_POST, 'quantity');
        }
      }
    }

  } else {
    $_SESSION['shopping_cart'][0] = array
    (
      'id' => filter_input(INPUT_GET, 'id'),
      'name' => filter_input(INPUT_POST, 'name'),
      'price' => filter_input(INPUT_POST, 'price'),
      'quantity' => filter_input(INPUT_POST, 'quantity')
    );
  }
}

if(filter_input(INPUT_GET, 'action') == 'delete') {
  // loop through all products in the shopping cart until it matches with GET id variable
  foreach($_SESSION['shopping_cart'] as $key => $row) {
    if ($row['id'] == filter_input(INPUT_GET, 'id')) {
      // remove product when match GET id
      unset($_SESSION['shopping_cart'][$key]);
    }
  }
  // reset session array key so they match with $product_ids numeric array
  $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
