function update() {
  var select = document.getElementById('product-list');
  var text = select.options[select.selectedIndex].text;

  if (text !== "Choose a product...") {
    document.getElementById('remove-drink-btn').removeAttribute("disabled", "");
  } else {
    document.getElementById('remove-drink-btn').setAttribute("disabled", "");
  }
}

function updateUpdateBtn() {
  var select = document.getElementById('product-update-list');
  var text = select.options[select.selectedIndex].text;

  if (text !== "Choose a product...") {
    document.getElementById('update-stock-btn').removeAttribute("disabled", "");
  } else {
    document.getElementById('update-stock-btn').setAttribute("disabled", "");
  }
}
