var role = document.getElementById("access");
var manager = document.getElementsByClassName("manager")
var input=document.querySelectorAll("form input");
manager[0].style.display = "none";
manager[1].style.display = "none";




role.addEventListener("click",function(){
    if (role.value == "User") {
        manager[0].style.display = "block";
        manager[1].style.display = "block";
    }else{
        manager[0].style.display = "none";
        manager[1].style.display = "none";

    }

})

for( var i=0;i<input.length-1;i++){
    input[i].required=true;
    if(input[i].id=="phoneNumber"){
        input[i].required=false;
        }
}

