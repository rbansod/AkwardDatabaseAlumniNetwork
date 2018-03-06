<?php
$server = '127.0.0.1:3307';
$user = 'root';
$pass= 'viji';
$db = 'alumnidb';
$connection = mysql_connect($server,$user,$pass) or die("Unable to connect");
$database = mysql_select_db($db,$connection);
?>