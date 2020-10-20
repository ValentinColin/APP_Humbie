var newPsw=document.getElementById("mail");
var submit=document.getElementById("submit");
var errorDisplay=document.getElementById("errorDisplay");
submit.disabled=true; // Empêche de cliquer sur le bouton réinitialiser.


newPsw.addEventListener("keyup",function(){
var verif=newPsw.value // Récupère la saisie d'utilisateur
if (verifMail(verif)){ // Vérifie si l'adresse mail est correctement l'écrit.
    submit.disabled=false; // Le mouton réinitailiser est désormais cliquable
    errorDisplay.style.display='none'; // désactive le message qui s'affiche lorsque le mot de passe n'est pas correct.
    mail.style.border="ridge 2px green"
}
else{ // Si l'adresse n'est pas correct.
    submit.disabled=true; //voir ligne 4
    errorDisplay.style.display='block'; // affiche le message d'erreur
    errorDisplay.style.color='red'; // couleur rouge
    mail.style.border="ridge 2px red"
}
})

function verifMail(inputUser){ //fonction qui vérifie si le contenu du champs correspond bien à une adresse mail.
    return /^[a-z0-9.-_]+@[a-z0-9.-_]+(\.com|\.fr)$/i.test(inputUser);
    //la fonction retourne ou booleen
}

