<form id='affinerRecherche' method='post' action='../../Controller/search_member_c.php/?search=AllMember'>
  <span span class="titreClassemement"> Sorted by role: </span> <br>
  yes <input name='triRole' type='radio' value='oui' <?php if ($_SESSION['triRole'] == "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
  no <input name='triRole' type='radio' value="non" <?php if ($_SESSION['triRole'] != "oui") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>> <br>
  <span class="titreClassemement"> Sorted by alphabetic order : </span> <br>
  <span> increasing <span>
      <input name='ordre' type="radio" value="croissant" <?php if ($_SESSION['triOrdre'] != "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
      <span> decreasing <span>
        <input name='ordre' type='radio' value='decroissant' <?php if ($_SESSION['triOrdre'] == "decroissant") : ?> checked='checked' title='tri déjà effectif' <?php endif ?>>
</form>