<?php

use Models\Page;

require 'header.php';
require 'login.php';

function redirect_to_root()
{
  header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// Delete page
if (isset($_GET['delete'])) {
  $user = $entityManager->find('Models\Page', $_GET['delete']);
  $entityManager->remove($user);
  $entityManager->flush();
}

// Create page
if (isset($_POST['submit'])) {
  $page = new Page();
  $page->setTitle($_POST['title']);
  $page->setContent($_POST['content']);
  $entityManager->persist($page);
  $entityManager->flush();
  redirect_to_root();
}
// Update
if (isset($_POST['submit_update'])) {
  $page = $entityManager->find('Models\Page', $_POST['update_id']);
  $page->setTitle($_POST['update_name']);
  $page->setContent($_POST['update_content']);
  $entityManager->flush();
  redirect_to_root();
}

if (isset($_SESSION['logged_in']) == true) {
?>
  <!-- // ADMIN -->
  <div class="container">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home">CMS</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="website">View Website</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <?php
    $pages = $entityManager->getRepository('Models\Page')->findAll();
    $i = 1;
    print("<table class=\"table table-striped\">");
    foreach ($pages as $p)
      print("<tr>"
        . "<td>" . $i++  . "</td>"
        . "<td>" . $p->getTitle() . "</td>"
        . "<td><a href=\"?delete={$p->getId()}\">DELETE</a></td>"
        . "<td><a href=\"?update={$p->getId()}\">UPDATE</a></td>"
        . "</tr>");
    print("</table>");
    print("</pre><hr>");
    ?>
    <a href="?add_page"><button type="button" class="btn btn-outline-success btn-sm">Add page</button></a><br><br>
    <?php

    if (isset($_GET['add_page'])) {
      print('
      <form action="" method="POST">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">New Title</label>
          <input type="hidden" value="">
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Content</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button name="submit" type="submit" class="btn btn-outline-success btn-sm">Submit</button>
      </form>');
    }

    if (isset($_GET['update'])) {
      $page = $entityManager->find('Models\Page', $_GET['update']);
      print("<h3> Update Page :</h3>");
      print("
      <form action=\"\" method=\"POST\">
          <input type=\"hidden\" name=\"update_id\" value=\"{$page->getId()}\">
          <label for=\"name\">Page Title: </label><br>
          <input type=\"text\" name=\"update_name\" value=\"{$page->getTitle()}\"><br><br>
          <label for=\"content\">Content : </label><br>
          <textarea type=\"text\" name=\"update_content\" rows=\"14\" cols=\"100\">{$page->getContent()}</textarea><br><br>
          <button name=\"submit_update\" type=\"submit\" class=\"btn btn-outline-success btn-sm\">Submit</button>
      </form>
  ");
      print("<hr>");
    }
    ?>
  </div>
<?php
} else {
?>
  <!-- LOGIN -->
  <div id="login">
    <div class="container pt-5">
      <div id="login-row" class="row justify-content-center align-items-center ">
        <div id="login-column" class="col-md-4">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="" method="post">
              <h3 class="text-center ">Login</h3>
              <div class="form-group pt-5 text">
                <label for="username" class="">Username:</label><br>
                <input type="text" name="username" id="username" placeholder='username:123' class="form-control">
              </div>
              <div class="form-group">
                <label for="password" class="">Password:</label><br>
                <input type="text" name="password" placeholder='password:123' id="password" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="login" class="btn  btn-md" value="submit">
              </div>
            </form>
            <h6><?php echo $msg; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
}

?>

</body>

</html>