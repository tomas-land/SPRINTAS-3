


<?php 

session_start();

if (isset($_SESSION['logged_in']) == true) {

    ?>

<h1>website</h1>

<?php } else {

    header("Location: 404.php");
}

