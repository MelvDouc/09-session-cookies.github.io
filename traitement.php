<?php
    session_start();
    include_once('session.php');
?>

<?php
    require_once('bdd.php');
    date_default_timezone_set("Europe/Paris");

    if(isset($_GET['register'])){
        if($_POST['username'] != null && $_POST['email'] !=null && $_POST['password'] != null && $_POST['address'] != null && $_POST['zip'] != null && $_POST['city'] != null){
            if(strlen($_POST['zip']) == (4 || 5)){
                
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
                $_SESSION['connected'] = true;
                header('Location: profile');
            } else{
                $_SESSION['notification'] = '<p>Veuillez remplir tous les champs.</p>';
                header('Location: index.php');
            }
        }
    }

    elseif(isset($_GET['connect'])){
        $req = $bdd->prepare('SELECT id, password, username FROM users WHERE email=:email');
        $req->bindValue(':email', $_POST['email']);
        $req->execute();
        $data = $req->fetch();
        if(isset($data['password'])){
            if(password_verify($_POST['password'], $data['password'])){
                $_SESSION['notification'] = '<p style="color:green">Bonjour, ' . $data['username'] . '</p>';
                $_SESSION['connected'] = $data['id'];
                header('Location: profile.php?id=' . $data['id']);
            }
            else{
                $_SESSION['notification'] = '<p style="color:red">Email ou mot de passe incorrect</p>';
                header('Location: index.php');
            }
        }
        else{
            $_SESSION['notification'] = '<p style="color:blue">Vous n\'êtes pas encore inscrit, commencez par créer un compte.</p>';
            header('Location: register.php');
        }
    }

    else if(isset($_GET['disconnect'])){
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['notification'] = '<p style="color:green">Vous avez bien été déconnecté.</p>';
        header('Location: index.php');
    }
?>