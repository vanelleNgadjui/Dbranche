<!-- fichier pour extraire les données de la methode post et les inserer dans la base de données -->

<?php

include("db.php");

$table = 'inscrits';
$users= selectAll($table);


$errors = array();
$id = "";
$name = "";
$prenom = "";

$email="";
$poste="";
$entreprise="";


// ajouter un users
if (isset($_POST['add-users'])) {
        unset($_POST['add-users']);
        $post_id = create($table, $_POST);
}


// // un seul users
// if (isset($_GET['id'])) {
//     $post = selectOne("users", ['id' => $_GET['id']]);

//     $id = $post['id'];
//     $name = $post['name'];
//     $prenom = $post['prenom'];
//     $email=$post['email'];
//     $poste = $post['poste'];
//     $entreprise=$post['entreprise'];
// }
