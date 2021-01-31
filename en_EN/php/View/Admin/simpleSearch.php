<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Humbie</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/searchPage.css">
    <!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
    <link rel="script" type="text/css" href="../../../../js/drawGraph.js">
</head>

<body>
    <?php require('header.php'); ?>
	<?php require('nav.php') ?>
    <img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

    <main>
        <div id='search-page'>
            <h1 id="title">
                <?php if (count($_SESSION["search"]) == 0) : ?>
                    No results found
                <?php elseif (count($_SESSION["search"]) == 1) : ?>
                    1 result found
                <?php else : ?>
                    <?= count($_SESSION["search"]) ?> resultats founds
                <?php endif; ?>
            </h1>

            <?php if (!$_SESSION['noOne']) : ?>

                <table>
                    <tr id='trth'>
                        <th> First name </th>
                        <th> Last name </th>
                        <th> E-mail </th>
                        <th> Role</th>
                    </tr>

                    <?php for ($i = 0; $i < count($_SESSION['search']); $i++) : ?>
                        <tr>
                            <td> <?php print_r($_SESSION['search'][$i][0]); ?> </td>
                            <td> <?php print_r($_SESSION['search'][$i][1]); ?> </td>
                            <td> <a href="mailto:service.humbie@gmail.com" title="Contacter <?= $_SESSION['search'][$i][0] ?>  by mail"> <?php print_r($_SESSION['search'][$i][2]); ?> </a> </td>
                            <td> <?php print_r($_SESSION['search'][$i][3]); ?> </td>
                        <tr>
                        <?php endfor; ?>
                </table>
            <?php endif; ?>
        </div>
    </main>

    <span id="footer-position">
		<?php require('footer.php'); ?>
	</span>
</body>
<script src='../../../js/search.js'> </script>

<?php //$_SESSION['search']='';
?>

</html>