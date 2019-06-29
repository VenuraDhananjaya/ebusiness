<?php


session_start();

include 'db_conn.php';

$msg="";

 if(mysqli_connect_error())
 {
 	echo"oops";
 	die('Connect Error ('.mysqli_connect_errno() .') '. mysqli_connect_error());
 }


 else
 	 {
		if (isset($_POST['regBtn']))
		 {
		 	 $_SESSION['username']=$_POST['username'];
		 	 $_SESSION['email']=$_POST['email'];

		 	 $uname= $_SESSION['username'];
		 	 $email= $_SESSION['email'];
		 	 $pwd=$_POST['password'];
		 	 $re_pwd=$_POST['rpwd'];

		 	 $EncryptPassword = md5($pwd);


		 	 $filename=$_FILES['image']['name'];
		 	 $filetmp=$_FILES['image']['tmp_name'];


		 	
      		 $image=move_uploaded_file($filetmp,"imgStore/$filename");

		 	 $sql="insert into userregistration(username,email,password) values('$uname','$email','$EncryptPassword')";

		 	 $sql2="insert into images(user,filename,image) values ('$email','$filename','$image')";


		 }

			if($conn -> query($sql) && ($conn -> query($sql2)))
			{
        		$_SESSION['msg']='Registration succesful.';
				 header("Location: error.php");
  			 exit;
			}
			else
			{
				
        		$_SESSION['msg']='An eror ocurred during registration.';
				 header("Location: error.php");
			}


	}

$conn ->close();
?>
