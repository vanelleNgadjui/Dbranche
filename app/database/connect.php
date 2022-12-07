<?php

$host = 'localhost:8080';
$user = 'root';
$pass = ' ';
$db_name = 'dbranche';

// self::$_bdd = new PDO('mysql:host=localhost:8080;dbname=dbranche;charset=utf8', 'root', '');
// $conn = new MySQLi($host,$db_name, $user, $pass);
try {
    self::$conn = new PDO('mysql:host=localhost:8080;dbname=dbranche;charset=utf8', 'root', '');
    // C'est ainsi que nous pouvons définir plusieurs attributs
} catch(PDOException $e) {
    // die("Connexion a la base de donnée echoué: " . $e->getMessage());
    die("Connexion a la base de donnée echoué: " . $e->getMessage());
 }

