<?php 
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
$date = $_POST['date'];
$time = $_POST['time'];   
$floor = $_POST['floor'];
$cnt = $_POST['cnt'];
$userID = $_POST['userID'];
//die(json_encode($array));
//Here the data is processed in php and returned to the front-end page with json_encode(), which converts the data into json form。

//connect to database：
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection：
if ($conn->connect_error) {
die("Connection Fail: " . $conn->connect_error);
}
if ($cnt == 90) {
$sql = "select selected, userID from seatinfo where floor = $floor and time = $time and date = $date and seatsID % 100 > $cnt and seatsID % 100 - 10 <= $cnt ";
$result = $conn->query($sql);
if ($result->num_rows == 9) {
    echo(4);
    while($row = $result->fetch_row()) {
        if($row[1] == $userID)
        {
            echo(2);
        }
        else
        {
            echo($row[0]);
        }
    }

}     
$sql = "select selected, userID from seatinfo where floor = $floor and time = $time and date = $date and seatsID % 100 = 0";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_row();  
    if($row[1] == $userID)
        {
            echo(2);
        }     
        else
        {
            echo($row[0]);
        }
}     
}

else {
    $sql = "select selected, userID from seatinfo where floor = $floor and time = $time and date = $date and seatsID % 100 > $cnt and seatsID % 100 - 10 <= $cnt";
    $result = $conn->query($sql);
    if ($result->num_rows == 10) {
        echo(4);
        while($row = $result->fetch_row()) {
            if($row[1] == $userID)
        {
            echo(2);
        }
        else
        {
            echo($row[0]);
        }
        }
    //for($cntt = 0; $cntt < 10; $cntt++)
    //{
    //    echo($row[$cnt]);
    //    $cnt = $cnt + 1;
    //}
    }     
}

//else {
    //echo "0 outcome";
//}

//$action=3;
//echo "var jstext='$action'"; //Output a JS statement that generates a JS variable and assigns an upside down value to the PHP variable $action
//echo "var jstext='aa'";
//echo "var jstext="."'$action'";

/*

$res['id'] = $_POST['id'];

$res['name'] = "elar";

$res['age'] = "21";

$response = "hello this is response".$_POST['id'];

echo json_encode($res);*/
$conn->close();
?>