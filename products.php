<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('img/background.jpg');">
							<?php


								include('dbcon.php');
								if (!$db) {
								    die("Connection failed: ".mysqli_connect_error());
								}

										$query = "SELECT * FROM products; ";
								$result = mysqli_query($db, $query);

								$qq = mysqli_num_rows($result);

								if ($qq > 0 ){
									echo "<table class='table table-striped' style='margin-top:10px;'><tr>";
									$start = 0;
									while ($row = mysqli_fetch_assoc($result)){
										$image=$row['image'];
										
										


										echo "<td style='height: 200px; width: 200px;'><img style='width: 200px; height: 200px;' src='img/".$image."'></td>";
										$start ++;

										if ($start == 5 ){
											echo "</tr><tr>";
											$start = 0;
										}

									}

									echo "</tr></table><br>";

								}
								else{
									echo "There is no products yet stay tuned";
								}
							?>


</body>
</html>