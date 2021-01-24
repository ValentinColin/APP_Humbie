<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<header id="header-grid">
	<div id="cell-header-home" class="cell-header">
		<a href="home.php" title="HOME"><img class="icon" src="../../../../Images/icon-home.png"></a>
	</div>

	<div id="cell-header-search" class="cell-header">
		<form method="get" action="../../Controller/search_member_c.php/">
			<!-- L'action est définie dans l'input de type: image -->
			<div class="search">
				<select name="searchPeople" class="searchBar searchBar1">
					<option value='searchNom'> Rechercher par nom </option>
					<option value='searchPrenom' <?php if (isset($_SESSION['searchPrenom']) && $_SESSION['searchPrenom']) : ?> selected <?php endif; ?>>
						Recherche par prénom </option>
				</select>
				<input type='text' name="barreRecherche" class="searchBar searchBar2" placeholder="Barre de recherche">
				<input type="image" id="loupe" class="icon" src="../../../../Images/icon-loupe.png">
			</div>
			<ul id='showSearch' class='searchBar'>
			</ul>
		</form>
	</div>

	<div id="cell-header-profil" class="cell-header">
		<a href="../../Controller/profil.php" title="PROFIL">
			<div id="header-profil-grid">
				<div id="box-photo"><img id="photo_profil" class="icon" src=<?= path_photo() ?>></div>
				<span id="box-nom"><?= user_name() ?></span>
				<span id="box-deconnexion">
					<form method="post" action="../../Controller/logout.php">
						<input id="button-deconnexion" type="submit" value="déconnexion">
					</form>
				</span>
			</div>
		</a>
	</div>
</header>

<script src="../../../js/ajax_Search.js"> </script>

