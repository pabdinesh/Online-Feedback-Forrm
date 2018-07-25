<?php
error_reporting(E_ALL && E_PARSE);
$connection=mysqli_connect("localhost","root","","feedback_system");
session_start();
$_SESSION['dept'];
$_SESSION['rollno'];
$_SESSION['event_id'];
?>
<link rel="icon" href="logo.png" type="image/png">
<head>
<title> Online Event Management and Feedback System</title>
</head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">