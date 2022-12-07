<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Blog</title>
</head>

<body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>




  <!-- Main Content -->
  <div class="main-content">
    <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

    <?php foreach ($posts as $post) : ?>
      <div class="post clearfix">
        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
        <div class="post-preview">
          <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
          <i class="far fa-user"> <?php echo $post['username']; ?></i>
          &nbsp;
          <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
          <p class="preview-text">
            <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
          </p>
          <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">En savoir plus...</a>
        </div>
      </div>
    <?php endforeach; ?>



  </div>


  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <script src="assets/js/scripts.js"></script>

</body>

</html>