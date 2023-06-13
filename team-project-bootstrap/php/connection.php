<?php
// Set up the database access credentials
$db_hostname = 'localhost';   // stu-db.aet.leedsbeckett.ac.uk
$db_username = 'root'; // your standard uni id
$db_password = ''; // the password found on the W: drive
$database = 'funkybar'; // your standard uni id

// Create connection
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
