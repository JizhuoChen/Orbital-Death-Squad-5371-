Date.prototype.format = function(fmt) { 
    var o = { 
    "M+" : this.getMonth()+1,                 //Month 
    "d+" : this.getDate(),                    //Day
    "h+" : this.getHours(),                   //Hour
    "m+" : this.getMinutes(),                 //Minute
    "s+" : this.getSeconds(),                 //second
    "q+" : Math.floor((this.getMonth()+3)/3), //Season
    "S" : this.getMilliseconds()             //millisecond 
    }; 
    if(/(y+)/.test(fmt)) {
    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
    }
    for(var k in o) {
    if(new RegExp("("+ k +")").test(fmt)){
    fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));
    }
    }
    return fmt; 
   }
const firstf = document.getElementById("firstf");
const secondf = document.getElementById("secondf");
const thirdf = document.getElementById("thirdf");
const fourthf = document.getElementById("fourthf");
var time_date_string = new Date().format("ddMMyyyy");
var time_date_number = parseInt(time_date_string);

var time_string_original = new Date().format("hh");
var time_number = parseInt(time_string_original);
var time_string = time_number.toString();
var numba;


function myrefresh()
{
       window.location.reload();
}
//setTimeout('myrefresh()',10000); //Specify a 10-second refresh

$.ajax({
    url:'Seats Insight.php',//purpose php file
    async:false,
    data:{'time_date_number': time_date_number, 'time_string': time_string}, //传输的数据 21082022 9 2 number
    type:'post',//Data transfer method post
    dataType:'json',//The format of the data transfer is json
    success:function(response){
    //Data is given to the back-end php file and successfully returned
    //console.log(response);//Print the returned value
    console.log(response);
    console.log("hao!");
    numba = response;
    } ,
    error:function(response){
    //Error returned after data is given to the back end
    //console.log(response);//Print the returned information
    console.log(response);
    console.log("cnm");
    numba = response;
    }
   })
console.log(numba);
console.log(typeof(numba));

   //判断
function display(number)
{
    if(number >= 50)
    {
        
    }
    else if( 20 <= number < 50)
    {

    }
    else
    {
        
    }

}

function determination()
{
    var fourth = numba % 1000;
    numba = (numba - fourth) / 1000;
    fourthf.innerText = (fourth);
    var third = numba % 1000;
    thirdf.innerText = (third);
    numba = (numba - third) / 1000;
    var second = numba % 1000;
    secondf.innerText = (second);
    numba = (numba - second) / 1000;
    var first = numba % 1000;
    firstf.innerText = (first);
}

determination();