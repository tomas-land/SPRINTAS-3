<?php require 'header.php';?>

  <div class="container">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home">CMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
      //       $pages = $entityManager->getRepository('Models\Page')->findAll();
      //       print('<li class="nav-item">');
      //       foreach ($pages as $p)
      //         print('
      //        <a class="nav-link " aria-current="page" href="?page=' . $p->getId() . '">' . $p->getTitle() . '</a>
      //      </li>
      //  ');
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <h1>
      <?php
      if (isset($_GET['page'])) {
        $page = $entityManager->find('Models\Page', $_GET['page']);
        echo '<div class="shadow p-3 mb-5 bg-white rounded "><h3>' . $page->getContent() . '</h3></div>';
      }

      // LOGOUT
      if (isset($_GET['logout'])) {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        session_destroy();
        // header("Location: home" ); 
        // echo "logged out";
        print('<script type="text/javascript">alert("You have been logged out successfully.");</script>');
      }
      ?>
    </h1>
  </div>
</body>
</html>
