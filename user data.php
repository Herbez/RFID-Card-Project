<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="login/images/smart-id.png" rel="icon">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		
		</style>
		
		<title>Student RFID_Card</title>
	</head>
	
	<body>
	<h2 style="color: olive;">Student RFID_Card</h2>
		<ul class="topnav">
			<!-- <li><a href="index.php">Home</a></li> -->
			<li><a class="active" href="user data.php">Students Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Card</a></li>
			<li><a href="report.php">Attendance</a></li>
			<!-- <li id="logout"style="float: right; background-color: red; ">
			<a  href="login/logout.php">Logout</a></li> -->
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>Students Data Table</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>Name</th>
                      <th>Card ID</th>
					  <!-- <th>Gender</th> -->
					  <th>Class</th>
                      <!-- <th>Mobile Number</th> -->
					  <th >IMAGE</th>
					  <!-- <th>Laptop's Serial</th>
					  <th>Year of study</th> -->
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM table_the_iot_projects ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            // echo '<td>'. $row['year_of_study'] . '</td>';
							echo '<td>'. $row['class'] . '</td>';
							// echo '<td>'. $row['department'] . '</td>';
							echo '<td><img src="uploads/' . $row['photo'] . '" alt="Student Photo" style="width:50px; height:auto;"></td>';
							// echo '<td>'. $row['serial'] . '</td>';
							// echo '<td>'. $row['year'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>