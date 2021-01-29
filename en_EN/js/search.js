var sortRole = document.querySelectorAll("#affinerRecherche input");

function role(click) {
    sortRole[click].addEventListener('click', function () {
        document.forms["affinerRecherche"].submit();
    })
}

for (var k = 0; k < sortRole.length; k++) {
    role(k);
}

var ordre_alphabetique=document.querySelectorAll('#classement input');
if(ordre_alphabetique[0].title=="tri déjà effectif"){
    ordre_alphabetique[0].style.border="ridge 1px grey"
    ordre_alphabetique[0].style.fontSize="0.7em"
    ordre_alphabetique[0].style.border="black 1px ridge"
    ordre_alphabetique[1].style.cursor="pointer"

}
if(ordre_alphabetique[1].title=="tri déjà effectif"){
    ordre_alphabetique[1].style.border="ridge 1px grey"
    ordre_alphabetique[1].style.fontSize="0.7em"
    ordre_alphabetique[1].style.border="skyblue 2px ridge"
    ordre_alphabetique[0].style.cursor="pointer"
    ordre_alphabetique[1].style.color='grey'
}


