<?php
session_start();
if(!$_SESSION['connected']){
    header('Location: maquette.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/header.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/footer.css"> -->
</head>
<header>
    <!-- En-tête -->
    <?php 
	echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>';
	echo '<p>Bienvenue sur le site web de Humbie ©.<br>Vous êtes actuellement sur la page principale.</p>';
	?>
    <form method='post' action='logout.php'>
        <input type='submit' value='déconnexion'>
    </form>
</header>
<nav>
	<!-- Navigation (ie. Menu) -->
	<ul id="navigation">
		<li><a href="#" title="aller à la section 1 (en cours de construction)">section 1 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 2 (en cours de construction)">section 2 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 3 (en cours de construction)">section 3 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 4 (en cours de construction)">section 4 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 5 (en cours de construction)">section 5 (en cours de construction)</a></li>
	</ul>
</nav>
<body>
	<!-- Corps -->
</body>
<footer>
	<!-- Pied de page -->
</footer>
</html>