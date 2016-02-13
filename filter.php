<!DOCTYPE html>
<html>
	<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	
	</head>
	<body>
	

	<?php 

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	$dbname = "website";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(mysqli_connect_errno()) {
		die("Database connection failed: " . 
			mysqli_connect_error() .
			"(" . mysqli_connect_errno() . ")"
		);
		
	}
	

	//2. perform query

	$collegeId = $_GET['id'];
	$schoolname = $_GET['name'];
	
	
	?>

	
	<?php
	
	$query = "SELECT * FROM students ";
		
	$query .= "WHERE students.collegeId ='{$collegeId}'";
	$query .= "AND students.school ='{$schoolname}'";

	
	$result = mysqli_query($conn, $query);
	if(!$result) {
		die("Database query failed.");
	}
	
	//3. use returned data
	
	while($row = mysqli_fetch_assoc($result)) { //increments pointer

		echo "Name: " . $row['name'] . " ";	
		echo "college: " . $row['college'] ."  ";
		echo "school: " .$row['school']."  ";
		echo "major: " .$row['major']."  ";
		echo "year: " . $row['year']."  ";
		echo "<hr />";
		
	}	
	?>

	</body>
</html>

<?php

	mysqli_close($conn);

?>