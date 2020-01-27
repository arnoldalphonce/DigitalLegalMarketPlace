<?php
/*
create variable for connection
*/
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'DLMP';

$link = mysqli_connect($host,$user,$password,$dbname) or die(mysqli_error($link));
?>
