<header id="main_header">
	<ul>
		<li><a href="../html/building.html" title="Menu"><img class="icon" src="../Images/icon-burger-menu.png"></a></li>

		<li><a href="main.php" title="HOME"><img class="icon" src="../Images/icon-home.png"></a></li>

		<li><form method="post" action="">
				<span>
					<input type="search" name="search" placeholder="Recherche">
					<input type="submit" name="Searching button" value="search">
				</span><br>
				<a id="RechercheAvancer" href="">Recherche avancée</a>
			</form></li>

		<li><a href="parametres.php" title="PARAMETRE">
				<img class="icon" src="../Images/icon-settings.png">
			</a></li>

		<li><a href="profil.php" title="PROFIL">
			<div id="header-profil-grid">
				<div id="box-photo"><img id="photo_profil" class="icon" src=<?php echo path_photo() ?>></div>
				<span id="box-nom"><?php echo user_name() ?></span>
				<span id="box-deconexion">
					<form method="post" action="logout.php"><input type="submit" value="déconnexion"></form>
				</span>
			</div>
			</a></li>
	</ul>
</header>