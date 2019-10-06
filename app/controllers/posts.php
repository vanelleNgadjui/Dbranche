<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$topics = selectAll('topics');

$table = 'posts';
$errors = array();


if (isset($_POST['add-post'])) {
    unset($_POST['add-post'], $_POST['topic_id']);
    $_POST['user_id'] = 1;
    $_POST['published'] = 1;


    $post_id = create($table, $_POST);
    dd($post_id);
}