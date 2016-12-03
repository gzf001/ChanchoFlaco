<?php
define('DB_SERVER', 'localhost');
define('DB_NAME', 'chanchoflaco');
define('DB_USER', 'root');
define('DB_PASS', 'ZZ4mI3NZ');

$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);

mysql_select_db(DB_NAME, $con)
?>