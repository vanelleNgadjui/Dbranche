<?php

require('connect.php');



function dd($value) // to be deleted
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}


function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        // return records that match conditions ...
    }
    
}


$users = selectAll('users');
dd($users);