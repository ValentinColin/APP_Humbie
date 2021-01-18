$(document).ready(function () {

    $(".searchBar2").keyup(function () {
        $.post(
            '../../Controller/ajaxSearch.php', // Un script PHP que l'on va créer juste après
            {
                ajax_type_search: $(".searchBar1").val(), // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                content: $(".searchBar2").val()
            },
            function (data) { // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
                //$('#resultats').html(JSON.stringify(data))
                data = JSON.parse(data)
                $("#showSearch").html('')
                for (var i in data) {
                    $("#showSearch").append("<a href='../../Controller/search_member_c.php/?prenom="+data[i][0] + "&nom=" + data[i][1] + "'> <li> " + data[i][0] + " " + data[i][1] + " </li> </a>")
                }
            },

            'html' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
        );
    });

});