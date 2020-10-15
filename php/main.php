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

</header>
<nav>
	<!-- Navigation (ie. Menu) -->
	<nav>
		<ul id="navbar">
			<li><a href="#" title="navbar_HOME">Home</a></li>
			<li><a href="#" title="navbar_PROFIL">Profil</a></li>
			<li><a href="#" title="navbar_MENU">Menu</a></li>
			<li><a href="#" title="navbar_PARAMETRE">Paramètres</a></li>
			
			<li><div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div></li>
		
		</ul>

	</nav>

	<ul id="navigation">
		<li><a href="#" title="aller à la section 1 (en cours de construction)">section 1 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 2 (en cours de construction)">section 2 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 3 (en cours de construction)">section 3 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 4 (en cours de construction)">section 4 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 5 (en cours de construction)">section 5 (en cours de construction)</a></li>
	</ul>

	<?php 
	
	echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>';
	echo '<p>Bienvenue sur le site web de Humbie ©.<br>Vous êtes actuellement sur la page principale.</p>';
	?>
    <form method='post' action='logout.php'>
        <input type='submit' value='déconnexion'>
    </form>
</nav>
<body>
	<!-- Corps -->
</body>
<footer>
	<!-- Pied de page -->
</footer>
</html>