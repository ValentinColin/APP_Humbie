<?php 
session_start();
include('../php_pur/function.php');
if_not_connected($redirection='loginPage.php');
?>


<?php echo 'Change picture';?>

<form type='post' action="photoChangement.php">
    <input type='submit' value='changerdephoto'>
</form>

<?php echo 'Change password' ;?>

<form type='post' action="confirmationUser.php">
    <input type='submit' name='password' value='change'>
</form>

<?php echo 'change mail'; ?>

<form type='post' action="confirmationUser.php">
    <input type='submit' name='mail' value='change'>
</form>


