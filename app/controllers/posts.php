<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$topics = selectAll('topics');

if (isset($_POST['add-post'])) {
    unset($_POST['add-post'], $_POST['topic_id']);
    dd($_POST);
}