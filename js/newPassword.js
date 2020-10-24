var newPsw=document.getElementById("mail");
var submit=document.getElementById("submit");
var errorDisplay=document.getElementById("errorDisplay");
var br =document.getElementById('br');


newPsw.addEventListener("blur",function(){
var verif=newPsw.value // Récupère la saisie d'utilisateur
if (verifMail(verif)){ // Vérifie si l'adresse mail est correctement l'écrit.
    errorDisplay.style.display='none'; // désactive le message qui s'affiche lorsque le mot de passe n'est pas correct.
    mail.style="border-bottom: 2px solid green;"
    unclickable.style.display='none';// n'affiche plus le texte
}
else{ // Si l'adresse n'est pas correct.
    errorDisplay.style.display='block'; // affiche le message d'erreur
    errorDisplay.style.color='yellow'; // couleur rouge
    errorDisplay.style.backgroundColor='rgba(0,0,0,0.1)'
    errorDisplay.style.textAlign='center'
    mail.style="border-bottom: 2px solid red;"
    br.style.display='inline';


}
})



submit.addEventListener("click",function(){
    if (!verifMail(newPsw.value)) // On vérifie si l'adresse mail est correctement saisi
        if(newPsw.value==''){// Si le champs est vide
            alert("Le champs de saisie est vide, \nVeillez saisir votre adresse mail.")

        }
        else {// sinon
            alert (newPsw.value.toUpperCase()+" : ne correspond pas à une adresse mail")
              // On remet le champs dans on etat initial.
              newPsw.value='';
        }
});

function verifMail(inputUser){ //fonction qui vérifie si le contenu du champs correspond bien à une adresse mail.
    return /^[a-z0-9.-_]+@[a-z0-9.-_]+(\.com|\.fr)$/i.test(inputUser);
    //la fonction retourne ou booleen
}


