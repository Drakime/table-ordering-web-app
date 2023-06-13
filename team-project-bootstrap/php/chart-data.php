<?php
header('Content-Type: application/json');
include 'connection.php';

date_default_timezone_set('Europe/London');
$time_period = $_POST['date'];

if ($time_period == "today") {
    $date = "%" . date('Y-m-d') . "%";
    $status = "complete";

    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE created_at LIKE ? AND status = ?;");
    mysqli_stmt_bind_param($stmt, "ss", $date, $status);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }

    $groups = array();
    foreach ($data as $item) {
      $key = $item['drink_name'];
      if (!array_key_exists($key, $groups)) {
        $groups[$key] = array(
          'drink_name' => $item['drink_name'],
          'quantity' => $item['quantity'],
        );
      } else {
        $groups[$key]['quantity'] = $groups[$key]['quantity'] + $item['quantity'];
      }
    }

    print json_encode($groups);
}

if ($time_period == "week") {
    $monday = strtotime('last monday', strtotime('tomorrow'));
    $sunday = strtotime('+6 days', $monday);

    $start_date = date('Y-m-d', $monday) . " 00:00:00";
    $end_date = date('Y-m-d', $sunday) . " 23:59:59";
    $status = "complete";

    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE created_at BETWEEN ? AND ? AND status = ?;");
    mysqli_stmt_bind_param($stmt, "sss", $start_date, $end_date, $status);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }

    $groups = array();
    foreach ($data as $item) {
      $key = $item['drink_name'];
      if (!array_key_exists($key, $groups)) {
        $groups[$key] = array(
          'drink_name' => $item['drink_name'],
          'quantity' => $item['quantity'],
        );
      } else {
        $groups[$key]['quantity'] = $groups[$key]['quantity'] + $item['quantity'];
      }
    }

    print json_encode($groups);

}

if ($time_period == "month") {
    $first_day = date('Y-m-01');
    $last_day = date('Y-m-t');

    $start_date = $first_day . " 00:00:00";
    $end_date = $last_day . " 23:59:59";
    $status = "complete";

    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE created_at BETWEEN ? AND ? AND status = ?;");
    mysqli_stmt_bind_param($stmt, "sss", $start_date, $end_date, $status);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }

    $groups = array();
    foreach ($data as $item) {
      $key = $item['drink_name'];
      if (!array_key_exists($key, $groups)) {
        $groups[$key] = array(
          'drink_name' => $item['drink_name'],
          'quantity' => $item['quantity'],
        );
      } else {
        $groups[$key]['quantity'] = $groups[$key]['quantity'] + $item['quantity'];
      }
    }

    print json_encode($groups);
}

if ($time_period == "year") {
    $first_day_of_year = date('Y-m-d', strtotime('first day of january this year'));
    $last_day_of_year = date('Y-m-d', strtotime('last day of december this year'));

    $start_date = $first_day_of_year . " 00:00:00";
    $end_date = $last_day_of_year . " 23:59:59";
    $status = "complete";

    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE created_at BETWEEN ? AND ? AND status = ?;");
    mysqli_stmt_bind_param($stmt, "sss", $start_date, $end_date, $status);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }

    $groups = array();
    foreach ($data as $item) {
      $key = $item['drink_name'];
      if (!array_key_exists($key, $groups)) {
        $groups[$key] = array(
          'drink_name' => $item['drink_name'],
          'quantity' => $item['quantity'],
        );
      } else {
        $groups[$key]['quantity'] = $groups[$key]['quantity'] + $item['quantity'];
      }
    }

    print json_encode($groups);
}

?>
