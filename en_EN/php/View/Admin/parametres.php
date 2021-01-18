<?php
session_start();
include('../../php_pur/function.php');
if_not_connected($redirection = 'loginPage.php');
?>


<?php echo 'change picture'; ?>

<form type='post' action="photoChangement.php">
    <input type='submit' value='changerdephoto'>
</form>

<?php echo 'change password'; ?>

<form type='post' action="confirmationUser.php">
    <input type='submit' name='password' value='changer'>
</form>

<?php echo 'change Email'; ?>

<form type='post' action="confirmationUser.php">
    <input type='submit' name='mail' value='changer'>
</form>