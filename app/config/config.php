<?php

error_reporting(E_ALL ^ E_NOTICE);

/*=========== Base URL ==========*/
define('BASEURL', 'http://localhost/my-book-hotel/public/');


/*=========== Database Configuraiton ==========*/

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'my-book-hotel';

define('DB_HOST', $db_host);
define('DB_USER', $db_user);
define('DB_PASS', $db_pass);
define('DB_NAMAE', $db_name);

/*=========== Website Configuration ==========*/

$defaultTitle = 'Mobile Computer Store';
$defaultFooter = date('Y').' &copy; Computer Store';

?>