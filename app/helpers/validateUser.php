<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'besoin de nom utilisateur');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Adresse mail requis ');
    }

    if (empty($user['password'])) {
        array_push($errors, 'entrez un mot de passe');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'le mot de passe ne match pas');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email déja utilsé');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'nom utilisateur requis');
    }

    if (empty($user['password'])) {
        array_push($errors, 'mot de passe requis');
    }

    return $errors;
}