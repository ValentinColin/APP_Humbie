
var mail=document.getElementById("input_mail");
var submit=document.getElementById("submit");
var errorDisplay=document.getElementById("errorDisplay");
var br =document.getElementById('br');






    mail.addEventListener("blur",function(){


        var verif=mail.value // Récupère la saisie d'utilisateur
        if (verifMail(verif)){ // Vérifie si l'adresse mail est correctement l'écrit.

            errorDisplay.style.display='none'; // désactive le message qui s'affiche lorsque le mot de passe n'est pas correct.
            br.style.display='none';
            mail.style="border-bottom: 2px solid green;"

        }
        else{ // Si l'adresse n'est pas correct.

            errorDisplay.style.display='block'; // affiche le message d'erreur
            errorDisplay.style.color='yellow'; // couleur rouge
            mail.style="border-bottom: 2px solid red;"
            errorDisplay.style.backgroundColor='rgba(0,0,0,0.1)'
            errorDisplay.style.textAlign="center"
            br.style.display='inline';

        }

        });




submit.addEventListener("click",function(){
    if (!verifMail(mail.value)) // On vérifie si l'adresse mail est correctement saisi
        if(mail.value==''){// Si le champs est vide
            alert("Le champs de saisie est vide, \nVeillez saisir votre adresse mail.")

        }
        else {// sinon
            alert (mail.value.toUpperCase()+" : ne correspond pas à une adresse mail")
              // On remet le champs dans on etat initial.
              mail.value='';
        }
});




function verifMail(inputUser){ //fonction qui vérifie si le contenu du champs correspond bien à une adresse mail.
    return /^[a-z0-9.-_]+@[a-z0-9.-_]+(\.com|\.fr)$/i.test(inputUser);
    //la fonction retourne ou booleen
}
