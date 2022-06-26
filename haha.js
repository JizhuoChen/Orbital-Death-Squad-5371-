const box = document.querySelector(".box"); 
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const count = document.getElementById("count");
const floorr = document.getElementById("floorr");
const datee = document.getElementById("datee");
const time1 = document.getElementById("time1");
const time2 = document.getElementById("time2");
const dateSelect = document.getElementById("date");
const timeSelect = document.getElementById("time");
const floorSelect = document.getElementById("floor"); 
const PHAK = document.querySelector(".PHAK");
const FIND = document.querySelector(".find");

var parameter="test999";

$(function() {
    async:false;
    loc = location.href;//Get the entire content of the jump address (the entire address string)
    console.log("My address"+loc);
    var n1 = loc.length;//Total length of address
    var n2 = loc.lastIndexOf("?");//Get the position of the = sign
    parameter = decodeURI(loc.substr(n2+1, n1-n2));//Truncate from the ? which is the list of parameters
    //var parameters  = parameter.split("&");//Split from & to return an array of strings
    console.log(parameter);
    //var paValue = new Array();//Create an array to hold specific values
    //for (var i = 0; i < parameters.length; i++) {
    //var m1 = parameters[i].length;//Get the length of each key-value pair
    //var m2 = parameters[i].indexOf("=");//Get the position of each key-value pair = sign
    //var value = parameters[i].substr(m2+1, m1-m2);//Get the specific value after the = sign for each key-value pair
    //paValue[i] = value;
    //console.log("Parameter"+i+":"+value);
    //}
    //console.log("Array of specific parameters："+paValue);*/
});

var tenSeats = 120;
var seatSelected = 101;

check();

let pDate = +dateSelect.value;
let PpTime = +timeSelect.value;
let PpFloor = +floorSelect.value;
let PPPTime = PpTime.toString();

function myrefresh()
{
    window.location.reload();
}

function setDateData(dateIndex) {
    localStorage.setItem("selectedDateIndex", dateIndex);    
}

function setTimeData(timeIndex) {
    localStorage.setItem("selectedTimeIndex", timeIndex);    
}

function setFloorData(floorIndex) {
    localStorage.setItem("selectedFloorIndex", floorIndex);    
}

function update() {
    const selectedSeats = document.querySelectorAll(".row .seat.selected");
    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
    localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    floorr.innerText = PpFloor;
    let PpDate = pDate.toString();
    let ri = PpDate.substr(0,2);
    let yue = PpDate.substr(2,2);
    let nian = PpDate.substr(4,4);
    datee.innerText = ri+"/"+yue+"/"+nian;
    PpTime = +timeSelect.value;
    PPPTime = PpTime.toString();
    let ampm = "am";
    let ampmm = "am";
    let PpTimee = PpTime + 1;
    if (PpTime > 12) {
        PpTime = PpTime - 12;
        ampm = "pm";
    }
    else if (PpTime == 12) {
        ampm = "noon";
    }
    if (PpTimee > 12) {
        PpTimee = PpTimee - 12;
        ampmm = "pm";
    }
    else if (PpTimee == 12) {
        ampmm = "noon";
    }
    time1.innerText = PpTime + ampm;
    time2.innerText = PpTimee + ampmm;

    setDateData(dateSelect.selectedIndex);
    setTimeData(timeSelect.selectedIndex);
    setFloorData(floorSelect.selectedIndex);
}

function check() {
    const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
    
    if (selectedSeats !== null){
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add("selected");
            } 
        });
    }

    const selectedDateIndex = localStorage.getItem("selectedDateIndex");

    if (selectedDateIndex !== null){
        dateSelect.selectedIndex = selectedDateIndex;
        console.log(selectedDateIndex);
    }

    const selectedTimeIndex = localStorage.getItem("selectedTimeIndex");

    if (selectedTimeIndex !== null){
        timeSelect.selectedIndex = selectedTimeIndex;
        console.log(selectedTimeIndex);
    }

    const selectedFloorIndex = localStorage.getItem("selectedFloorIndex");

    if (selectedFloorIndex !== null){
        floorSelect.selectedIndex = selectedFloorIndex;
        console.log(selectedFloorIndex);
    }
}

dateSelect.addEventListener("change", e => {
    pDate = +e.target.value;
    setDateData(e.target.selectedIndex);
    update();
})

timeSelect.addEventListener("change", e => {
    PpTime = +e.target.value;
    setTimeData(e.target.selectedIndex);
    update();
})

floorSelect.addEventListener("change", e => {
    PpFloor = +e.target.value;
    setFloorData(e.target.selectedIndex);
    update();
})


box.addEventListener("click", (e) => {
    if (
      e.target.classList.contains("seat") && 
      !e.target.classList.contains("occupied") &&
      !e.target.classList.contains("selected") &&
      !e.target.classList.contains("myseat")
      ) {
            const selectedSeats = document.querySelectorAll(".row .seat.selected");
            if (selectedSeats.length > 0) {
               alert("You can only select 1 seat a time!");
            }
            else {
            e.target.classList.toggle("selected");
            seatSelected = e.target.getAttribute("value");
            console.log(seatSelected);
            update();
        }
    }
    else if (e.target.classList.contains("myseat")) {
        var cancelma = confirm("Do you want to cancel your booking?");
        if (cancelma == true) {
            e.target.classList.remove("myseat");
            e.target.classList.remove("selected");
            e.target.classList.remove("occupied");
            seatSelected = e.target.getAttribute("value");
            console.log(seatSelected);
            update();
            alert("Cancelling booking successful!");
            var ssed = Number(seatSelected) % 100;
            $.ajax({
                url:'cancelBooking.php',//Purpose php file
                async:false,
                data:{'seatSelected': ssed, 'date': pDate, 'time': PPPTime, 'floor': PpFloor, 'userID': parameter}, 
                type:'post',//The way data is transmitted post
                dataType:'json',//The format of the data transfer is json
                success:function(response){
                //Data is given to the back-end php file and successfully returned
                //console.log(response);//Print the returned value
                console.log(response);
                console.log("Succuessfully cancelled!");
                } ,
                error:function(response){
                //Error returned after data is given to the back end
                //console.log(response);//Print the returned value
                console.log(response);
                console.log("cancelcnm");
                }
            })
            seatSelected = 101;
        }
        else {
            alert("Failed to cancel booking!");
        }
    }
    else if (e.target.classList.contains("selected")) {
        e.target.classList.toggle("selected");
        seatSelected = 101;
        update();
    }
    else {
        alert("This seat has been selected!");
    }
});

FIND.addEventListener("click", (e) => {
    for (var cnt = 0; cnt < 100; cnt += 10) {
        $.ajax({
            url:'haha.php',//Purpose php file
            async:false,
            data:{'date': pDate, 'time': PPPTime, 'floor': PpFloor, 'cnt': cnt, 'userID': parameter}, //传输的数据 21082022 9 2 number
            type:'post',//The way data is transmitted post
            dataType:'json',//The format of the data transfer is json
            success:function(response){
            //Data is given to the back-end php file and successfully returned
            console.log(response);
            console.log(typeof(response));
            tenSeats = response;
            //deepCopy(obj1,obj2);
            //console.log(obj1.tenSeats);
            } ,
            error:function(response){
            //Error returned after data is given to the back end
            console.log(response);
            //console.log(typeof(this.responseText));
            //console.log(response);
            }
           })
        console.log(tenSeats);
        var ts = tenSeats.toString();
        console.log(ts);
        var cntt1 = cnt + 10;
        var cnt2 = 1;
        for (var cnt1 = cnt; cnt1 < cntt1; cnt1 += 1) {
            var sss = document.getElementsByName("sss")[cnt1];
            var ssss = sss.getAttribute("value");
            console.log(ssss);
            if (ts.charAt(cnt2) == '1') {
                sss.classList.remove("occupied");
                sss.classList.remove("selected");
                sss.classList.remove("myseat");
                sss.classList.toggle("occupied");
            }
            else if (ts.charAt(cnt2) == '2') {
                sss.classList.remove("selected");
                sss.classList.remove("occupied");
                sss.classList.remove("myseat");
                sss.classList.toggle("myseat");
            }
            else {
                sss.classList.remove("selected");
                sss.classList.remove("occupied");
                sss.classList.remove("myseat");
            }
            cnt2 += 1;
        }
        };
    //myrefresh();
   /* for (var cnt = 0; cnt < 100; cnt += 10) {
    $.ajax({
        url:'haha.php',//Purpose php file
        async:false,
        data:{'date': pDate, 'time': PPPTime, 'floor': PpFloor, 'cnt': cnt}, //传输的数据 21082022 9 2 number
        type:'post',//The way data is transmitted post
        dataType:'json',//The format of the data transfer is json
        success:function(response){
       //Data is given to the back-end php file and successfully returned
        console.log(response);
        console.log(typeof(response));
        tenSeats = response;
        //deepCopy(obj1,obj2);
        //console.log(obj1.tenSeats);
        } ,
        error:function(response){
       //Error returned after data is given to the back end
        console.log(response);
        //console.log(typeof(this.responseText));
        //console.log(response);
        }
       })
    console.log(tenSeats);
    var ts = tenSeats.toString();
    console.log(ts);
    var cntt1 = cnt + 10;
    var cnt2 = 1;
    for (var cnt1 = cnt; cnt1 < cntt1; cnt1 += 1) {
        var sss = document.getElementsByName("sss")[cnt1];
        var ssss = sss.getAttribute("value");
        console.log(ssss);
        if (ts.charAt(cnt2) == '1') {
            console.log("cnm");
            sss.classList.remove("occupied");
            sss.classList.remove("selected");
            sss.classList.toggle("occupied");
        }
        else {
            sss.classList.remove("selected");
            sss.classList.remove("occupied");////////////////////////////////////////////////////////////////
        }
        cnt2 += 1;
    }
    };*/
//const xmlhttp = new XMLHttpRequest();
//xmlhttp.onload = function() {
//const myObj = JSON.parse(this.responseText);
//document.getElementById("demo").innerHTML
//const obj = JSON.parse(text);
//console.log(myobj.employees[1].firstName + " " + obj.employees[1].lastName);
//}
//xmlhttp.open("GET", "haha.php");
//xmlhttp.send();
//var cnm = this.responseText;
//console.log(cnm);
//const xmlhttp = new XMLHttpRequest();
//xmlhttp.onload = function() {
 // const myObj = JSON.parse(this.responseText);
  //console.log(this.responseText);
  //document.getElementById("demo").innerHTML = myObj.name;
//}
//xmlhttp.open("GET", "haha.php");
//xmlhttp.send();
})



PHAK.addEventListener("click", (e) => {
    if (seatSelected <= 100) {
        alert("Booking successful!");
        var ssed = Number(seatSelected) % 100;
        console.log(ssed);
        var ssms = document.getElementsByName("sss")[ssed-1];
        ssms.classList.remove("selected");
        ssms.classList.add("myseat");
        $.ajax({
            url:'bookingSeatsConfirm.php',//Purpose php file
            async:false,
            data:{'seatSelected': ssed, 'date': pDate, 'time': PPPTime, 'floor': PpFloor, 'userID': parameter}, 
            type:'post',//The way data is transmitted post
            dataType:'json',//The format of the data transfer is json
            success:function(response){
            //Data is given to the back-end php file and successfully returned
            //console.log(response);//Print the returned value
            console.log(response);
            console.log("hao!");
            } ,
            error:function(response){
            //Error returned after data is given to the back end
            //console.log(response);//Print the returned value
            console.log(response);
            console.log("cnm");
            }
        })
    }
    else {
        alert("please select a seat!");
    }
})





/*function GetJson()

{

var xmlHttp;

try

{

// Firefox, Opera 8.0+, Safari

xmlHttp = new XMLHttpRequest();

}

catch (e)

{

// Internet Explorer

try {

xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch (e)

{

try {

xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

}

catch (e) {

alert("Your browser does not support AJAX!");

return false;

}

}

}

xmlHttp.onreadystatechange = function()

{

if (xmlHttp.readyState == 4)

{

//alert(xmlHttp.responseText);

var str = xmlHttp.responseText;

document.getElementById('show').innerHTML +=str;

//alert(str);

var obj = eval('('+ xmlHttp.responseText +')');

//var obj = eval(({"id":"123","name":"elar","age":"21"}));

alert(obj);

}

}

var data = "id=123";

xmlHttp.open("POST", "haha.php", true);

xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

xmlHttp.send("id=123");

}
*/

window.onload=function() {
    $(function() {
        async:false;
        loc = location.href;//Get the entire content of the jump address, which is actually the entire address string you passed in
        console.log("My address"+loc);
        var n1 = loc.length;//Total length of address
        var n2 = loc.lastIndexOf("?");//Get the position of the = sign
        parameter = decodeURI(loc.substr(n2+1, n1-n2));//Truncate from the ? which is the list of parameters
        //var parameters  = parameter.split("&");//Split from & to return an array of strings
        console.log(parameter);
        //var paValue = new Array();//Create an array to hold specific values
        //for (var i = 0; i < parameters.length; i++) {
        //console.log("Parameter key-value pair values"+i+":"+parameters[i]);
        //var m1 = parameters[i].length;//Get the length of each key-value pair
        //var m2 = parameters[i].indexOf("=");//Get the position of each key-value pair = sign
        //var value = parameters[i].substr(m2+1, m1-m2);//Get the specific value after the = sign for each key-value pair
        //paValue[i] = value;
        //console.log("Parameter"+i+":"+value);
        //}
        //console.log("Array of specific parameters："+paValue);
    });
    for (var cnt = 0; cnt < 100; cnt += 10) {
        $.ajax({
            url:'haha.php',//Purpose php file
            async:false,
            data:{'date': pDate, 'time': PPPTime, 'floor': PpFloor, 'cnt': cnt, 'userID': parameter}, //传输的数据 21082022 9 2 number
            type:'post',//The way data is transmitted post
            dataType:'json',//The format of the data transfer is json
            success:function(response){
            //Data is given to the back-end php file and successfully returned
            console.log(response);
            console.log(typeof(response));
            tenSeats = response;
            //deepCopy(obj1,obj2);
            //console.log(obj1.tenSeats);
            } ,
            error:function(response){
            //Error returned after data is given to the back end
            console.log(response);
            //console.log(typeof(this.responseText));
            //console.log(response);
            }
           })
        console.log(tenSeats);
        var ts = tenSeats.toString();
        console.log(ts);
        var cntt1 = cnt + 10;
        var cnt2 = 1;
        for (var cnt1 = cnt; cnt1 < cntt1; cnt1 += 1) {
            var sss = document.getElementsByName("sss")[cnt1];
            var ssss = sss.getAttribute("value");
            console.log(ssss);
            if (ts.charAt(cnt2) == '1') {
                sss.classList.remove("occupied");
                sss.classList.remove("selected");
                sss.classList.remove("myseat");
                sss.classList.toggle("occupied");
            }
            else if (ts.charAt(cnt2) == '2') {
                sss.classList.remove("selected");
                sss.classList.remove("occupied");
                sss.classList.remove("myseat");
                sss.classList.toggle("myseat");
            }
            else {
                sss.classList.remove("selected");
                sss.classList.remove("occupied");
                sss.classList.remove("myseat");
            }
            cnt2 += 1;
        }
        };
}

update();

    
