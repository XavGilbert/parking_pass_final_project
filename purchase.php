<?php 
require 'dbproject_connect.php';
// retrieve all variables
$fname = @$_POST["std_fname"];
$lname = @$_POST["std_lname"];
$stdID = @$_POST["std_ID"];
$classification = @$_POST["Classification"];
$year = @$_POST["car_year"];
$make = @$_POST["car_make"];
$model = @$_POST["car_model"];
$licenseplate = @$_POST["License_Plate"];
$location = @$_POST["pass_location"];





// insert information to database


$sql="INSERT INTO students VALUES('$fname', '$lname', '$classification','$stdID')";
$result=mysqli_query($conn, $sql);

$sql="INSERT INTO car VALUES('$year','$make','$model','$licenseplate')";
$result=mysqli_query($conn, $sql);

$sql="INSERT INTO $tblname(pass_location, plate_num, owner_ID) VALUES('$location', '$licenseplate', '$stdID')";
$result=mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<html lang = "en">
<!-- Authors: Xavier Gilbert
	 Date:02/29/2024
	 Filename:template.html
-->

	<head>

		<title>NCAT Parking Pass</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">


	</head>


	<body>
		<div id = "container">
			<header>
				<h1>Purchase Pass</h1>
				<a href="index.html"><img src="images/ncatlogo.webp" alt="North Carolina A&T State University Logo"></a>
		
			</header>
		
			<nav>
				<ul>
					<li><a href = "index.html">Home</a></li>
					<li><a href = "purchase.html">Purchase</a></li>
					<li><a href = "manage.php">Manage</a></li> 
					<li><a href = "search.html">Search</a></li> 
					<li><a href = "delete.html">Delete</a></li> 
				</ul>
			</nav>
			
			<main>
				<h3>Your pass has been added to the database</h3>
			</main>
			
		</div>
		
		<footer>
			<p>Web page made by: Xavier Gilbert</p>
			<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		</footer>
	</body>
	
	
</html>
