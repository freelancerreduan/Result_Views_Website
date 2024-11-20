<?php
$host = 'localhost';
$username = 'root';
$password = '';  // Your MySQL password
$database = 'student_result';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
