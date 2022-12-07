<header>
    
    <ul class="nav">
      <li><a href="<?php echo BASE_URL . '/index.php' ?>">dbranche</a></li>

      <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>
            <?php if($_SESSION['admin']): ?>
              <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Tableau de bord</a></li>
            <?php endif; ?>
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Deconnexion</a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/register.php' ?>">S'enregistrer</a></li>
        <li><a href="<?php echo BASE_URL . '/login.php' ?>">se connecter</a></li>
      <?php endif; ?>
    </ul>
</header>