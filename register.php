<!--
    - id
    - pseudo
    - email
    - mdp
    - adresse
    - code postal
    - ville
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

    <h1>Inscription</h1>

    <form action="./traitement.php?register" method="post">
        <div>
            <label for="username"></label>
            <input type="text" name="username" placeholder="Votre pseudo&hellip;" required>
        </div>

        <div>
            <label for="email"></label>
            <input type="email" name="email" placeholder="adresse@email.fr" required>
        </div>

        <div>
            <label for="password"></label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <div>
            <label for="address"></label>
            <input type="text" name="address" placeholder="2 rue Clémenceau">
        </div>

        <div>
            <label for="zip">Code postal</label>
            <input type="number" name="zip" min="00001" max="99999" placeholder="75000">
        </div>

        <div>
            <label for="city">Ville</label>
            <input type="text" name="city" placeholder="Paris">
        </div>

        <div>
            <input type="submit" value="inscription">
        </div>
    </form>
    
</body>
</html>