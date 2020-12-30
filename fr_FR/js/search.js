var sortRole = document.querySelectorAll("#affinerRecherche input");

function role(click) {
    sortRole[click].addEventListener('click', function () {
        document.forms["affinerRecherche"].submit();
    })
}

for (var k = 0; k < sortRole.length; k++) {
    role(k);
}