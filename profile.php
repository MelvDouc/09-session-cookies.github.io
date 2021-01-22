<?php
    include_once('session.php');
    if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){

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
        <li>Pseudo :</li>
        <li>Email :</li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    
</body>
</html>

<?php
    } else{
        echo 'vous n\'avez pas...';
    }
?>