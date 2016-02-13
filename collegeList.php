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

		<div class="jumbotron">
		  <h1>Colleges</h1>
		  <p>...</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>



	<?php  	
	  	
		  	$query = "SELECT * FROM college ";
					
			$result = mysqli_query($conn, $query);
			if(!$result) {
				die("Database query failed.");
			}

		
			while($row = mysqli_fetch_assoc($result)) { //increments pointer
			
		?>
			
			<div class = "colleges">
			<div class="row">
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
		    	<img src="<?php echo $row['image'] ?>"/>
     			<div class="caption">
					<h3><?php echo "Name: " . $row['name']?></h3>
					<p>...</p>
    				<p><a href="college.php?id=<?php echo $row['id']?>&name=<?php echo $row['name'] ?>"
    					class="btn btn-primary" role="button">Enter</a> </p>
      			</div>
				</div>
			  </div>
			</div>
			  <?php
				}	
			?>
			</div>


		

	</body>	
	
</html>

