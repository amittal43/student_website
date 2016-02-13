<!DOCTYPE html>
<html>
	<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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

	?>

	<?php
		$name = $college = $school = $major = $year = "";
		$name = $_POST['name'];
		$college = $_POST['college'];
		$major = $_POST['major'];
		$school = $_POST['school'];
		$year = $_POST['year']; 
		
	?>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="form-group">
	    <label>Name</label>
	    <input type="text" class="form-control" placeholder="Name" name="name">
	  </div>
	  <div class="form-group">
	    <label>College</label>
	    <input type="text" class="form-control"  placeholder="College" name="college">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputSchool1">School</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="School" name="school">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputMajor1">Major</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Major">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <!-- <div class="form-group">
	    <label for="exampleInputFile">File input</label>
	    <input type="file" id="exampleInputFile">
	    <p class="help-block">Example block-level help text here.</p>
	  </div> -->
	  <div class="checkbox">
	    <label>
	      <input type="checkbox"> Check me out
	    </label>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>


	<?php	
		echo $name . "<br />";
		echo $college . "<br />";
		echo $school . "<br />";		
		echo $major . "<br />";
		echo $year . "<br />";

	if(isset($_POST['submit']) && isset($_POST['college'])){
		//echo $college;
		$query = "SELECT * FROM college ";
		$query .= "WHERE college.name ='{$college}'";

		$result = mysqli_query($conn, $query);

		// while($row = mysqli_fetch_assoc($result)) {
	
		// 	echo "Name: " . $row['name'];
		// }

		if(!$result) {
			die("Database query failed.");
		}

		if(mysqli_num_rows($result) == 0){
			echo "Adding new college";
		} else {
			echo "college exists";
		}
	}	

	?>


	</body>
</html>