var affichageMembre=document.getElementsByClassName("membre")[0];
var affichagegest=document.getElementsByClassName("gest")[0];
var affichageAdmin=document.getElementsByClassName("admin")[0];

var div=document.querySelectorAll("div");
var hr=document.querySelectorAll('hr')



affichageMembre.addEventListener("click",function(){
var affichageInput=document.getElementsByClassName("membreco")[0];
affichageInput.style="display :inline"
div[1].style="display:none;"
div[2].style="display : none;"
document.getElementsByClassName("valider")[0].style="display : inline;"

//alert(hr.length)
for( var i=0; i<hr.length;++i){
    hr[i].style=" display : none;"
}


})

affichagegest.addEventListener("click",function(){
    var affichageInput2=document.getElementsByClassName("gestionnaire")[0];
    affichageInput2.style="display :inline;"
    })

affichageAdmin.addEventListener("click",function(){
    var affichageInput3=document.getElementsByClassName("Ad")[0];
    affichageInput3.style="display :inline;"
    })



