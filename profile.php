<?php
    include_once('session.php');
    require_once('bdd.php');
    if(isset($_SESSION['connected']) && $_SESSION['connected'] != null){
        $id = (INT)$_SESSION['connected'];
        $req = $bdd->query('SELECT * FROM users WHERE id=' . $id);
        $user = $req->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('./templates/head.html')?>
    <title>Mon Profil</title>
</head>
<body>
    <h1>Mon Profil</h1>

    <ul>
        <li>Pseudo : <?= $user['username']?></li>
        <li>Email : <?= $user['email']?></li>
        <li>Adresse : <?= $user['address']?></li>
        <li>Code postal : <?= $user['zip']?></li>
        <li>Ville : <?= $user['city']?></li>
        <li>Inscrit depuis : <?= $user['register_date']?></li>
        <!-- <li style="font-size:small">>?= $id?></li> -->
    </ul>

    <a href="traitement.php?disconnect"><button>Déconnexion</button></a>
    
</body>
</html>

<?php
    } else{
        var_dump($_SESSION);
        $_SESSION['notification'] = '<p class="code">ACCÈS REFUSÉ.</p>';
        header('Location: index.php');
    }
?>