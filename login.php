<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Welcome to C-UNC AlumniBook</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/functions.js"></script>
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<div id="main-wraper" style="width: 100%;">
		<div id="top-wraper" style="padding-bottom: 15px; width: 100%;">
			<div id="banner" style="padding-top: 11px;">
				<div id="logo">
					<img src="../AkwardDatabaseAlumniNetwork/img/logo.png"
						alt="UNC Charlotte Logo">
				</div>
				<span style="margin-left: 35px; vertical-align: sub;">C-UNC
					AlumniBook</span>
			</div>
			<div id="nav" style="display: none;">
				<!-- <ul>
						<li style="padding-left:0px; padding-right:0px;"><a href="ConferenceChairLoginSuccess.jsp">Home</a></li>
						<li style="padding-left:0px; padding-right:0px;"><a href="CreateConference.jsp">Create Conference</a></li>
						<li style="padding-left:0px; padding-right:0px;"><a href="/EasyResearch/InviteReviewers">Invite Reviewers</a></li>  
						<li style="padding-left:0px; padding-right:0px;"><a href="/EasyResearch/CheckStatusConferenceChair">Check Abstract</a></li>
						<li style="padding-left:0px; padding-right:0px;"><a href="/EasyResearch/AssignReviewerPaper">Assign Papers</a></li>
						<li style="padding-left:0px; padding-right:0px;"><a href="/EasyResearch/ConferenceChairNotification">Notifications</a></li>
						<li style="padding-left:0px; padding-right:0px;"><a href="/EasyResearch/MakeDecision">Make Paper Decision</a></li>
					</ul> -->
			</div>
		</div>
		<form method="post" action="logincheck.php" class="login"
			style="align-text: right; margin-top: 13px; float: right;"
			onsubmit="return checkFields();">
			<table>
				<tbody>
					<tr>
						<td id="ErrorMessage"
							style="display: inline-block; width: 100%; text-align: center;">
			  				<?php
								if (isset ( $_GET ["errorCode"] )) {
									if (! empty ( $_GET ["errorCode"] ))
							?>
			  					<p style="text-align: center;">Username or Password is invalid</p>
			  				<?php
								} else {
								}
							?>
			  			</td>
					</tr>
					<tr>
						<td style="font-size: x-large; color: rgba(12, 81, 173, 1);">Login</td>
					</tr>
					<tr>
						<td>
							<p>
								<label for="login">User Name:</label> <input type="text"
									name="login" id="login" value="user name"
									onfocus="emptyStringUserName();"
									onblur="addDefaultUserName(); ">
							</p>
							<p>
								<label for="password">Password:</label> <input type="password"
									name="password" id="password" value="4815162342"
									onfocus="emptyStringPass();" onblur="addDefaultPassword();">
							</p>
							<p id="loginSubmit" class="login-submit"
								style="border: none; box-shadow: 0 0 0; border-radius: 0px; top: 130px; right: 20px;">
								<button type="submit" name="submit" id="submit"
									class="login-button" style="border: none;" value="Login">Login</button>
							</p>
							<p class="forgot-password">
								<a href="resetpassword.php">Forgot your password?</a>
							</p>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<!-- <section class="about">
    	<p class="about-links">
      <a href="http://www.cssflow.com/snippets/dark-login-form" target="_parent">View Article</a>
      <a href="http://www.cssflow.com/snippets/dark-login-form.zip" target="_parent">Download</a>
    </p>
    <p class="about-author">
      &copy; 2012&ndash;2013 <a href="http://thibaut.me" target="_blank">Thibaut Courouble</a> -
      <a href="http://www.cssflow.com/mit-license" target="_blank">MIT License</a><br>
      Original PSD by <a href="http://365psd.com/day/2-234/" target="_blank">Rich McNabb</a>
  </section> -->
</body>
</html>