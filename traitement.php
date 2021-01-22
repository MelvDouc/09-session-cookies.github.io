<?php
    require_once('bdd.php');
    date_default_timezone_set("Europe/Paris");

    if(isset($_GET['register'])){
        $req = $bdd->prepare('INSERT INTO users (username, email, password, address, zip, city, register_date) VALUES (:username, :email, :password, :address, :zip, :city, :register_date)');
        
        $registerDate = date('Y-m-d H:i:s');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $req->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $req->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
        $req->bindParam(':zip', $_POST['zip'], PDO::PARAM_STR);
        $req->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
        $req->bindParam('register_date', $registerDate, PDO::PARAM_STR);

        $req->execute();
    }
?>