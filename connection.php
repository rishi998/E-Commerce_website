<?php
session_start();
$server = 'localhost';
$user = 'root';
$pass = '';
$conn = mysqli_connect($server, $user, $pass) or die(mysqli_connect_error());
$db = mysqli_select_db($conn, 'ecom_prjt') or die(mysqli_connect_error());
?>