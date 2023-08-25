<?php
session_start();
?>
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="get_all.php" class="nav-link px-2 text-white">Home</a></li>
        <li><a href="index.php" class="nav-link px-2 text-white">Logout <?$_SESSION['login'] = 'Guest'?></a></li>
          <li><a href="index.php" class="nav-link px-2 text-white">Log in </a></li>
      </ul>

      <div class="text-end">
        <h6>Hello, <?=$_SESSION['login']?></h6>
        <p></p>
      </div>
    </div>
  </div>
</header>