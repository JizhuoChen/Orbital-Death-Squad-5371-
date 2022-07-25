<?php
$seatsID = $_POST['seatsID'];
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection：
if ($conn->connect_error) {
die("Connection Fail: " . $conn->connect_error);
}

mysqli_query($conn,"UPDATE seatinfo SET selected = 0
WHERE seatsID = $seatsID and selected = 1 and userID != '0'");

mysqli_query($conn,"UPDATE seatinfo SET userID = '0'
WHERE seatsID = $seatsID and userID != '0'");

echo("Booking is successfully canceled!");

mysqli_close($con);
?>