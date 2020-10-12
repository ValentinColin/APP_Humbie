function hr(etatDisplay){
    function hr(){
        var hr=document.querySelectorAll('hr');
        for( var i=0; i<hr.length;++i){
            hr[i].style.display=etatDisplay;
            hr[i].style=" display : none;"
        }
    }

     function connexion(balise,i){
                    div[k].style="display : none;"

          hr("none");
          var retour=document.getElementById("retour");
          retour.style.display="block";

    });
          hr();
        });
    }


    var typeUser=document.querySelectorAll("h2");

    connexion(typeUser[0],0);
    connexion(typeUser[1],1);
    connexion(typeUser[2],2);

    var retour=document.getElementById("retour")
    retour.addEventListener("click",function(){
        var div=document.querySelectorAll("div");
        for (var k=0; k<div.length;++k){
                div[k].style="display : block;"
        }
        var affichageInput=document.getElementsByClassName("Input");
        for (var j=0; j<affichageInput.length;++j){
            affichageInput[j].style="display : none;"
    }
        hr("block");
        retour.style.display="none"
    })