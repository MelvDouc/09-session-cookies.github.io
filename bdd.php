<?php

    $host = 'localhost';
    $db = '08-crud';
    $user = 'root';
    $password = '';

    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $db . '; charset=utf8', $user, $password);

?>