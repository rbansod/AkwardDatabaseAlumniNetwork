<?php
include 'dbconnect.php';
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty(($_POST['login']) || $_POST['login'] == 'user name')|| (empty($_POST['password']) || $_POST['password'] == '4815162342')) {
	$error = "Username or Password is invalid";
	header("location: login.php?errorCode=1");
}
else
{
//Define $username and $password
$username=$_POST['login'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$username = htmlentities($username);
$password = htmlentities($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// SQL query to fetch information of registerd users and finds user match.
$sql = "select * from login where Pass_Word='$password' AND Login_Id='$username'";
$query = mysql_query($sql);
if($query === FALSE) {
	die(mysql_error());
	$error = "Username or Password is invalid";
	header("location: login.php?errorCode=1");
	// TODO: better error handling
}
else{
	$rows = mysql_num_rows($query);
	if ($rows == 1) {
		while($row = mysql_fetch_array($query)){
			$personId = $row["Person_Id"];
			 header("location: alumnibookhome.php"); // Redirecting To Other Page
			 session_start(); // Starting Session
			 $_SESSION["login_user"]=$username; // Initializing Session
			 $_SESSION["person_Id"]=$personId; // Initializing Session
		}
	}
	else {
		$error = "Username or Password is invalid";
		header("location: login.php?errorCode=1");
	}
} 
mysql_close($connection); // Closing Connection
}
}
?>