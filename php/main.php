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
</head>
<header>
    <!-- En-tête -->
</header>
<nav>
	<!-- Navigation (ie. Menu) -->
</nav>
<body>
	<!-- Corps -->
	<?php 
	echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>';
	echo '<p>Bienvenue sur le site web de Humbie ©. Vous êtes actuellement sur la page principale.</p>';
	?>
    <form method='post' action='logout.php'>
        <input type='submit' value='déconnexion'>
    </form>
</body>
<footer>
	<!-- Pied de page -->
</footer>
</html>