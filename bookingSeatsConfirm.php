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

$judge = 0; //judge = 0 can book;judge = 1 penalty;judge = 2 booking times up to the max;judge = 3 time crush

$sql = "select penalty,countt from user where username = '$userID'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$penalty = $row[0];
$count = $row[1];


$sql1 = "select selected from seatinfo where userID = '$userID' and time = $time and date = $date";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_row();

if ($penalty >= 3) {
    $judge = 1;
}
else if ($count >= 6) {
    $judge = 2;
}
else if($row1[0] != 0) {
    $judge = 3;
}

else {
$count = $count + 1;
mysqli_query($conn,"UPDATE seatinfo SET selected = 1 
    WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected");

mysqli_query($conn,"UPDATE seatinfo SET userID = '$userID'
    WHERE floor = $floor and time = $time and date = $date and seatsID % 100 = $seatSelected");

mysqli_query($conn,"UPDATE user SET countt = $count
    WHERE username = '$userID'");
}

/*if($count >= 0)
{
    $judge = 4;
}*/
echo($judge);

mysqli_close($con);
?>