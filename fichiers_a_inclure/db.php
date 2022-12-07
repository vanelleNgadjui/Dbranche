<?php
// fichier des fonctions pour interagir avec la base de dones

require('connect.php');

//retourner une valeur 
function dd($value) // a supprimer car juste pour tester le contenu
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

// preparer et executer les requettes sql (l'injection des vleurs des keys)
function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);

    //extraires les valeurs dans le tableau
    $values = array_values($data);
    // repeter le string en fonction du nombres de valeurs (parametres)
    $types = str_repeat('s', count($values));
    //...$values pour la liste des valeurs
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

// fonction pour selectionner tous les éléments d'une table
function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    // si les conditions sont vides, on suppose que l'on veut tout
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    } else {
        // retour des résultats qui respectent les conditions
        
        //si il y a plusieurs conditions, on parcourt le tableau
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {// premier index du tableau de conditions
                $sql = $sql . " WHERE $key=?";
                // select * from $table were $key = ? ($value);
            } else { //pour le reste des conditions
                $sql = $sql . " AND $key=?";
                // select * from $table were $key1 = $value2 and $key2=$value2
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}

// fonction pour selectionner un seul élément d'une table
function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    //limiter a un resultat
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}



// fonction pour selectionner un seul user 
function selectOneuser($table, $conditions)
{
    global $conn;
    $sql = "SELECT username FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    //limiter a un resultat
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}


// fonction pour créer inserer les élement dans une table
function create($table, $data)
{
    global $conn;
    // insert into user(username, admin, email,password) values(?,?,?,?);
    // insert into user SET username=?, admin=?, email=?,password=?;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}


// fonction pour modifier les éléments d'une table
function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}


// fonction pour supprimer les éléments d'une table
function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

// fonction pour publier un post
function getPublishedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQuery($sql, ['published' => 1]);
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}



// fonction pour recuperer un 
function getUsername($user_id)
{
    global $conn;
    $sql = "SELECT username FROM users WHERE id=?";

    $stmt = executeQuery($sql, [ 'id' => $user_id]);
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}



// fonction pour rechercher les éléments dans la base de donnée
function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT 
                p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE";


    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match]);
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}
    
