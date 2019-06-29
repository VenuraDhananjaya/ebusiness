<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/script.js"></script>

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
							<form action="addproduct.php" method="POST" enctype="multipart/form-data" onsubmit="return addproduct()">
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
								<button class="btn btn-primary" name="add">Add Product</button>
								</div>
							</form>
							<div class="form-group">
							<a href="adnimindex.php"><button type="submit" class="btn btn-default" name="add">Go back</button></a><br><br>
							<a href="logout.php"><button class="btn btn-default" name="add">Logout</button></a><br><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$db = mysqli_connect($server,$username,$password,$dbname);;
if (!$db) {
    die("Connection failed: ".mysqli_connect_error());
}

if (isset($_POST['add'])) {
	$name = ($_POST['name']);
	$size = ($_POST['size']);
	$price = ($_POST['price']);
	$numdays = ($_POST['numdays']);
	$fileToUpload = ($_FILES['fileToUpload']['name']);

	$sql2="INSERT INTO products(name,size,days,price,image) values ('$name','$size','$numdays','$price','$fileToUpload');";

	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



	$image = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


	$sql=mysqli_query($db, $sql2);
}


?>

