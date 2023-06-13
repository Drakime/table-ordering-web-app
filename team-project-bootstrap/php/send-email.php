<?php
if (isset($_POST['submit'])) {
  $fullName = $_POST['name-input'];
  $email = $_POST['email-input'];
  $subject = $_POST['subject-input'];
  $message = $_POST['message'];

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "From: $email" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $message = "<html>
  <head>
    <title>New message from website contact form</title>
  </head>
  <body>
    <h1>" . $subject . "</h1>
    <p>".$message."</p>
  </body>
  </html>";

  if (mail('h.diep2322@student.leedsbeckett.ac.uk', $subject, $message, $headers)) {
    echo "Email sent";
  } else {
    echo "Failed to send email. Please try again later";
  }
}
