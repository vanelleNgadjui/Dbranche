<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$topics = selectAll('topics');

if (isset($_POST['add-post'])) {
    dd($_POST);
}