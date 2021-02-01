<?php
session_start();
?>

<!DOCTYPE html>
</html>

<head>
    <meta charset="UTF-8">
    <title> Password reset </title>
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <link rel="stylesheet" href="../../../css/newPassword.css">

</head>

<body>
    <center>
    <header>
        <h1>Reset page</h1>
        <!-- <img id="compagnyLogo"src="../Images/Infini_Measures.png" alt=""> -->
    </header>

    <main>
        <form method="post" action="../Controller/newPassword.php">
            <fieldset >
                <legend>Password reset</legend>

                <a class='backLoginPage' href='loginPage.php' title="Retouner à la page de connexion"> <<< </a>
                <p class="input">
                <span id="errorDisplay"> Incorrect email address </span>
                    <br id='br'>
                    Adresse mail  :  <input id="mail" type="mail" name="mail"  placeholder="write here" required><br>
                </p>
                <hr>
                <input id='submit' type='submit' value='Submit'>
            </fieldset>
        </form>
    </main>
    </center>


</body>
<script src="../../js/newPassword.js"></script>

</html>