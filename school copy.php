<!DOCTYPE html>
<html>
	<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	</head>
	<body>

	<ul class="nav nav-pills navbar-fixed-top">
		  <li role="presentation" class="active"><a href="home.php">Home</a></li>
		  <li role="presentation" class="active"><a href="collegeList.php">College Directory</a></li>
		  <li role="presentation" class="active"><a href="schoolList.php">School Directory</a></li>
	</ul>

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

	$schoolId = $_GET['id'];
	$schoolname = $_GET['name'];
	//echo $schoolname;

	?>

	<div class="jumbotron">
		  <h1><?php echo $schoolname ?></h1>
		  <p>...</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>
	
	
	<?php


	$query = "SELECT * FROM students ";
	
	$query .= "WHERE students.schoolId='{$schoolId}'";

	
	$result = mysqli_query($conn, $query);
	if(!$result) {
		die("Database query failed.");
	}
	
	
	?>

	<div class="results">
		<?php
		while($row = mysqli_fetch_assoc($result)) { //increments pointer

			?>
			<p class="all <?php echo $row['collegeId'] ?> <?php echo str_replace(' ', '', $row['major']) ?>">
				<?php 
				echo "Name: " . $row['name'] . " ";
				echo "College: " . $row['college'] ." ";
				echo "School: " .$row['school']."  ";
				echo "Major: " .$row['major']." ";
				echo "Batch: " . $row['year']." <br> ";
			?>
			<button>
				<a href="message.php?student=<?php echo $row['name'] ?>">Connect</a>
			</button></p>	
		<?php	
		}	
		?>
	</div>

	
	<select id="collegeMenu" style="float:right; width:150px">
		
		<option value="all">All Colleges</option>
		<?php
	
		$query = "SELECT * FROM college ";
		
		$result = mysqli_query($conn, $query);
		if(!$result) {
			die("Database query failed.");
		}
		
	    while($row = mysqli_fetch_assoc($result)) {
	    	//echo "Name: " . $row['name'] . " ";
	    ?>

	    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>      
	    <?php

	    }
   		?>
   </select>

   <select id="majorMenu" style="float:right; width:150px">
		
		<option value="majors">All Majors</option>
		<?php
	
		$query = "SELECT * FROM major ";
		
		$result = mysqli_query($conn, $query);
		if(!$result) {
			die("Database query failed.");
		}
		
	    while($row = mysqli_fetch_assoc($result)) {
	    	//echo "Name: " . $row['name'] . " ";
	    ?>

	    <option value="<?php echo str_replace(' ', '', $row['name']) ?>"><?php echo $row['name'] ?></option>      
	    <?php

	    }
   		?>
   </select>

   <script>
  
		$("#collegeMenu").change(function(){
		
			if(this.value == "all"){
				$(".all").show();
			} else {
				$("p:not(." + this.value + ")").hide();	
				$("." + this.value).show();			 
			}	   
		}).change();
	
		$("#majorMenu").change(function(){
		
			if(this.value == "majors"){
				$(".all").show();
			} else {
				$("p:not(." + this.value + ")").hide();	
				$("." + this.value).show();			 
			}	   
		}).change();
	
   </script>
	


	 <?php
	 	//4. release data
	 	mysqli_free_result($result);
	 ?>
	
	
	
	</body>
</html>

<?php

	mysqli_close($conn);

?>

