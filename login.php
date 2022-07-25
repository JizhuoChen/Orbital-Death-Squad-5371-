<?php 
header('Content-Type: text/html; charset=utf-8');
$username1 = $_POST['username'];
$userPwd = $_POST['userPwd'];
//database information:
$servername = "localhost"; 
$username = "root"; 
$password = "root";
$dbname = "test";
//connect to database:
$conn = new mysqli($servername,$username,$password,$dbname);
//check connection：
if ($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
//check with database：
$sql = "select userPwd from user where username='".$username1."'";
$allSql = "select * from user where username='".$username1."'";
$result = $conn->query($sql);
$allResult = $conn->query($allSql);
if ($username1 == "" or $userPwd == ""){
    echo '<script>alert("Username or password cannot be empty");history.go(-1);</script>';
}
else if($result->num_rows > 0){
    $row = $result->fetch_row();
    $db_userpwd = $row[0];
    if($db_userpwd==$userPwd && $username1=="admin"){
        header("location:http://localhost/phpMyAdmin/db_structure.php?server=1&db=test");
    }
    else if($db_userpwd==$userPwd){
        //echo 'Welcome'.$username1.'Login';
        //echo "<a href='homepage.php'>Continue</a>";
        header("location:homepage.php?$username1");
    }else{
        echo '<script>alert("Wrong username or password"); history.go(-1);</script>';
    }
}else {
    echo '<script>alert("Username does not exist"); history.go(-1);</script>';
}
$conn->close();
?>
