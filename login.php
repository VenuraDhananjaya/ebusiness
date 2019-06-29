<?php
session_start();
//     if(isset($_SESSION['user'])){
//     header('location: user/mypro.php');
// }
if (isset($_POST['logout'])){
    session_destroy();
    header('location: ../login.php');
}
      
?>

<html>
    <head>
        <link href="css/style1.css" rel="stylesheet" type="text/css">
        <title>Login | Dream Stich! </title>
         <style>
            body {
            background-attachment: fixed;
            background-position:0;
            background-repeat: no-repeat;
            background-size: cover;
          }
        </style>
        
    </head>    
    <body class="font" >        
        <div class="nav-fixed">
        
          <a href="register.php" class="nav-page" >Register</a>       
        </div>        
        <div class="container">
            <br><br>
            <div class="row">                
                <div class="col-4 center">                    
                    <div class="card">                        
                        <center><h1>Log In</h1></center> 
                        <form action="login.php" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <input type="text" name="user" placeholder="Username" required>
                                        <input type="password" name="pass" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="padding-top:0.8rem;"> 
                                <center>
                                    
                                    <div class="row" style="margin-top:0.8rem; margin-bottom:0.8rem;">
                                        <button name="btn_submit" type="submit" class="btn btn-blue btn-large btn-wide">Log In</button>
                                    </div>
                                    <div class="alert-fail" hidden>
                                        <span class="close-btn-fail" id="user_alert" onclick="alert_login_close()">&times;</span>
                                        Username and/or password is incorrect
                                    </div>
                                    
                                   
                                    <br><br>
                                    Do not have an account? <a class="mute" href="register.php"><u>Register</u> </a>
                                </center>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            
            function alert_login_close(){
                user_alert.parentElement.style.display='none';
            }

            
        </script>
        <?php include("footer.php"); ?>
        
        <?php
        
        if(isset($_POST["btn_submit"])){
        $user = $_POST["user"];
        $pw = md5($_POST["pass"]);
                
        include("dbcon.php");
        $result = mysqli_query($db, "SELECT * FROM user_login WHERE username='$user' AND pw='$pw'");
        $row13 = mysqli_fetch_assoc($result);
        $type = $row13['type'];
        if (mysqli_num_rows($result) == 1){
            if ($type==2)
            {
            $_SESSION['admin'] = $user;
            header('location:adnimindex.php');
            }

            else{
                $_SESSION['user'] = $user;
                header('location:addproduct.php');
                }
        }
        else{
            header('location:register.php');
        }
            
        }
    ?>
    </body>
</html>

