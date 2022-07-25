const frontpage = document.getElementById("frontpage");
const booking = document.getElementById("booking");
const insight = document.getElementById("insight");
const activity = document.getElementById("activity");
const penalty = document.getElementById("penalty");
const xxxx = document.getElementById("xxxx");
var loc;
var parameter;

console.log(frontpage);
$(function() {
    async:false;
    loc = location.href;//Get the entire content of the jump address (the entire address string)
    console.log("My address"+loc);
    var n1 = loc.length;//Total length of address
    var n2 = loc.lastIndexOf("?");//    var n2 = loc.lastIndexOf("?");//Get the position of the = sign

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
    //console.log("Parameter value"+i+":"+value);
    //}
    //console.log("Array of specific parameters："+paValue);*/ 
});
    //const userDEid = getParam('userDEid');
    //alert(userDEid);

console.log(loc);

booking.addEventListener ("click", (e) => {
    window.location.replace("Booking Seats.html?"+parameter);
})

frontpage.addEventListener ("click", (e) => {
    window.location.replace("homepage.php?"+parameter);
})

insight.addEventListener ("click", (e) => {
    window.location.replace("Seats Insight.html?"+parameter);
})

activity.addEventListener ("click", (e) => {
    window.location.replace("myAphp.php?"+parameter);
})

penalty.addEventListener ("click", (e) => {
    window.location.replace("penalty1.php?"+parameter);
})

var cancels = document.querySelectorAll('.cancel');

cancels.forEach(cancel => {
cancel.addEventListener("click", (e) => {
    var whichSeat = e.target.getAttribute("name");
    console.log(whichSeat);
    var cancelma = confirm("Do you want to cancel your booking?");
    if (cancelma == true) {
        alert("Cancelling booking successful!");
        //var whichSeat = e.target.getAttribute("name");
        //console.log(whichSeat);
        $.ajax({
            url:'my Activity.php',//Purpose php file
            async:false,
            data:{'seatsID': whichSeat}, //传输的数据
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
        window.location.reload();
    }
    else {
        alert("Failed to cancel booking!");
    }
})
})