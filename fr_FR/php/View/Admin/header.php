<header id="header-grid">
	<div id="cell-header-home" class="cell-header">
		<a href="home.php" title="HOME"><img class="icon" src="../../../../Images/icon-home.png"></a>
	</div>

	<div id="cell-header-search" class="cell-header">
		<form method="post"> <!-- L'action est définie dans l'input de type: image -->
			<div class="search">
				<input type="text" id="searchBar" placeholder="Barre de Recherche">
				<input type="image" id="loupe" class="icon" formaction="../../../../html/building.html" src="../../../../Images/icon-loupe.png">
			</div>
			<a id="RechercheAvancer" href="">Recherche avancée</a>
		</form>
	</div>

	<div id="cell-header-settings" class="cell-header">
		<a href="parametres.php" title="PARAMETRE">
			<img class="icon" src="../../../../Images/icon-settings.png">
		</a>
	</div>

	<div id="cell-header-profil" class="cell-header">
		<a href="profil.php" title="PROFIL">
			<div id="header-profil-grid">
				<div id="box-photo"><img id="photo_profil" class="icon" src=<?= path_photo() ?>></div>
				<span id="box-nom"><?= user_name() ?></span>
				<span id="box-deconexion">
					<form method="post" action="../../Controller/logout.php">
						<input type="submit" value="déconnexion">
					</form>
				</span>
			</div>
		</a>
	</div>
</header>





