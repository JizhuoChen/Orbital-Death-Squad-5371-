<?php 
$userID = $_SERVER["QUERY_STRING"];
//connect to database
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection：
if ($conn->connect_error) {
die("Connection Fail: " . $conn->connect_error);
echo "connection fail";
}

$sql = "select seatsID,floor,time,date from seatinfo where userID = '$userID' and date != 21082022";
$result = $conn->query($sql);
$info = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <title>My Activity</title>
    <style type="text/css">
       /*background-repeat: no-repeat;
        background-image: url(pic/centralL1.jpg);*/
        *{
            margin: 0px;
            padding: 0px;
        }
        .cl{
            clear: both;
        }
        body{
            font-size: 14px;
            font-family: "Microsoft YaHei","SimSun";
            /*height: 8888px;*/
        }
        .header{
            height: 70px;
            background-color: #191D3A;
        }
        .inner_c{
            width: 1000px;
            margin: 0 auto; /*Centering of navigation bars, content areas*/
        }
        .header .logo{
            height: 70px;
            float: left;
            margin-right: 40px;
        }
        .header .nav{
            float: left;
        }
        .header .nav ul{
            list-style: none; /*Remove the dot in front of the list*/
        }
        .header .nav ul li{
            float: left;
            width: 100px;
            line-height: 70px; /*Ensure that the text inside is vertically centred*/
            border-left: 1px solid #252947; /*Spaced lines between each li*/
        }
        .header .nav ul li.style{
            color:#818496;
        }
        .header .nav ul li.style:hover{
            color: white;
            background: #252947;
        }
        .header .nav ul li.last{
            border-right: 1px solid #252947;/*Add spacer to the right of the last li*/
        }
        .header .nav ul li a{
            display: block; /*Converting hyperlinks to blocks*/
            height: 70px;
            text-decoration: none; /*Remove underlining from hyperlinks*/
            color:#818496;
            text-align: center;  /*Centre this text*/
        }
        .header .nav ul li.current{
            color:white;
            background: #252947;
        }
        .header .nav ul li a:hover{
            color: white;
            background: #252947;
        }

        .header .jrwm_box{
            float: left;
            height: 70px;
            width: 100px;
            padding-left: 48px;
            /*padding-top: 12px;*/

        }
        .header .jrwm_box .jrwm{
            height: 34px;
            background-image: url(images/jrwm.png);
            background-repeat: no-repeat;
            text-align: center;
            padding-top: 18.2px;
            /*Centering hyperlinks*/
        }
        .header .jrwm_box .jrwm a{
            display: block; /*Converting hyperlinks to blocks*/
            line-height: 34px; /*Remove underlining from hyperlinks*/
            text-decoration: none; /*Remove underlining from hyperlinks*/
            color: white;
        }

        .banner{
            height:644px;
            background: url(pic/centralL1.jpg) no-repeat center top;
            background-attachment:scroll;
        }
        .content{
            padding-top: 50px;
        }
        .content .product{
            height: 229px;
            border-bottom: 1px solid #DBE1E7;
        }
        .content .product ul{
            list-style: none;
        }
        .content .product ul li{
            float: left;
            width: 218px;
            margin-right: 43px;
        }
        .content .product ul li.last{
            margin-right: 0;
            width: 217px;
        }
        .content .product ul li img{
            width: 218px;
            height: 130px;
        }
        .content .product ul li.last img{
            width: 217px;
        }

        .content .product ul li h3{
            text-align: center;
            line-height: 38px;
            font-size: 14px;
            font-weight: bold;
        }
        .content .product ul li p.djbf{
            text-align: center;
            line-height: 16px;
        }
        .content .product ul li p.djbf a{
            font-size: 12px;
            color:#38B774;
            text-decoration: none;
            background:url(images/sanjiaoxing.png) no-repeat right 5px;
            padding-right: 12px;
        }

.biaoti {
    padding-top: 30px;
    padding-left: 280px;
    font-size: 40px;
}

strong {
  font-weight: bold; 
}

em {
  font-style: italic; 
}

.Atable {
    padding-left: 360px;
    padding-top: 20px;
}

table {
  background: #f5f5f5;
  border-collapse: separate;
  box-shadow: inset 0 1px 0 #fff;
  font-size: 20px;
  line-height: 36px;
  text-align: left;
  width: 800px;
}

th {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
  border-left: 1px solid #555;
  border-right: 1px solid #777;
  border-top: 1px solid #555;
  border-bottom: 1px solid #333;
  box-shadow: inset 0 1px 0 #999;
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  position: relative;
  text-shadow: 0 1px 0 #000;  
}

th:after {
  background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
  content: '';
  display: block;
  height: 25%;
  left: 0;
  margin: 1px 0 0 0;
  position: absolute;
  top: 25%;
  width: 100%;
}

th:first-child {
  border-left: 1px solid #777;  
  box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
  box-shadow: inset -1px 1px 0 #999;
}

td {
  border-right: 1px solid #fff;
  border-left: 1px solid #e8e8e8;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 10px 15px;
  position: relative;
  transition: all 300ms;
}

td:first-child {
  box-shadow: inset 1px 0 0 #fff;
} 

td:last-child {
  border-right: 1px solid #e8e8e8;
  box-shadow: inset -1px 0 0 #fff;
} 

tr {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:nth-child(odd) td {
  background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:last-of-type td {
  box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
  box-shadow: inset 1px -1px 0 #fff;
} 

tr:last-of-type td:last-child {
  box-shadow: inset -1px -1px 0 #fff;
} 

tbody:hover td {
  color: transparent;
  text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
  color: #444;
  text-shadow: 0 1px 0 #fff;
}

.cancel {
    border-radius: 5px;
    background: -webkit-linear-gradient(top, #DD4B39, #D14836); 
    background: -moz-linear-gradient(top, #DD4B39, #D14836); 
    background: -ms-linear-gradient(top, #DD4B39, #D14836); 
    border: 1px solid #DD4B39;
    color: white;
    text-shadow: 0 1px 0 #C04131;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    cursor: pointer;
    padding: 2px 5px;
    margin-left:30px;
}

.cancel:hover {
    background: -webkit-linear-gradient(top, #DD4B39, #C53727);
    background: -moz-linear-gradient(top, #DD4B39, #C53727);
    background: -ms-linear-gradient(top, #DD4B39, #C53727);
    border: 1px solid #AF301F;
}

    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Seats</title>
    <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="inner_c">
            <div class="logo">
                <img src="pic/nuslogo1.png" alt="" height="70">
            </div>
            <div class="nav">
                <ul>
                    <li class="style" id="frontpage" style="cursor: pointer">Homepage</li>
                    <li class="style" id="booking" style="cursor: pointer">Booking seats</li>
                    <li class="style" id="insight" style="cursor: pointer">Seats insight</li>
                    <li class="current" id="activity" style="cursor: pointer">My Activity</li>
                    <li class="style" id="penalty" style="cursor: pointer">Penalty</li>
                    <li class="style" id="xxxx" style="cursor: pointer">xxxx</li>
                </ul>
            </div>
            <div class="jrwm_box">
                <div class="jrwm">
                    <a href="https://www.google.com/" target="_blank">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="cl"></div>
    <div class="banner">
        <div class="biaoti">
            <span class="biaotiSon">
                <b>Upcoming Activities:</b>
            </span>
        </div>
        <div class="Atable">
        <?php 
            if ($info == 0) {
        ?>
            <div>
            <span class="noActivity">You have no activity yet...</span>
            </div>
        <?php 
            } else {
        ?>
        <table>
        <thead>
            <tr>
            <th>No.</th>
            <th>Date</th>
            <th>Time</th>
            <th>Floor and Seat Number</th>
            <th>Cancellation</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $count = 1;
            for ($i = 0; $i < $info; $i += 1) {
                $roww = $result->fetch_array();
        ?>
            <tr>
            <td><strong><?php echo $count; ?></strong></td>
            <td><?php echo $roww[date]; ?></td>
            <td><?php echo $roww[time]; ?></td>
            <td><?php if ($roww[seatsID]%100 != 0) {echo 'level '.$roww[floor].'--seat number '.$roww[seatsID]%100;} else {echo 'level '.$roww[floor].'--seat number 100';} ?></td>
            <td><button class="cancel" name="<?php echo ($roww[seatsID]);?>">Cancel</button></td>
            </tr>
        <?php
            $count += 1;
            }
        ?>
        </tbody>
        
        </table>
        <?php
            }
        ?>
    </div>
    </div>
</body>
<script src="My Activity.js"></script>
</html>

<?php
    mysqli_close($con);
?>