<form id='affinerRecherche' method='post' action='../../Controller/search_member_c.php/?search=AllMember'>
  <span span class="titreClassemement"> Sorted by role: </span> <br>
  yes <input name='triRole' type='radio' value='yes' <?php if ($_SESSION['triRole'] == "oui") : ?> checked='checked' title='sort already applicated' <?php endif ?>>
  no <input name='triRole' type='radio' value="no" <?php if ($_SESSION['triRole'] != "oui") : ?> checked='checked' title='sort already applicated' <?php endif ?>> <br>
  <span class="titreClassemement"> Sorted last names alphabetically :  </span> <br>
  <span> yes <span>
      <input name='ordre' type="radio" value="crescent" <?php if ($_SESSION['triOrdre'] != "decroissant") : ?> checked='checked' title='sort already applicated' <?php endif ?>>
      <span> no <span>
          <input name='ordre' type='radio' value='decrescent' <?php if ($_SESSION['triOrdre'] == "decroissant") : ?> checked='checked' title='sort already applicated' <?php endif ?>>
</form>