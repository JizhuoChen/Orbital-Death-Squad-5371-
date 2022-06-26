<?php
$seatSelected = $_POST['seatSelected'];
$date = $_POST['date'];
$time = $_POST['time'];
$floor = $_POST['floor'];  
$userID = $_POST['userID'];
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
WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected and selected = 1 and userID != '0'");

mysqli_query($conn,"UPDATE seatinfo SET userID = '0'
WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected and userID != '0'");

echo("Booking is successfully canceled!");

mysqli_close($con);
?>