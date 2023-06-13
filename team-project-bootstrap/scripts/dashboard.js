$(document).ready(function() {

  var data1 = 'today';

  // Load product chart
  $.ajax({
    type: 'POST',
    url: 'php/chart-data.php',
    dataType: 'json',
    data: {date: data1},
    success: function(data) {
      var arr = data;
      var drink = [];
      var quantity = [];

      for (var i in arr) {
        drink.push(arr[i].drink_name);
        quantity.push(arr[i].quantity);
      };

      var chartdata = {
        labels: drink,
        datasets: [
          {
            label: 'Quantity',
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235)',
            borderWidth: 1,
            data: quantity
          }
        ]
      };

      var ctx = $('#myProductChart');

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 1
              }
            }]
          }
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });

  // Load price chart
  $.ajax({
    type: 'POST',
    url: 'php/product-cost-chart-data.php',
    dataType: 'json',
    data: {date: data1},
    success: function(data) {
      var arr = data;
      var drink = [];
      var total_costs = [];

      for (var i in arr) {
        drink.push(arr[i].name);
        total_costs.push(arr[i].total_costs);
      };

      console.log(drink);

      var chartdata = {
        labels: drink,
        datasets: [
          {
            label: 'Total Costs (£)',
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235)',
            borderWidth: 1,
            data: total_costs
          }
        ]
      };

      var ctx = $('#myPriceChart');

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 1
              }
            }]
          }
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });

});

//
// Functions for updating chart
//

// Function removes existing chart and replaces with new one based on select option
$('#product-dropdown').change(function() {
  var data1 = $('#product-dropdown').val();

  $('#myProductChart').remove();
  $('#product-canvas-area').append('<canvas class="my-4 w-100" id="myProductChart" width="900" height="200"></canvas>');

  updateProductChart(data1);
});

// Function removes existing chart and replaces with new one based on select option
$('#price-dropdown').change(function() {
  var data2 = $('#price-dropdown').val();

  $('#myPriceChart').remove();
  $('#price-canvas-area').append('<canvas class="my-4 w-100" id="myPriceChart" width="900" height="200"></canvas>');

  updatePriceChart(data2);
});

function updateProductChart(data1) {

  $.ajax({
    type: 'POST',
    url: 'php/chart-data.php',
    dataType: 'json',
    data: {date: data1},
    success: function(data) {
      var arr = data;
      var drink = [];
      var quantity = [];

      for (var i in arr) {
        drink.push(arr[i].drink_name);
        quantity.push(arr[i].quantity);
      };

      var chartdata = {
        labels: drink,
        datasets: [
          {
            label: 'Quantity',
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235)',
            borderWidth: 1,
            data: quantity
          }
        ]
      };

      var ctx = $('#myProductChart');

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 1
              }
            }]
          }
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });

}

function updatePriceChart(data2) {

  $.ajax({
    type: 'POST',
    url: 'php/product-cost-chart-data.php',
    dataType: 'json',
    data: {date: data2},
    success: function(data) {
      var arr = data;
      var drink = [];
      var total_costs = [];

      for (var i in arr) {
        drink.push(arr[i].name);
        total_costs.push(arr[i].total_costs);
      };

      var chartdata = {
        labels: drink,
        datasets: [
          {
            label: 'Total Costs (£)',
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235)',
            borderWidth: 1,
            data: total_costs
          }
        ]
      };

      var ctx = $('#myPriceChart');

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 1
              }
            }]
          }
        }
      });

      console.log(barGraph);

    },
    error: function(data) {
      console.log(data);
    }
  });

}
