/* Certains commentaire se trouve dans le fichier  : newPassword.js
(dont le contenu est quasiment identique à celui-ci )*/

var mail = document.getElementById("input_mail");
var submit = document.getElementById("submit");
var errorDisplay = document.getElementById("errorDisplay");
var br = document.getElementById('br');

mail.addEventListener("blur", function () {
	if (mail.value != '') { // le le champ est vide, on affiche pas de message
		var verif = mail.value // Récupère la saisie d'utilisateur
		if (verifMail(verif)) { // Vérifie si l'adresse mail est correctement l'écrit.
			errorDisplay.style.display = 'none';
			/* désactive le message qui s'affiche
			lorsque le mot de passe n'est pas correct.*/
			br.style.display = 'none';
			mail.style = "border: 2px solid green;"
			mail.style.backgroundColor = " transparent"
		} else { // Si l'adresse n'est pas correct.

			errorDisplay.style.display = 'block'; // affiche le message d'erreur
			errorDisplay.style.color = 'red'; // couleur rouge
			errorDisplay.style.fontWeight = 'bold'
			mail.style = "border: 2px solid red;"
			errorDisplay.style.textAlign = "center"
			br.style.display = 'inline';
		}
	} else {
		errorDisplay.style.display = 'none'
		mail.style = "border: 2px solid #3498db;"
	}
})




submit.addEventListener("click", function () {
	if (!verifMail(mail.value)) // On vérifie si l'adresse mail est correctement saisi
		if (mail.value == '') { // Si le champs est vide
			alert("The file is empty, \nplease type your mai adress.", "Invalid adress mail")
		}
	else { // sinon
		alert(mail.value.toUpperCase() + " : does not correspond to an email address", "Invalid adress mail")
		// On remet le champs dans on etat initial.
		mail.value = '';
	}
});




function verifMail(inputUser) { //fonction qui vérifie si le contenu du champs correspond bien à une adresse mail.
	return /^[a-z0-9.-_]+@[a-z0-9.-_]+(\.com|\.fr)$/i.test(inputUser);
	//la fonction retourne ou booleen
}






// Reinmplémention de la fonction alert


/* La toute première chose est de modifier la fonction alert.
Ainsi, on appelera non plus la methode du navigateur
mais une fonction personnalisée*/

window.alert = function (text, aname) {
	// Creation de la boite
	var div = document.createElement("div");
	//Création button
	var button = document.createElement("input");
	button.setAttribute("type", "button");
	button.setAttribute("value", "OK");
	button.setAttribute("id", "button");

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
	close.src = "../../Images/close.png";
	close.width = 26;

	button.onclick = function () {
		document.body.removeChild(box);
	}

	close.onclick = function () {
		document.body.removeChild(box);
	}

	// Creation du contenu
	span = document.createElement("span");
	var content = box.appendChild(span);
	content.setAttribute("class", "alertContent");
	box.appendChild(button);

	// Insertion contenus
	if (typeof (aname) == "undefined")
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
	box.style.height = "min-content"; //encore moi
	box.style.marginLeft = -(width / 2) + "px";
	box.style.marginTop = -(box.offsetHeight / 2) + "px";
	box.style.border = "1px #000000 solid";
	box.style.backgroundColor = "#AFD4DB";
	box.style.fontFamily = "sans-serif";
	box.style.textAlign = "center"
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
	title.style.textShadow = "1px 1px 1px #2CE4CA";
	// CSS3
	box.style.borderRadius = "5px";
	box.style.MozBorderRadius = "5px";

	content.style.display = "block";
	//content.style.width = (width - 8) + "px";
	//content.style.minHeight = (height[0] - 40) + "px";
	content.style.height = "fit-content"; //c'est moi ca
	content.style.margin = "4px";
	content.style.fontSize = "16px";
	content.style.overflow = "wrap";

	button.onmouseover = function () {
		button.style.border = "#2CE4CA 2px ridge";
	}
	button.onmouseout = function () {
		button.style.border = "mediumslateblue 2px ridge";
	}
	button.style.backgroundColor = "black";
	button.style.color = "white";
	button.style.outline = "none";


	// Affichage
	box.style.display = "block";

	/* Cette fonction recursive permet de replacer
	la boite au centre meme si la fenetre est redimensionée*/
	replacement(box);
}

function replacement(boite) {
	boite.style.marginTop = -(boite.offsetHeight / 2) + "px";
	setTimeout(function () {
		replacement(boite)
	}, 200);
}