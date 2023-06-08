<?php




session_start();

$minPHPVersion = '8.0';



if (version_compare(phpversion(), $minPHPVersion, '<')) {
    die("Your PHP Version must be {$minPHPVersion} or higher");
}


define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);




require "../app/core/init.php";

DEBUG ? ini_set("display_errors",1): ini_set("display_errors",0);



    $app = new Route();

 $app->loadController();
