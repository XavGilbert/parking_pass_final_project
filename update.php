<!DOCTYPE html>
<html lang = "en">
<!-- Authors: Xavier Gilbert
	 Date:04/14/2024
	 Filename:update.php
-->

	<head>

		<title>NCAT Parking Pass</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">

	</head>


	<body>
		<script>
			function validateForm() {
				var std_fname = document.forms["purchaseform"]["std_fname"].value;
				var std_lname = document.forms["purchaseform"]["std_lname"].value;
				var car_year = document.forms["purchaseform"]["car_year"].value;
				var car_make = document.forms["purchaseform"]["car_make"].value;
				var car_model = document.forms["purchaseform"]["car_model"].value;

				if (std_fname == "" || std_lname == "" || car_year.length !== 4 || car_make == "" || car_model == "") {
					alert("Please fill out all fields correctly.");
					return false;
				}

				return true;
			}
		</script>

	
	
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
		
<!--The main contains the primary contents of the website-->	
<!--Be sure to replace the file name at the top, and add name in the footer-->
			<main>
				<div id="form">
					<form class="form-grid" name="updateform" action="uresults.php" method=post onsubmit="return validateForm()">
						<fieldset>
							<legend>Update Student Information</legend>
							
							<label for="std_fname">First Name</label>
							<input type="text" name="std_fname" id="std_fname">

							<label for="std_lname">Last Name</label>
							<input type="text" name="std_lname" id="std_lname">
							
							<label for="Classification">What is your classification?</label>
							<select name="Classification" id="Classification">
						
								<option value="Freshman">Freshman</option>
							
								<option value="Sophomore">Sophomore</option>
							
								<option value="Junior">Junior</option>
							
								<option value="Senior">Senior</option>
							
							<!-- Include ukeyword as a hidden input field -->
							<input type="hidden" name="ukeyword" value="<?php echo isset($_POST['ukeyword']) ? $_POST['ukeyword'] : ''; ?>">
							
							</select>


					
					

                    
						</fieldset>
				
						<fieldset>
							<legend>Update Vehicle</legend>
							
							<label for="car_year">Year</label>
							<input type="text" name="car_year" id="car_year">
							
							<label for="car_make">Make</label>
							<input type="text" name="car_make" id="car_make">

							<label for="car_model">Model</label>
							<input type="text" name="car_model" id="car_model">
						
							<label for="pass_location">Location</label>
							<select name="pass_location" id="pass_location">
						
								<option value="P.Garage">Parking Garage</option>
							
								<option value="M.Campus">Main Campus</option>
							
								<option value="R.Halls">Resident Halls</option>
							
							
							</select>
						
							
						
							
						</fieldset>
					
						<input type="submit" id="submitForm" value="Submit" class="btn">
					</form>
				</div>
				
				
		
			</main>
		
			<footer>
				<p>Web page made by: Xavier Gilbert</p>
				<p><a href = "https://www.ncat.edu/">North Carolina A&T State University</a></p>
		
			</footer>
		
		</div>
		


	</body>



</html>