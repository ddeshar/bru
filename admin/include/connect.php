<?php
$host = "localhost";
$user = "root";
$pass = "mysql";
$db = "php_bru";

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
mysqli_query($link, "SET NAMES utf8");
?>