<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$table = 'posts';

$topics = selectAll('topics');
$posts = selectAll($table);


$errors = array();
$title = "";
$body = "";
$topic_id = "";

if (isset($_POST['add-post'])) {
    $errors = validatePost($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-post'], $_POST['topic_id']);
        $_POST['user_id'] = 1;
        $_POST['published'] = 1;
    
    
        $post_id = create($table, $_POST);
        header("location: " . BASE_URL . "/admin/posts/index.php");       
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
    }
}