<?php 
require 'dbproject_connect.php';
// retrieve all variables
$keyword = @$_POST["keyword"];



// insert information to database


$sql="SELECT * FROM parking_pass WHERE pass_number = '$keyword'";
$result=mysqli_query($conn, $sql);

// Initialize a variable to hold the HTML output
$output = "";

// check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Build the HTML output
        $output .= "<p>Pass Number: " . $row["Pass_number"] . "</p>";
        $output .= "<p>Pass Location: " . $row["Pass_location"] . "</p>";
		$output .= "<p>License Plate: " . $row["plate_num"] . "</p>";
		$output .= "<p>Student ID: " . $row["owner_ID"] . "</p>";
		
        // Add more fields as needed
    }
} else {
    $output = "0 results"; // if no results found
}


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
            <?php echo $output; ?>
			</main>
			
		</div>
		
		<footer>
			<p>Web page made by: Xavier Gilbert</p>
			<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		</footer>
	</body>
	
	
</html>
	