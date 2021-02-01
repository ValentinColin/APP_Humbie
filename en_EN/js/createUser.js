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