<?php
session_start();
include('../../Controller/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = '../../View/login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Humbie</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/searchPage.css">
    <!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
    <link rel="script" type="text/css" href="../../../../js/drawGraph.js">
</head>

<body>
    <?php require('header.php'); ?>
    <main>
        <div id="box-nav" class="my-block">
            <?php require('nav.php') ?>
        </div>

        <div id='search-page'>
        <p id='upload'> <button id='button-upload'  type="button"> Download the table in Excel format</button>
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
                    <path d="M6 12v-2h3v2H6z" />
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z" />
                </svg> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                </svg>
            </p>
            <h1> The managers </h1>



            <div id='classement'>
                <span> put the names in order: <span>
                        <a href="../../Controller/search_member_c.php/?search=AllManager">
                            <input type='button' value='croissant' <?php if (!$_SESSION['decroissant']) : ?> disabled title='tri déjà effectif' <?php endif ?>>
                        </a>
                        <a href="../../Controller/search_member_c.php/?search=AllManager&classement=decroissant">
                            <input type='button' value='décroissant' <?php if ($_SESSION['decroissant']) : ?> disabled title='tri déjà effectif' <?php endif ?>>
                        </a>
            </div>

            <table id='table'>
                <tr>
                    <th> Last name </th>
                    <th> First name </th>
                </tr>
                <?php for ($i = 0; $i < count($_SESSION['search']); $i++) : ?>
                    <tr>
                        <td> <?php print_r($_SESSION['search'][$i][1]); ?> </td>
                        <td> <?php print_r($_SESSION['search'][$i][0]); ?> </td>
                    <tr>
                    <?php endfor; ?>
            </table>

        </div>
    </main>
    <?php require('footer.php'); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../../convert/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="../../../../convert/libs/js-xlsx/xlsx.core.min.js"></script>
<script type="text/javascript" src="../../../../convert/tableExport.min.js"></script>
<script src='../../../js/t.js'> </script>
<?php //$_SESSION['search']='';
?>

</html>