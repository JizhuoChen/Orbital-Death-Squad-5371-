
    const frontpage = document.getElementById("frontpage");
    const booking = document.getElementById("booking");
    const insight = document.getElementById("insight");
    const activity = document.getElementById("activity");
    const penalty = document.getElementById("penalty");
    const xxxx = document.getElementById("xxxx");
    var loc;
    $(function() {
        async:false;
        loc = location.href;//Get the entire content of the jump address (the entire address string)
        console.log("My adress"+loc);
        var n1 = loc.length;//Total length of address
        var n2 = loc.lastIndexOf("?");//Get the position of the = sign
        var parameter = decodeURI(loc.substr(n2+1, n1-n2));//Truncate from the ? which is the list of parameters
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
        //console.log("Array of specific parameters:"+paValue);*/ 
    });
    console.log(loc);
    
    booking.addEventListener ("click", (e) => {
        window.location.replace("Booking Seats.html?"+loc);
    })
    
    frontpage.addEventListener ("click", (e) => {
        window.location.replace("mainpage1.html?"+loc);
    })
    
    insight.addEventListener ("click", (e) => {
        window.location.replace("Seats Insight.html?"+loc);
    })
    
    activity.addEventListener ("click", (e) => {
        window.location.replace("My Activity.html?"+loc);
    })
    
    penalty.addEventListener ("click", (e) => {
        window.location.replace("Penalty.html?"+loc);
    })