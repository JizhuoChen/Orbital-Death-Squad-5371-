<?php  
header('Content-Type: text/html; charset=utf-8');
$username1 = $_POST['username'];
$userPwd1 = $_POST['userPwd'];
$reuserPwd1 = $_POST['reuserPwd'];
//$code1 = $_POST['code'];
//database information：
$servername = "localhost";
$username = "root";
$password = "root";  
$dbname = "test";
//connect to database：
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection：
if ($conn->connect_error) {
die("Connection Fail: " . $conn->connect_error);
}
$searchName = "select * from user where username='$username1'";
$searchNameResult = $conn->query($searchName);
$row = $searchNameResult->fetch_row();
$sql="insert into user values(null,'".$username1."','".$userPwd1."','0','0','0','0','0','0','0','0')";
if ($username1 == "" or $userPwd1 == ""){
    echo '<script>alert"Username or Password cannot be empty");history.go(-1);</script>';
}
else if ($userPwd1 != $reuserPwd1){
    echo '<script>alert("Passwords entered are different");history.go(-1);</script>';
}
else if ($row > 0){
    echo '<script>alert("Username has been used, please enter a new one");history.go(-1);</script>';
}
else if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Successfully registered!");</script>';
    header("Refresh:0;url=index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
