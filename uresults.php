<?php 
	require 'dbproject_connect.php';
	// retrieve all variables
	$keyword = @$_POST["ukeyword"];
	$fname = @$_POST["std_fname"];
	$lname = @$_POST["std_lname"];
	$classification = @$_POST["Classification"];
	$year = @$_POST["car_year"];
	$make = @$_POST["car_make"];
	$model = @$_POST["car_model"];
	$location = @$_POST["pass_location"];





	// update information to database
	$sql="UPDATE students SET std_fname = '$fname', std_lname = '$lname', Classification = '$classification'   WHERE std_ID = (SELECT Owner_ID FROM parking_pass WHERE Pass_number = '$keyword')";
	$result=mysqli_query($conn, $sql);

	$sql="UPDATE car SET car_year = '$year', car_make = '$make', car_model = '$model'   WHERE LicensePlate = (SELECT plate_num FROM parking_pass WHERE Pass_number = '$keyword')";
	$result=mysqli_query($conn, $sql);
					
	$sql="UPDATE parking_pass SET pass_location = '$location' WHERE Pass_number = '$keyword'";
	$result=mysqli_query($conn, $sql);



	mysqli_close($conn);
?>
<html lang = "en">
<!-- Authors: Xavier Gilbert
	 Date:04/14/2024
	 Filename:uresults.php
-->

	<head>

		<title>NCAT Parking Pass</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">


	</head>


	<body>
		<div id = "container">
			<header>
				<h1>Update Pass</h1>
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
				<h3>Your pass has been updated</h3>
			</main>
			
		</div>
		
		<footer>
			<p>Web page made by: Xavier Gilbert</p>
			<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		</footer>
	</body>
	
	
</html>
