<?php
// Fichier pour se connecter dans la base de données

//Donnéé pour la connection à la base de données
$host = 'dbranche.org';
$user = 'kchg7228_vanelle';
$pass = 'JalaCompet11!';
$db_name = 'kchg7228_dbranche';

//variabl de connection qui sera utilsée pour tout appele de la base de donnée
$conn = new MySQLi($host, $user, $pass, $db_name);

//si la connection a échouée on renvoi un message
if($conn->connect_error){
    die('Connection à la base de donnée échouée: ' . $conn->connect_error);
}
//else {
//     echo "Connexion reusi";
// }

