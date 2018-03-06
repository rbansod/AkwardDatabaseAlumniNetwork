<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/functions.js"></script>
		<title>Search Results</title>
	</head>
	<body>
	<div id="main-wraper" style="width: 100%;">
		<div id="top-wraper" style="padding-bottom: 0px; width: 97%;">
			<div id="banner" style="padding-top: 11px;">
				<div id="logo">
					<img src="../AkwardDatabaseAlumniNetwork/img/logo.png"
						alt="UNC Charlotte Logo">
				</div>
				<span style="margin-left: 45px; vertical-align: sub;">C-UNC
					AlumniBook</span>
			</div>
			<div id="nav">
				<ul>
					<li style="padding-left: 0px; padding-right: 0px;"><a href="alumnibookhome.php?rtnhome=true">Home</a></li>
					<li style="padding-left: 65px; padding-right: 0px;">
						<form action="search.php" method='post'>
						<input type="text" name="search_name" id="search_name" style="background-color: #ffffff; height: 90%; width: 500px;"></input><!--  </li> -->
					<!-- <li style="padding-left: 5px; padding-right: 0px;"> -->
						<input type="submit" value="Search" style="border-radius: 2px; width: 94px; background-color: darkorange; color: white;"></input></form></li>
					<li style="padding-left: 95px; padding-right: 0px;"><a href="">Edit Profile</a></li>
					<li style="padding-left: 10px; padding-right: 0px;"><a href="">De-Activate Profile</a></li>
					<li style="padding-left: 10px; padding-right: 0px;"><a href="">Logout</a></li>
				</ul>
			</div>
		</div>
		<div id="bottom-wrapper" class ="contentTable1" style="width: 800px; height: auto; margin: 0 auto; padding-top:30px;">
	<?php
	
	include 'dbconnect.php';
	session_start (); // Starting Session
	$error = '';
	
	$search_name = $_POST ['search_name'];
	$sql = "select * from person where FName like '%$search_name%' OR LName like '%$search_name%'";
	$query = mysql_query ($sql);
	if ($query === FALSE) {
		die ( mysql_error () );
		$error = "No Person Found";
		echo $error;
		// TODO: better error handling
	}
	?>
	
			<div id="" class="contentTable-Title" style="border:none; margin:0 auto; display:table-row; width:800px; padding: 0px 0px; float:none; text-align: center; position:relative;">
				<div id="" class="contentTable-col"style="background-color: #ffffff; width:inherit; border-top:1px solid #00a2d3; border-top-left-radius:3px;border-top-right-radius:3px;">Search Result</div>
			</div>						
	    	<div id="contentTable-row" class="contentTable-row" style="position:relative;">
	    	<?php
				while ( $row = mysql_fetch_assoc ( $query ) ) {
			?>
				<div id="" class="contentTable-col" style="width:inherit; ">
					<a href="alumnibookhome.php?pid=<?php echo $row ['Person_Id'];?>"><?php
						echo $row ['FName'];
						echo " ";
						echo $row ['MName'];
						echo " ";
						echo $row ['LName'];
					?></a>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	</body>
</html>