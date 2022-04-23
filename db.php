<?php
$db = 'mysql';
$host = 'localhost';
$db_name = 'dinamic_site';
$db_user = 'root';
$db_password = 'mysql';


$connect = mysqli_connect($host, $db_user, $db_password, $db_name) or die('ERROR');