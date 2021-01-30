<form id='affinerRecherche' method='post' action='../../Controller/search_member_c.php/?search=AllMember'>
  <span span class="titreClassemement"> Sorted by role: </span> <br>
  yes <input name='triRole' type='radio' value='oui' <?php if ($_SESSION['triRole'] == "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
  no <input name='triRole' type='radio' value="non" <?php if ($_SESSION['triRole'] != "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>> <br>
  <span class="titreClassemement"> Arranged alphabetically : </span> <br>
  <span> crescent <span>
      <input name='ordre' type="radio" value="croissant" <?php if ($_SESSION['triOrdre'] != "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
      <span> descending <span>
          <input name='ordre' type='radio' value='decroissant' <?php if ($_SESSION['triOrdre'] == "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
</form>