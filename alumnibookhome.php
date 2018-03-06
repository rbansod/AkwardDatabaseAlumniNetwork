<?php include 'dbconnect.php'; ?>
<?php include 'PersonDetails.php'; ?>
<?php include 'FacultyDetails.php'; ?>
<?php include 'StudentDetails.php'; ?>
<?php include 'AdminDetails.php'; ?>
<?php include 'StaffDetails.php'; ?>
<?php include 'AlumniDetails.php'; ?>
<?php include 'NonAlumniDetails.php'; ?>
<?php
session_start();
if(isset($_SESSION)){
	$login_User= $_SESSION["login_user"];
	$fromSearch = false;
	if(isset($_GET["pid"])){
		$person_Id= mysql_real_escape_string(htmlentities($_GET["pid"]));
		$fromSearch = true;
	}
	else{
		$person_Id= $_SESSION["person_Id"];
		$fromSearch = false;;
	}
	if(!empty($person_Id))
	getAllDetails($person_Id);
}
?>
<?php
	function getAllDetails($personId){
		$personId = htmlentities($personId);
		$personId = mysql_real_escape_string($personId);
		$sql = "select * from person where Person_Id='$personId'";
		//echo "$sql <br/>";
		$query = mysql_query($sql);
		if($query === FALSE) {
			die(mysql_error());
			$error = "Not able to find the details";
			echo $error;
		}
		else{
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				$personDetails = new PersonDetails();
				while($row = mysql_fetch_array($query)){
					$personDetails->setPersonId($row["Person_Id"]);
					$personDetails->setDepartmentId($row["Department_Id"]);
					$personDetails->setUniversityIdNum($row["University_Id_Num"]);
					$personDetails->setFName($row["FName"]);
					$personDetails->setMName($row["MName"]);
					$personDetails->setLName($row["LName"]);
					$personDetails->setContactNumber($row["Contact_Number"]);
					$personDetails->setEmailAddress($row["Email_Address"]);
					$personDetails->setPersonalPhoto($row["Personal_Photo"]);
					$personDetails->setAddress($row["Address"]);
					$personDetails->setCity($row["City"]);
					$personDetails->setState($row["State"]);
					$personDetails->setPostalCode($row["Postal_Code"]);
					$personDetails->setPostalZipPlusFour($row["Postal_Zip_PlusFour"]);
					$personDetails->setCountry($row["Country"]);
					$personDetails->setRegion($row["Region"]);
					$personDetails->setPersonType($row["Person_Type"]);
					$personType = $row["Person_Type"];
					if(isset($personType)){
						$personTypeArray = explode( ';', $personType );
						//echo $personTypeArray[0];
					}
			
					$personTypeStudent = false;
					$personTypeFaculty = false;
					$personTypeStaff = false;
					$personTypeAdmin = false;
					if(isset($personTypeArray)){
						foreach ($personTypeArray as $personTypeArrayKey =>$personTypeArrayValue){
							if(strcasecmp($personTypeArrayValue, "student") == 0)
								$personTypeStudent = true;
							if(strcasecmp($personTypeArrayValue, "faculty") == 0)
								$personTypeFaculty = true;
							if(strcasecmp($personTypeArrayValue, "staff") == 0)
								$personTypeStaff = true;
							if (strcasecmp($personTypeArrayValue, "admin") == 0)
								$personTypeAdmin = true;
						}
					}
			
					if($personTypeStudent == true)
						getStudentDetails($personId);
					elseif ($personTypeFaculty == true)
						getFacultyDetails($personId);
					elseif($personTypeStaff == true)
						getStaffDetails($personId);
					elseif($personTypeAdmin  == true)
						getAdminDetails($personId);
				}
				$_SESSION["personDetails"]=$personDetails;
			}
			else {
				$error = "Not able to find the details";
				echo $error;
			}
		}
	}
	
	function getStudentDetails($personId){
		$personId = htmlentities($personId);
		$personId = mysql_real_escape_string($personId);
		$sql = "select * from student where Person_Id='$personId'";
		//echo "$sql  <br/>";
		$query = mysql_query($sql);
		if($query === FALSE) {
			die(mysql_error());
			$error = "Not able to find the details";
			echo $error;
		}
		else{
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				$studentDetails = new StudentDetails();
				while($row = mysql_fetch_array($query)){
					$studentDetails->setAdvisorId($row["Advisor_Id"]);
					$studentDetails->setDegreeProgram($row["Degree_Program"]);
					$studentDetails->setGraduated($row["Graduated"]);
					$studentDetails->setDateEntry($row["Date_Entry"]);
					$studentDetails->setGeneralMailingList($row["General_Mailing_List"]);
					
					if($studentDetails->getGraduated()){
						$sql = "select * from alumni where Person_Id='$personId'";
						//echo "$sql  <br/>";
						$query = mysql_query($sql);
						if($query === FALSE) {
							die(mysql_error());
							$error = "Not able to find the details";
							echo $error;
						}
						else{
							$rows1 = mysql_num_rows($query);
							if ($rows1 > 0) {
								$alumniDetails = new AlumniDetails();
								while($row1 = mysql_fetch_array($query)){
									$alumniDetails->setGraduationYear($row1["Graduation_Year"]);
									$alumniDetails->setDegreeEarned($row1["Degree_Earned"]);
									$alumniDetails->setMajor($row1["Major"]);
									$alumniDetails->setOnAlumniMailingList($row1["On_Alumni_Mailing_List"]);
									$alumniDetails->setAmountDonated($row1["Amount_Donated"]);
								}
								$_SESSION["alumniDetails"]=$alumniDetails; // Initializing Session
							}
							else {
								$error = "Not able to find the details";
								echo $error;
							}
						}
					}
					else{
						$sql = "select * from non_alumni where Person_Id='$personId'";
						//echo "$sql  <br/>";
						$query = mysql_query($sql);
						if($query === FALSE) {
							die(mysql_error());
							$error = "Not able to find the details";
							echo $error;
						}
						else{
							$rows1 = mysql_num_rows($query);
							if ($rows1 > 0) {
								$nonAlumniDetails = new NonAlumniDetails();
								while($row1 = mysql_fetch_array($query)){
									$nonAlumniDetails->setMajor($row1["Major"]);
									$nonAlumniDetails->setDepartureDate($row1["Departure_Date"]);
									$nonAlumniDetails->setCurrentStudent($row1["Current_Student"]);
								}
								$_SESSION["nonAlumniDetails"]=$nonAlumniDetails; // Initializing Session
							}
							else {
								$error = "Not able to find the details";
								echo $error;
							}
						}
					}
				}
				$_SESSION["studentDetails"]=$studentDetails; // Initializing Session
			}
			else {
				$error = "Not able to find the details";
				echo $error;
			}
		}
	}
	
	function getFacultyDetails($personId){
		$personId = htmlentities($personId);
		$personId = mysql_real_escape_string($personId);
		$sql = "select * from faculty where Person_Id='$personId'";
		//echo "$sql  <br/>";
		$query = mysql_query($sql);
		if($query === FALSE) {
			die(mysql_error());
			$error = "Not able to find the details";
			echo $error;
		}
		else{
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				$facultyDetails = new FacultyDetails();
				while($row = mysql_fetch_array($query)){
					$facultyDetails->setTitle($row["Title"]);
					$facultyDetails->setHireDate($row["Hire_Date"]);
					$facultyDetails->setDepartureDate($row["Departure_Date"]);
					$facultyDetails->setOfficeBuilding($row["Office_Building"]);
					$facultyDetails->setOfficeNumber($row["Office_Number"]);
					$facultyDetails->setOfficeHours($row["Office_Hours"]);
					$facultyDetails->setCurrentActivities($row["Current_Activities"]);
					$facultyDetails->setAdvisor($row["Advisor"]);
					$facultyDetails->setFacultyType($row["Faculty_Type"]);
				}
				$_SESSION["facultyDetails"]=$facultyDetails; // Initializing Session
			}
			else {
				$error = "Not able to find the details";
				echo $error;
			}
		}
	}
	
	function getStaffDetails($personId){
		$personId = htmlentities($personId);
		$personId = mysql_real_escape_string($personId);
		$sql = "select * from staff where Person_Id='$personId'";
		//echo "$sql  <br/>";
		$query = mysql_query($sql);
		if($query === FALSE) {
			die(mysql_error());
			$error = "Not able to find the details";
			echo $error;
		}
		else{
			$rows = mysql_num_rows($query);
			if ($rows > 0) {
				$staffDetails = new StaffDetails();
				while($row = mysql_fetch_array($query)){
					$staffDetails->setJobTitle($row["Job_Title"]);
					$staffDetails->setDivision($row["Division"]);
					$staffDetails->setHireDate($row["Hire_Date"]);
					$staffDetails->setDepartureDate($row["Departure_Date"]);
				}
				$_SESSION["staffDetails"]=$staffDetails; // Initializing Session
			}
			else {
				$error = "Not able to find the details";
				echo $error;
			}
		}
	}
	
	function getAdminDetails($personId){
		$personId = htmlentities($personId);
		$personId = mysql_real_escape_string($personId);
		$sql = "select * from admin where Person_Id='$personId'";
		//echo "$sql  <br/>";
		$query = mysql_query($sql);
		if($query === FALSE) {
			die(mysql_error());
			$error = "Not able to find the details";
			echo $error;
		}
		else{
			$rows = mysql_num_rows($query);
			if ($rows > 0){
				$adminDetails = new AdminDetails();
				while($row = mysql_fetch_array($query)){
					$adminDetails->setDesignation($row["Designation"]);
					$adminDetails->setJobLevel($row["Job_Level"]);
					$adminDetails->setOfficeBuilding($row["Office_Building"]);
					$adminDetails->setOfficeNumber($row["Office_Number"]);
					$adminDetails->setOfficeHours($row["Office_Hours"]);
				}
				$_SESSION["adminDetails"]=$adminDetails; // Initializing Session
			}
			else {
				$error = "Not able to find the details";
				echo $error;
			}
		}	
	}
	mysql_close($connection); // Closing Connection
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<?php
	if(isset($_SESSION["personDetails"])){
			$personDetailsDisplay  = $_SESSION["personDetails"];							
	?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php if($fromSearch == true) echo "AlumniBook - $personDetailsDisplay->FName $personDetailsDisplay->LName"; else echo " AlumniBook - Home";?></title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/functions.js"></script>
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
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
						<input type="text" name="search_name" id="search_name" value="<?php if($fromSearch == true) echo $personDetailsDisplay->getFName()." ".$personDetailsDisplay->getLName(); else echo 'Search By Name';?>"style="background-color: #ffffff; height: 90%; width: 500px;" onfocus="if(this.value == 'Search By Name') this.value='';" onblur="if(this.value.trim()== '') this.value = 'Search By Name';"></input><!--  </li> -->
					<!-- <li style="padding-left: 5px; padding-right: 0px;"> -->
						<input type="submit" value="Search" style="border-radius: 2px; width: 94px; background-color: darkorange; color: white;"></input></form></li>
					<li style="padding-left: 95px; padding-right: 0px;"><a href="">Edit Profile</a></li>
					<li style="padding-left: 10px; padding-right: 0px;"><a href="">De-Activate Profile</a></li>
					<li style="padding-left: 10px; padding-right: 0px;"><a href="">Logout</a></li>
				</ul>
			</div>
		</div>
		<div id="bottom-wrapper" style="width: 100%; display:; height: auto;">
			<div id="contentTable" class="contentTable" style="width: 100%;">
					<div id="contentTable1" class="contentTable1" style="width: 200px;">
					<div id="contentTable-Title" class="contentTable-Title">
					<?php if($fromSearch == false){ ?>
						<div id="left-div" class="contentTable-col" style="background-color: #aaa; border-top-left-radius:7px; border-top-right-radius:7px;">About me</div>
					<?php } elseif($fromSearch == true){?>
						<div id="left-div" class="contentTable-col" style="background-color: #aaa; border-top-left-radius:7px; border-top-right-radius:7px;">About <?php echo $personDetailsDisplay->getFName()." ".$personDetailsDisplay->getLName() ?></div>
					<?php } ?>
					</div>
					<div id="contentTable-row" class="contentTable-row">
						<div id="left-div1" class="contentTable-col"
							style="background-color: #aaa; border-bottom-left-radius:7px; border-bottom-right-radius:7px;">
							<ul style="text-align: left;">
								<li><?php echo "Univ ID.: ".$personDetailsDisplay->getUniversityIdNum(); ?></li>
								<li><?php echo "Contact No.: ".$personDetailsDisplay->getContactNumber(); ?></li>
								<li><?php echo "Email ID: ".$personDetailsDisplay->getEmailAddress(); ?></li>
	 								<?php
	 									$personDetailsDisplayValue = $personDetailsDisplay->getPersonType();
	 								?>
	 								<?php if($personDetailsDisplayValue == "Student"){
	 										if(isset($_SESSION["studentDetails"])){
	 											$studentPersonDetailsDisplay = $_SESSION["studentDetails"];
	 								?>
	 									<li><?php echo "Degree Earned: ".$studentPersonDetailsDisplay->getDegreeProgram(); ?></li>
	 										<?php if($studentPersonDetailsDisplay->getGraduated()==true){
	 													if(isset($_SESSION["alumniDetails"])){
	 														$alumniStudentDetailsDisplay = $_SESSION["alumniDetails"];	
	 														if(!empty($alumniStudentDetailsDisplay->getGraduationYear())){
	 										?>		
	 									<li><?php echo "Graduated in: ".$alumniStudentDetailsDisplay->getGraduationYear(); ?></li>
	 										<?php 		
	 														}
														}
 													}
 													else{
 														if(isset($_SESSION["nonAlumniDetails"])){
 															$nonAlumniStudentDetailsDisplay = $_SESSION["nonAlumniDetails"];
 															if(!empty($nonAlumniStudentDetailsDisplay->getDepartureDate())){
 											?>
 										<li><?php echo "Left UNCC: ".$nonAlumniStudentDetailsDisplay->getDepartureDate(); ?></li>
	 									<?php 				}
	 													}
 													}
	 											}
	 										}
	 									?>
	 								<?php
	 									if($personDetailsDisplayValue == "Faculty"){
	 										if(isset($_SESSION["facultyDetails"])){
	 											$facultyPersonDetailsDisplay = $_SESSION["facultyDetails"];
	 									?>
	 									<li><?php echo "Designation: ".$facultyPersonDetailsDisplay->getTitle(); ?></li>
	 										<?php if(!empty($facultyPersonDetailsDisplay->getDepartureDate()) && $facultyPersonDetailsDisplay->getDepartureDate()!='0000-00-00'){
	 										?>
	 										<li><?php echo "Left UNCC: ".$facultyPersonDetailsDisplay->getDepartureDate(); ?></li>
	 										<?php }
	 											  else{
	 										?>
	 										<li><?php echo "Office: ".$facultyPersonDetailsDisplay->getOfficeNumber()." in ".$facultyPersonDetailsDisplay->getOfficeBuilding(); ?></li>
	 										<li><?php echo "Hours: ".$facultyPersonDetailsDisplay->getOfficeHours(); ?></li>
	 										<?php }
	 										}
	 									}
	 								?>
	 								<?php 	if($personDetailsDisplayValue == "Staff"){
	 											if(isset($_SESSION["staffDetails"])){
	 												$staffPersonDetailsDisplay = $_SESSION["staffDetails"];
	 								?>
	 								<li><?php echo "Designation: ".$staffPersonDetailsDisplay->getJobTitle(); ?></li>
	 											<?php
	 												if(!empty($staffPersonDetailsDisplay->getDepartureDate()) && $staffPersonDetailsDisplay->getDepartureDate()!='0000-00-00'){
	 											?>
	 								<li><?php echo "In UNCC from ".$staffPersonDetailsDisplay->getHireDate()." to ".$staffPersonDetailsDisplay->getDepartureDate(); ?></li>
	 								<?php 			}
	 											}
	 										}
	 								?>
	 								<?php 
	 									if($personDetailsDisplayValue == "Admin"){
	 										if(isset($_SESSION["adminDetails"])){
	 											$adminPersonDetailsDisplay = $_SESSION["adminDetails"];
	 								?>
	 								<li><?php echo "Designation: ".$adminPersonDetailsDisplay->getDesignation(); ?></li>
	 								<li><?php echo "Level: ".$adminPersonDetailsDisplay->getJobLevel(); ?></li>
	 								<li><?php echo "Office: ".$adminPersonDetailsDisplay->getOfficeNumber()." in ".$adminPersonDetailsDisplay->getOfficeBuilding(); ?></li>
	 								<li><?php echo "Hours: ".$adminPersonDetailsDisplay->getOfficeHours(); ?></li>
	 								<?php 
	 										}
	 									}
	 								?>
								</ul>
						</div>
					</div>
				</div>
  					<?php
						}
  					?>
  			</div>
  			<div id="">
  			</div>
		</div>
	</div>
</body>
</html>