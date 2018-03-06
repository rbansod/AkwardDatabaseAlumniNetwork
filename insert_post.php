<?php 
$connection = mysql_connect('localhost', 'root', '');
	if (!$connection){
		die("Database Connection Failed" . mysql_error());
	}
	$select_db = mysql_select_db('Alumni');
	if (!$select_db){
		die("Database Selection Failed" . mysql_error());
	}
	session_start(); // Starting Session
	$error='';

//$per_id=//current person_id
$date_post=date("m/d/Y");
$time_post=date("h:m:s");
$post_text=$_POST['post_text'];
$sql2="insert into posts (Person_id,Date_Posted,Time_Posted,Post_Text) values (1,'$date_post','$time_post','$post_text')";
$query2 = mysql_query($sql2, $connection);
header("location: Message_board.php");
?>