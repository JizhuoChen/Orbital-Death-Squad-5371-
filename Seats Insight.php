<?php
$time_date_number = $_POST['time_date_number'];
$time_string = $_POST['time_string']; 
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test"; 
$floor = 1;
//Split from & and return an array of strings
console.log(parameter);
/*$array = array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',);*/
$firstfloor = 0;
$secondfloor = 0;
$thirdfloor = 0;
$fourthfloor = 0;
$count = 0;

//connect to database：
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection：
if ($conn->connect_error) {
die("Connection Fail: " . $conn->connect_error);
}

echo(111);
$sql = "select selected from seatinfo where floor = 1 and time = '8' and date = 21082022";
$result = $conn->query($sql);
if ($result->num_rows == 100)
{
  while ($row = $result->fetch_row()) {
    if ($row[0] == 0) {
        $firstfloor += 1;
    } 
  }

 /* $array = $result;
  while($count <= 99)
  {
    if($array[$count] = '0')
    {
        $firstfloor += 1;
    }
    $count += 1;
  }*/
  if($firstfloor < 100 && $firstfloor >= 10)
  {
    echo(0);
    echo($firstfloor);
  }
  else if($firstfloor < 10)
  {
    echo(0);
    echo(0);
    echo($firstfloor);
  }
  else
  {
  echo($firstfloor);
  }
}

$count = 0;

$sql = "select selected from seatinfo where floor = 2 and time = '8' and date = 21082022";
$result = $conn->query($sql);
if ($result->num_rows == 100)
{
    while ($row = $result->fetch_row()) {
        if ($row[0] == 0) {
            $secondfloor += 1;
        } 
      }
  /*$array = $result;
  while($count <= 99)
  {
    if($array[$count] = '0')
    {
        $firstfloor += 1;
    }
    $count += 1;
  }*/
  if($secondfloor < 100 && $secondfloor >= 10)
  {
    echo(0);
    echo($secondfloor);
  }
  else if($firstfloor < 10)
  {
    echo(0);
    echo(0);
    echo($secondfloor);
  }
  else
  {
  echo($secondfloor);
  }
}

$count = 0;

$sql = "select selected from seatinfo where floor = 3 and time = '8' and date = 21082022";
$result = $conn->query($sql);
if ($result->num_rows == 100)
{
    while ($row = $result->fetch_row()) {
        if ($row[0] == 0) {
            $thirdfloor += 1;
        } 
      }
  /*$array = $result;
  while($count <= 99)
  {
    if($array[$count] = '0')
    {
        $firstfloor += 1;
    }
    $count += 1;
  }*/
  if($thirdfloor < 100 && $thirdfloor >= 10)
  {
    echo(0);
    echo($thirdfloor);
  }
  else if($thirdfloor < 10)
  {
    echo(0);
    echo(0);
    echo($thirdfloor);
  }
  else
  {
  echo($thirdfloor);
  }
}
$count = 0;

$sql = "select selected from seatinfo where floor = 4 and time = '8' and date = 21082022";
$result = $conn->query($sql);
if ($result->num_rows == 100)
{
    while ($row = $result->fetch_row()) {
        if ($row[0] == 0) {
            $fourthfloor += 1;
        } 
      }
  /*$array = $result;
  while($count <= 99)
  {
    if($array[$count] = '0')
    {
        $firstfloor += 1;
    }
    $count += 1;
  }*/
  if($fourthfloor < 100 && $fourthfloor >= 10)
  {
    echo(0);
    echo($fourthfloor);
  }
  else if($fourthfloor < 10)
  {
    echo(0);
    echo(0);
    echo($fourthfloor);
  }
  else
  {
  echo($fourthfloor);
  }
}

$conn->close();
?>