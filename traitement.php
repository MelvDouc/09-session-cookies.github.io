<?php
    session_start();
    include_once('session.php');
?>

<?php
    require_once('bdd.php');
    date_default_timezone_set("Europe/Paris");

    if(isset($_GET['register'])){
        $req = $bdd->prepare('INSERT INTO users (username, email, password, address, zip, city, register_date) VALUES (:username, :email, :password, :address, :zip, :city, :register_date)');
        
        $registerDate = date('Y-m-d H:i:s');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $req->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $req->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
        $req->bindValue(':zip', $_POST['zip'], PDO::PARAM_STR);
        $req->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
        $req->bindValue('register_date', $registerDate);

        $req->execute();

        $_SESSION['notification'] = '<p>Bonjour, ' . $_POST['username'] . '. Bienvenue sur le site&thinsp;!';
        header('Location: index');
    }

    else if(isset($_GET['connect'])){

        // $email = $_POST['email'];
        $req = $bdd->prepare('SELECT username, password FROM users WHERE username=:username, email=:email');
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':username', $_POST['username']);
        $req->execute();
        var_dump($req);
        $data = $req->fetch();
        var_dump($data);

        if(isset($data['password'])){
            if(password_verify($_POST['password'], $data['password'])){
                $_SESSION['notification'] = '<p>Bonjour' . $_POST['username'] . '.';
                $_SESSION['connected'] = true;
                header('Location: profile.php');
            } else{
                $_SESSION['notification'] = '<p style="color:red">Couriel ou mot de passe incorrect.</p>';
                header('Location: index.php');
                // echo 'erreur courriel ou mot de passe';
            }
        } else{
            $_SESSION['notification'] = '<p style="color:blue">Vous n\'êtes pas encore inscrit.</p>';
            header('Location: index.php');
        }
        
        echo '<br><hr><a href="index.php">index.php</a>';

    }

    else if(isset($_GET['disconnect'])){
        session_unset();
        session_destroy();
        $_SESSION['notification'] = '<p style="color:green">Vous avez bien été déconnecté.</p>';
        header('Location: index.php');
    }
?>