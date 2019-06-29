<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('img/background.jpg');">
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
							<form action="updateproduct.php" method="POST" enctype="multipart/form-data" onsubmit="return update()">
								<div class="form-group">
								<label>ID</label>
								<input type="number" name="id" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Size</label>
								<input type="text" name="size" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Price</label>
								<input type="number" name="price" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Days to produce</label>
								<input type="number" name="numdays" class="form-control" required>
								</div>
								<div class="form-group">
								<label>Image</label>
								<input type="file" name="fileToUpload" class="form-control" required>
								</div>
								<div class="form-group">
								<button type="submit" class="btn btn-primary" name="update">Update Product</button>
								</div>
							</form>
							<a href="adnimindex.php"><button class="btn btn-default">Go Back</button></a><br><br>
							<a href="logout.php"><button class="btn btn-default" name="add">Logout</button></a><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	
if (!$db) {
    die("Connection failed: ".mysqli_connect_error());
}

	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$size=$_POST['size'];
		$price=$_POST['price'];
		$days=$_POST['numdays'];
		$fileToUpload = ($_FILES['fileToUpload']['name']);

		$sql="UPDATE products SET name='$name',size='$size', price='$price', days='$days', image='$fileToUpload' WHERE id='$id'";

		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$image = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		mysqli_query($db,$sql);


	}
	?>

</body>
</html>