
function hr(){
    var hr=document.querySelectorAll('hr');
    for( var i=0; i<hr.length;++i){
        hr[i].style=" display : none;"
    }
}

function connexion(balise,i){
    balise.addEventListener("click",function(){
        var AffichageInput= document.querySelectorAll(".Input")[i];
        AffichageInput.style="display : block;"

        var div=document.querySelectorAll("div");
        for (var k=0; k<div.length;++k){
            if( k!=i){
                div[k].style="display : none;"
            }
        }
      hr();

    });
}

var typeUser=document.querySelectorAll("p");

connexion(typeUser[0],0);
connexion(typeUser[1],1);
connexion(typeUser[2],2)













