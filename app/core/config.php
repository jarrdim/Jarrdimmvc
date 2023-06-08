<?php

defined("ROOTPATH") OR exit('Access denied');

define('NAME','Agritech shop');
define('DEBUG',"true");



if($_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] =='localhost' )
{
    define('DBHOST','127.0.0.1');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBNAME','AgriTech');
    define('DBDRIVER','mysql');
    //make sure your url looks like ths
    define('ROOT','http://localhost/jarrdimmvc/public');
}
else
{
    define('ROOT','https://wwww/system/public');
}

