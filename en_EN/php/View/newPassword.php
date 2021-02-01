<?php
if(!(isset($_SESSION['access']) && isset($_SESSION['mail']) &&$_SESSION['access'] = $_SESSION['mail'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <link rel="stylesheet" href="../../../css/newPassword.css">

</head>
<body>
    <main>
        <form method="post" action="../Controller/newPassword.php">
            <fieldset >
                <legend>Enter your new password.</legend>

                <a class='backLoginPage' href='loginPage.php' title="Return to the login page"> <<< </a>
                <p class="input">
                <span id="errorDisplay"> Incorrect email address </span>
                    <br id='br'>
                      <input id='mail' type="password" placeholder="new password" name="newpassword"><br>
                    <br id='br'>
                      <input id='mail'  type="password" placeholder="repeat your password" name="repeatpassword"><br>
                </p>
                <hr>
                <input id='submit' type="submit" value="change your password">
            </fieldset>
        </form>
    </main> 
</body>
</html>

