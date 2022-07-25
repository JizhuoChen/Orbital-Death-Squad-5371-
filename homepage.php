<?php
    header('Content-Type: text/html; charset=utf-8');
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
    $sql = "select anno,anno1,anno2,anno3,anno4 from user where username = 'admin'";
    $result = $conn->query($sql);
    $var = $result->fetch_row();
?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
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

        .header .nav ul li div:hover{
            color: white;
            background: #252947;
        }

        .header .jrwm_box{
            float: left;
            height: 70px;
            width: 100px;
            padding-left: 48px;
            padding-bottom: 18px;

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

        .bar{
            height: 10px;
            width: 100%;
            background-color: gray;
        }

        .banner{
            height: 400px;
            background: url(pic/cent.jpg) no-repeat center top;
        }

        .popLayer{
            position:absolute;
            left:0;
            top:0;
            /*z-index:50;*/
            background:#DCDBDC;
            -moz-opacity: 0.8;
            opacity:.80;
            width: 100%;
            height: 100%;
            display: block;
            position: fixed;
        }
        
        .announce {
            position: fixed;
            padding-top: 10px;
            top: 160px;
            left: 570px;
            height: 370px;
            width: 370px;
            /*z-index:100;*/
        }

        .announce span {
            display: block;	
            text-decoration: none;		
            color: #333;			
            background-color: antiquewhite; 
            border: 2px solid rgba(165, 42, 42, 0.516);
            padding: 10px 20px;		
            border-radius: 5px;		
            letter-spacing: 2px;
        }

        .close {
            margin-left: 307px;
            height: 30px;
            width: 30px;
            background-color: red;
            font-size: 24px;
            color: black;
            cursor: pointer;
            border-radius: 5px;		
        }

        .close b {
            padding-left:7px;
        }

        .xiaoshi {
            display: none;
        }

        .content{
            padding-top: 25px;
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
    </style>
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
                    <li class="current" id="frontpage" style="cursor: pointer">Homepage</li>
                    <li class="style" id="booking" style="cursor: pointer">Booking seats</li>
                    <li class="style" id="insight" style="cursor: pointer">Seats insight</li>
                    <li class="style" id="activity" style="cursor: pointer">My Activity</li>
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
    <div class="bar"></div>
    <div class="cl"></div>
    
    <div class="popLayer"></div>
    <div class="announce">
        <span class="announce1">
            <div class="close"><b>X</b></div>
            Dear students and staff, welcome to use this website to reserve a seat in the library
            The following are details of the booking rules for this reservation system:<br>
            <?php echo ($var[0]); ?> <br>
            <?php echo ($var[1]); ?> <br>
            <?php echo ($var[2]); ?> <br>
            <?php echo ($var[3]); ?> <br>
            <?php echo ($var[4]); ?>
        </span>
    </div>

    <div class="banner"></div>

    <Vedio Category>
    <div class="content inner_c">
        <div class="product">
            <ul>
                <li>
                    <p><img src="pic/1.png" alt="" /></p>
                    <h3>Central Library Intro</h3>
                    <p class="djbf">
                        <a href="https://www.youtube.com/watch?v=73hubqAvMY8">ClickToPlay</a>
                    </p>
                </li>
                <li>
                    <p><img src="pic/2.png" alt="" /></p>
                    <h3>Central Library Study Vlog</h3>
                    <p class="djbf">
                        <a href="https://www.youtube.com/watch?v=od1iFmIhMRc">ClickToPlay</a>
                    </p>
                </li>
                <li>
                    <p><img src="pic/3.png" alt="" /></p>
                    <h3>NUS Library Photo Contest</h3>
                    <p class="djbf">
                        <a href="https://www.youtube.com/watch?v=FBqFKROqOnA">ClickToPlay</a>
                    </p>
                </li>
                <li class="last">
                    <p><img src="pic/4.png" alt="" /></p>
                    <h3>How Librarians Select Books</h3>
                    <p class="djbf">
                        <a href="https://www.youtube.com/watch?v=nhsQ7PKZCvQ">ClickToPlay</a>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</body>
<script src="homepage.js"></script>
</html>
<!--
<script>
   
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    var userID = getParameterByName('userDEid','location.href'); // "16047"
   // alert(userID);
</script> -->

...
<?php
$conn->close();
?>