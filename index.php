<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once('./templates/head.html') ?>
    <title>Connexion</title>
</head>
<body>

    <h1>Connexion</h1>

    <form action="traitement.php?connect" method="post" class="form-w-50">
        <div>
            <label for="email">Courriel</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </div>

        <div>
            <input type="submit" valye="Connexion">
        </div>
    </form>

    <p>Pas encore inscrit&thinsp;? <a href="./register.php">Créer un compte.</a></p>
</body>
</html>