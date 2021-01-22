<?php
    include_once('session.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once('./templates/head.html');?>
    <title>Inscription</title>
</head>
<body>

    <h1>Inscription</h1>

    <form action="./traitement.php?register" method="post" class="form-w-66">
        <div>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" placeholder="Votre pseudo&hellip;" required>
        </div>

        <div>
            <label for="email">Courriel</label>
            <input type="email" name="email" placeholder="exemple@email.fr" required>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <div>
            <label for="address">Adresse</label>
            <input type="text" name="address" placeholder="2 rue Clémenceau">
        </div>

        <div>
            <label for="zip">Code postal</label>
            <input type="number" name="zip" min="1000" max="99999" placeholder="75000">
        </div>

        <div>
            <label for="city">Ville</label>
            <input type="text" name="city" placeholder="Paris">
        </div>

        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>

    <p><a href="./index.php">Retour à l'accueil.</a></p>
    
</body>
</html>