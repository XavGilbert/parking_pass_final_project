<?php 
require 'dbproject_connect.php';
// retrieve all variables
$keyword = @$_POST["dkeyword"];



// insert information to database


$sql="DELETE FROM students WHERE std_ID = (SELECT Owner_ID FROM parking_pass WHERE Pass_number = '$keyword')";
$result=mysqli_query($conn, $sql);

$sql="DELETE FROM car WHERE LicensePlate = (SELECT plate_num FROM parking_pass WHERE Pass_number = '$keyword')";
$result=mysqli_query($conn, $sql);

$sql="DELETE FROM parking_pass WHERE Pass_number = '$keyword'";
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
				<h1>Search Pass</h1>
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
				<h3>Delete Successful</h3>
			</main>
			
		</div>
		
		<footer>
			<p>Web page made by: Xavier Gilbert</p>
			<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		</footer>
	</body>
	
	
</html>