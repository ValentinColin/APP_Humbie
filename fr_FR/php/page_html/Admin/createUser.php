<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="sqlCreateUser.php" method="post">
        <select name="role">
            <option value="User">Utilisateur</option> 
            <option value="Manager" selected>Manager</option>
            <option value="Admin">Admin</option>
        </select>
        <input type="text" name="Nom" placeholder="Nom" required>
        <input type="text" name="Prenom" placeholder="Prenom" required>
        <label for="Date de naissance"> Date de naissance </label>
        <input type="date" name="Datedenaissance" required>
        <input type="email" name="Mail" placeholder="mail" required>
        <label for="Datelicenceaviation"> Date de licence d'aviation </label>
        <input type="date" name="Datelicenceaviation" required>
        <input type="submit" value="Soumettre" required>
    </form>
</body>
</html>