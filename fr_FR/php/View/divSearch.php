<form id='affinerRecherche' method='post' action='../../Controller/search_member_c.php/?search=AllMember'>
  <span span class="titreClassemement"> Classer par rôle: </span> <br>
  oui <input name='triRole' type='radio' value='oui' <?php if ($_SESSION['triRole'] == "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
  non <input name='triRole' type='radio' value="non" <?php if ($_SESSION['triRole'] != "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>> <br>
  <span class="titreClassemement"> Classer les noms par ordre alphabétique : </span> <br>
  <span> oui <span>
      <input name='ordre' type="radio" value="croissant" <?php if ($_SESSION['triOrdre'] != "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
      <span> non <span>
          <input name='ordre' type='radio' value='decroissant' <?php if ($_SESSION['triOrdre'] == "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
</form>