<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('img/background.jpg');">
	<div class="container">
    	<div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Add a Product</div>
	                	<div class="container">
							<?php
								session_start(); 
								   
								if(!isset($_SESSION['admin'])){
								    header('location: login.php');
								}


								include('dbcon.php');
								if (!$db) {
								    die("Connection failed: ".mysqli_connect_error());
								}

										$query = "SELECT * FROM orders ORDER BY id ; ";
								$result = mysqli_query($db, $query);

								$qq = mysqli_num_rows($result);

								if ($qq > 0 ){
									echo "<table class='table table-striped' style='margin-top:10px;'>
											<tr>
												<th>Order ID</th>
												<th>User Name</th>
												<th>Mobile</th>
												<th>Address</th>
												<th>Payment Method</th>
												<th>Product ID</th>
											</tr>";
									while ($row = mysqli_fetch_assoc($result)){
										$orderid=$row['id'];
										$name=$row['user_name'];
										$mobile=$row['mobile'];
										$address=$row['address'];
										$pay_type = $row['pay_type'];
										$product_id= $row['product_id'];

										
										


										echo "<tr>
												<td>".$orderid."</td>
												<td>".$name."</td>
												<td>".$mobile."</td>
												<td>".$address."</td>
												<td>".$pay_type."</td>
												<td>".$product_id."</td>
											</tr>";

									}

									echo "</table><br>";

								}
								else{
									echo "There is no orders yet";
								}
							?>
							<br><br>
							<a href="adnimindex.php"><button class="btn btn-primary" name="add">Go Back</button></a><br><br>
							<a href="logout.php"><button class="btn btn-default" name="add">Logout</button></a><br><br>

						</div>
					</div>
				</div>
			</div>
		</div>

</body>
</html>