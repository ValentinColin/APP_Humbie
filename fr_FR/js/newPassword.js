var newPsw=document.getElementById("mail");// Pour recuperer l'adresse mail saisie
var submit=document.getElementById("submit");
var errorDisplay=document.getElementById("errorDisplay");// contient le msg d'erreur
var br =document.getElementById('br');


newPsw.addEventListener("blur",function(){
if(mail.value !=''){// le le champ est vide, on affiche pas de message
	var verif=newPsw.value // Récupère la saisie d'utilisateur
	if (verifMail(verif)){ // Vérifie si l'adresse mail est correctement l'écrit.
		errorDisplay.style.display='none'; // désactive le message qui s'affiche lorsque le mot de passe n'est pas correct.
		mail.style="border-bottom: 2px solid green;"
		unclickable.style.display='none';// n'affiche plus le texte
	}
	else{ // Si l'adresse n'est pas correct.
		errorDisplay.style.display='block'; // affiche le message d'erreur
		errorDisplay.style.color='yellow'; //
		errorDisplay.style.backgroundColor='rgba(0,0,0,0.1)'
		errorDisplay.style.textAlign='center'
		mail.style="border-bottom: 2px solid red;"
		br.style.display='inline';

	}
}
else{
	errorDisplay.style.display='none'
	mail.style="border-bottom: 2px solid black;"
}
})



submit.addEventListener("click",function(){
    if (!verifMail(newPsw.value)) // On vérifie si l'adresse mail est correctement saisi
        if(newPsw.value==''){// Si le champs est vide
            alert("Le champs de saisie est vide, \nVeillez saisir votre adresse mail." , "Adresse mail incorrecte")

        }
        else {// sinon
            alert (newPsw.value.toUpperCase()+" : ne correspond pas à une adresse mail","Adresse mail incorrecte")
              // On remet le champs dans son etat initial.
              newPsw.value='';
		}

});

function verifMail(inputUser){ //fonction qui vérifie si le contenu du champs correspond bien à une adresse mail.
    return /^[a-z0-9.-_]+@[a-z0-9.-_]+(\.com|\.fr)$/i.test(inputUser);
    //la fonction retourne ou booleen
}




// Reinmplémention de la fonction alert


/* La toute première chose est de modifier la fonction alert.
Ainsi, on appelera non plus la methode du navigateur
 mais une fonction personnalisée*/

window.alert = function(text, aname)/* text correspond au message à afficher et aname correspond
 au titre de la fenêtre( non obligatoire : windows alert âr défaut)*/
{
	// Creation de la boite
	var div = document.createElement("div");
	//Création button
	var button=document.createElement("input");
	button.setAttribute("type","button");
	button.setAttribute("value","OK");

	var box = document.body.appendChild(div);
	box.setAttribute("class", "alertBox");
	box.style.display = "none";




	// Creation titre
	var span = document.createElement("span");
	var title = box.appendChild(span);
	title.setAttribute("class", "alertTitle");

	// Bouton fermant
	var img = document.createElement("img");
	var close = box.appendChild(img);
	close.src = "../Images/close.png";
	close.width = 26;

		// Deux manière de fermer la fenêtre de l'alerte.
	// //en cliquant sur la croix en haut à gauche
	button.onclick= function() {
		document.body.removeChild(box);
	}
	// en cliquant sur le bouton OK
	close.onclick = function()
	{
		document.body.removeChild(box);
	}

	// Creation du contenu
	span = document.createElement("span");
	var content = box.appendChild(span);
	content.setAttribute("class", "alertContent");
	box.appendChild(button);

	// Insertion contenus
	if(typeof(aname) == "undefined")
		aname = "Alert window"
	title.innerHTML = aname;
	content.innerHTML = text;

	// Definition des style

	var width = 360; // largeur
	var height = [160, 480]; // hauteur [min, max]

	box.style.position = "absolute";
	box.style.zIndex = 9998;
	box.style.overflox = "hidden";
	box.style.left = "50%";
	box.style.top = "10%";
	box.style.width = width + "px";
	//box.style.minHeight = height[0] + "px";
    //box.style.maxHeight = height[1] + "px";
    box.style.height="min-content"; //encore moi
	box.style.marginLeft = -(width / 2) + "px";
	box.style.marginTop = -(box.offsetHeight / 2) + "px";
	box.style.border = "1px #000000 solid";
	box.style.backgroundColor = "#AFD4DB";
    box.style.fontFamily = "sans-serif";
    box.style.textAlign="center"
	// CSS3
	box.style.borderTopRadius = "15px";
	box.style.borderBottomRadius = "5px";
	box.style.MozBorderRadius = "10px";
	box.style.boxShadow = "2px 2px 5px mediumslateblue";
    box.style.MozBoxShadow = "20px 20px 12px #2CE4CA";


	close.style.position = "absolute";
	close.style.cursor = "pointer";
	close.style.zIndex = 9999;
	close.style.right = "2px";
	close.style.top = "2px";

	title.style.display = "block";
	title.style.width = "100%";
	title.style.height = "32px";
	title.style.lineHeight = "32px";
	title.style.textAlign = "center";
	title.style.backgroundColor = "#000000";
	title.style.color = "#D9D2D6";
    title.style.fontWeight = "bold";
    title.style.textShadow= "1px 1px 1px #2CE4CA";
	// CSS3
	box.style.borderRadius = "5px";
	box.style.MozBorderRadius = "5px";

	content.style.display = "block";
	//content.style.width = (width - 8) + "px";
 	//content.style.minHeight = (height[0] - 40) + "px";
    content.style.height="fit-content"; //c'est moi ca
	content.style.margin = "4px";
	content.style.fontSize = "16px";
	content.style.overflow = "wrap";

 	button.onmouseover=function(){
		button.style.border="#2CE4CA 2px ridge";
	 }
	 button.onmouseout=function(){
		button.style.border="mediumslateblue 2px ridge";
	 }
	button.style.backgroundColor="black";
	button.style.color="white";
	button.style.outline="none";


	// Affichage
	box.style.display = "block";

	/* Cette fonction recursive permet de replacer
	 la boite au centre meme si la fenetre est redimensionée*/
	replacement(box);
}

function replacement(boite)
{
	boite.style.marginTop = -(boite.offsetHeight / 2) + "px";
	setTimeout(function(){replacement(boite)}, 200);
}


