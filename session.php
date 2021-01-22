<?php
    session_start();

    if(isset($_SESSION['notification']) && $_SESSION['notification'] != null){
        echo $_SESSION['notification'];
    } /*else{
        echo '$_SESSION[\'notification\'] n\'est pas défini ou est nul.';
    }*/

    unset($_SESSION['notification']);
?>
