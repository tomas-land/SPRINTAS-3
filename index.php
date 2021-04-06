
<?php
// php ../composer.phar dump-autoload
// update database : vendor\bin\doctrine orm:schema-tool:update --force --dump-sql


require_once "bootstrap.php";


$url = $_SERVER['REQUEST_URI'];
$prefix = '/SPRINTAS-3';
//  Konstruojamas kelias
switch ($url) {
    case  $prefix . '/' :
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '' :
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '/home' :
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '/about' :
        require __DIR__ . '/src/views/about.php';
        break;
    case isset($_GET['delete']):
        require __DIR__ . '/src/views/admin.php';
        break; 
    case  isset($_GET['logout'])  :
        require __DIR__ . '/src/views/home.php';
        break;   
    case isset($_GET['add_page']) :
        require __DIR__ . '/src/views/admin.php';
        break;
    case isset($_GET['update']) :
        require __DIR__ . '/src/views/admin.php';
        break;
    case  isset($_GET['page'])  :
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '/admin' :
        require __DIR__ . '/src/views/admin.php';
        break;
    case $prefix . '/website' :
        require __DIR__ . '/src/views/website.php';
        break;
                       

    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;

}


