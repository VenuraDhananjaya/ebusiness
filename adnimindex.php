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
if (isset($_POST['logout'])){
    session_destroy();
    header('location: login.php');
}
include('dbcon.php');
?>
	<div class="container">
    	<div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Hey Admin</div>

	                <div class="card-body">
						<a href="addproduct.php"><button class="btn btn-primary"> Add product</button></a>
						<a href="updateproduct.php"><button class="btn btn-primary	">Update Product</button></a>
						<a href="deleteproduct.php"><button class="btn btn-danger">Delete Product</button></a>
						<a href="vieworder.php"><button class="btn btn-primary">View Orders</button></a>
						<a href="logout.php"><button class="btn btn-default" name="logout">Logout</button></a>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>