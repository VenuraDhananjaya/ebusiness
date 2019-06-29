<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin-top: 5%; background-image: url('img/background.jpg');">
	<?php
	session_start(); 
	   
	if(!isset($_SESSION['admin'])){
	    header('location: login.php');
	}
	include('dbcon.php');
	?>
	<div class="container">
    	<div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Add a Product</div>
	                	<div class="container">
	                		<div class="card-body">
	                			<div class="row">
		                			<div class="col-md-6">
			                			<?php
			                				$query = "SELECT * FROM products ORDER BY id ; ";
											$result = mysqli_query($db, $query);

											$qq = mysqli_num_rows($result);

											if ($qq > 0 ){
												echo "<table class='table table-striped' style='margin-top:10px;'>
														<tr>
															<th>Product ID</th>
															<th>Name</th>
															<th>Size</th>
														</tr>";
												while ($row = mysqli_fetch_assoc($result)){
													$product_id=$row['id'];
													$name=$row['name'];
													$size=$row['size'];

													echo "<tr>
															<td>".$product_id."</td>
															<td>".$name."</td>
															<td>".$size."</td>
														</tr>";

												}

												echo "</table><br>";

											}
											else{
												echo "There are no products yet";
											}
			                			?>
		                			</div>
		                			<div class="col-md-6">
										<form action="deleteproduct.php" method="POST">
											<div class="form-group">
											<label>ID</label>
											<input type="number" name="id" class="from-control">
											</div>
											<div class="form-group">
											<button class="btn btn-primary" name="delete">Delete Product</button>
											</div>
										</form>
										<div class="form-group">
										<a href="adnimindex.php"><button class="btn btn-default" name="delete">Go Back</button></a><br><br>
										<a href="logout.php"><button class="btn btn-default" name="add">Logout</button></a><br><br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<?php
if (!$db) {
    die("Connection failed: ".mysqli_connect_error());
}

		if(isset($_POST['delete'])){
			$id=$_POST['id'];

			$sql="DELETE FROM products WHERE id='$id'";
			mysqli_query($db,$sql);

			header('location: deleteproduct.php');
		}
	?>

</body>
</html>