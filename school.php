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
			<div  class="all <?php echo $row['collegeId'] ?> <?php echo str_replace(' ', '', $row['major']) ?>">
	
			<div class="row">
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">

						<h3><?php echo "Name: " . $row['name']?></h3>
						<p><?php echo "College: " . $row['college'] ?></p>
						<p><?php echo "School: " .$row['school'] ?></p>
						<p><?php echo "Major: " .$row['major'] ?></p>
						<p><?php echo "Batch: " . $row['year'] ?></p>
	    				<p><a href="message.php?student=<?php echo $row['name'] ?>"
	    					class="btn btn-primary" role="button">Enter</a> </p>
	    		</div>	
      		  </div>
      		</div>
			
			</div>	
		<?php	
		}	
		?>
	</div>

	
	<select class="form-control" id="collegeMenu" style="width:400px; margin-bottom:100px;">
		
		<option value="all">All Colleges</option>
		<?php
	
		$query = "SELECT * FROM college ";
		
		$result = mysqli_query($conn, $query);
		if(!$result) {
			die("Database query failed.");
		}		
	    while($row = mysqli_fetch_assoc($result)) {
	    ?>

	    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>      
	    <?php

	    }
   		?>
   </select>

   <select class="form-control" id="majorMenu" style="width:400px; margin-bottom:100px;">
		
		<option value="majors">All Majors</option>
		<?php
		$query = "SELECT * FROM major ";
		
		$result = mysqli_query($conn, $query);
		if(!$result) {
			die("Database query failed.");
		}		
	    while($row = mysqli_fetch_assoc($result)) {
	    ?>
	    <option value="<?php echo str_replace(' ', '', $row['name']) ?>"><?php echo $row['name'] ?></option>      
	    <?php
	    }
   		?>
   </select>

   <script>
  
		$("#collegeMenu").change(function(){
			if(this.value == "schools"){
				$(".all").show();
	  		} else {
			    $('.all').hide();
			    $('.' + $(this).val()).show();
			}    
		 });
	
		$("#majorMenu").change(function(){
			if(this.value == "majors"){
				$(".all").show();
			} else {
				$('.all').hide();
				$('.' + $(this).val()).show();
			}	   
		});
	
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

