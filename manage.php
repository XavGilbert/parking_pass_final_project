
<html lang = "en">
<!-- Authors: Xavier Gilbert
	 Date:02/29/2024
	 Filename:template.html
-->

	<head>

		<title>NCAT Parking Pass</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		
		<style>
        /* CSS styles for the table */
        .parking-pass-table {
            border-collapse: collapse;
            width: 100%;
        }

        .parking-pass-table th, .parking-pass-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .parking-pass-table th {
            background-color: #f2f2f2;
        }
    </style>


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
				<div id="form">
					<form id ="update-form" class="form-grid" action="update.php" method=post>
						<fieldset>
							<legend>Update Parking Pass</legend>
							
							<h3>Enter the pass number of the pass you want to update:</h3>
							<label for="ukeyword">Key Word:</label>
							<input name="ukeyword" type="text" size="50" maxlength="50" />
							
							<input type="submit" id="submitForm" value="Submit" class="btn">
						</fieldset>
					</form>
			
			
			
			
				<div id="parking_pass_entries">
					<h2>Parking Pass Entries</h2>
					<table class="parking-pass-table">
						<thead>
							<tr>
								<th>Pass Number</th>
								<th>Location</th>
								<th>License Plate Number</th>
								<th>Owner ID</th>
								<th>Year</th>
								<th>Make</th>
								<th>Model</th>
								<th>Owner First Name</th>
								<th>Owner Last Name</th>
								<th>Classification</th>
								<!-- Add more table headers for additional columns if needed -->
							</tr>
						</thead>
						<tbody>
							<?php
								require 'dbproject_connect.php';

								// Query to select all entries from the parking_pass table
								$sql = "SELECT * FROM parking_pass";
								$result = mysqli_query($conn, $sql);

								// Check if there are any rows returned
								if (mysqli_num_rows($result) > 0) {
									// Loop through the rows and display each entry in a table row
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>" . $row["Pass_number"] . "</td>";
										echo "<td>" . $row["Pass_location"] . "</td>";
										echo "<td>" . $row["plate_num"] . "</td>";
										echo "<td>" . $row["owner_ID"] . "</td>";
										
										// Fetch car information from the car table based on plate_num
										$car_sql = "SELECT car_year, car_make, car_model FROM car WHERE LicensePlate = '" . $row["plate_num"] . "'";
										$car_result = mysqli_query($conn, $car_sql);
										
										// Check if car data is found
										if (mysqli_num_rows($car_result) > 0) {
											$car_row = mysqli_fetch_assoc($car_result);
											echo "<td>" . $car_row["car_year"] . "</td>";
											echo "<td>" . $car_row["car_make"] . "</td>";
											echo "<td>" . $car_row["car_model"] . "</td>";
										} else {
											echo "<td colspan='3'>Car data not found</td>";
										}
										
										// Fetch student's first name and last name from the students table
										$student_sql = "SELECT std_fname, std_lname, Classification FROM students WHERE Std_ID = '" . $row["owner_ID"] . "'";
										$student_result = mysqli_query($conn, $student_sql);
										
										// Check if student data is found
										if (mysqli_num_rows($student_result) > 0) {
											$student_row = mysqli_fetch_assoc($student_result);
											echo "<td>" . $student_row["std_fname"] . "</td>";
											echo "<td>" . $student_row["std_lname"] . "</td>";
											echo "<td>" . $student_row["Classification"] . "</td>";
										} else {
											echo "<td colspan='2'>Student data not found</td>";
										}
										
										// Add more table cells for additional columns if needed
										
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan='9'>No parking pass entries found.</td></tr>";
								}

								// Close the database connection
								mysqli_close($conn);
							?>


						</tbody>
					</table>
				</div>
			
			
			</main>
			
		</div>
		
		<footer>
			<p>Web page made by: Xavier Gilbert</p>
			<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		</footer>
	</body>
	
	
</html>