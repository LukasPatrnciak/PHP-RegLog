<?php
/*- == LukasPatrnciak ==
Filename: sql/mysql.php
Author: Lukas Patrnciak
www.lukaspatrnciak.sk

(C) 2018 Lukáš Patrnčiak
*/

session_start();

/* MySQL Database
define("sql_host", "localhost");
define("sql_user", "postgres");
define("sql_password","lukike4556");
define("sql_name", "lukaspatrnciak");

$connect = mysqli_connect(sql_host, sql_user, sql_password, sql_name);
*/

/* PostgreSQL Database */
$connect = pg_connect("dbname=postgresql, user=postgres, password=lukike4556");
?>