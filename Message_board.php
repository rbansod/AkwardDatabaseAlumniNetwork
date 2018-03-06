<!DOCTYPE html>
<head><title></title></head>
<body>
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
	$sql = "select * from posts order by post_id desc";
	$query = mysql_query($sql, $connection);
	if($query === FALSE) {
		die(mysql_error());
		$error = "No Post to Show";
		// TODO: better error handling
	}
?>
<form action="insert_post.php" method='post'>
<label> Post </label>
<input type="text" name="post_text" id="post_text">
<button type="submit" value="Submit">Post</button>
</form>
<table id="post">
		<tr><th>Date and Time</th><th>Name</th><th>Post</th></tr>
<?php
	while ($row = mysql_fetch_assoc($query)) {
		$id= $row['Person_Id'];
			$sql1="select * from Person where person_id='$id'";
			$query1=mysql_query($sql1, $connection);
			if($query1 === FALSE) {
				die(mysql_error());
				$error = "No Person";
			}?>
		<tr><td><?php echo $row['Date_Posted']; echo ' '; echo $row['Time_Posted'];?></td>
	<?php while ($row1= mysql_fetch_assoc($query1)){?>
		<td><?php
			echo $row1['FName'];
			echo ' ';
			echo $row1['MName'];
			echo ' ';
			echo $row1['LName'];
			echo ' ';
		}?></td>
    <td><?php echo $row['Post_Text'];}?></td></tr>
	</table>
<?php
while ($row4 = mysql_fetch_assoc($query)) {
    $id= $row4['Person_Id'];
		$sql5="select * from Person where person_id='$id'";
		$query5=mysql_query($sql5, $connection);
		if($query5 === FALSE) {
			die(mysql_error());
			$error = "No Person";
		}
		while ($row5= mysql_fetch_assoc($query5))
		{
			echo $row5['FName'];
			echo $row5['MName'];
			echo $row5['LName'];
		}
	echo $row4['Date_Posted'];
    echo $row4['Time_Posted'];
    echo $row4['Post_Text'];
}
?>
</body></html>