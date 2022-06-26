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

mysqli_query($conn,"UPDATE seatinfo SET selected = 1 
WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected");

mysqli_query($conn,"UPDATE seatinfo SET userID = '$userID'
WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected");

echo("Booking is successful!");

mysqli_close($con);
?>