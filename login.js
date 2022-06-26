const getID = document.getElementById("submit");

getID.addEventListener("click", (e) => {
    $.ajax({
        url:'All.php',//Purpose php file
        async:false,
        data:{'hi': "hello world"}, 
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
})
