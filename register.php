<?php
     session_start();
?>

<html>
    <head>
        <link href="css/style1.css" rel="stylesheet" type="text/css">
        <title>Registration|Dream Stich</title>
       
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
          
          <a href="login.php" class="nav-page" >Log In</a>       
        </div>        
        <div class="container">          
            <div class="row">
                <div class="col-12 center">
                    <div class="alert-success center" hidden>
                        <span class="close-btn-success" id="register_success"></span>
                        Successfully registered !<br><p class="small">Click <a href="login.php"><u>here</u></a> to login</p></div>
                </div>
                <div class="col-4 center">
                    <div class="card">                        
                        <center><h1>Register</h1></center>                        
                        <form action="register.php" method="POST" autocomplete="off" onsubmit="return check_pass()">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" id="user" name="user" placeholder="Username" required autocomplete="off" onfocus="alert_user_close()">                     
                                    <input type="password" id="pass1" name="pass1" placeholder="Password" required autocomplete="off" onchange="return check_pass()">
                                    <input type="password" id="pass2" name="pass2" placeholder="Retype password" required autocomplete="off" onchange="return check_pass()">
                                    <input type="email" name="email" placeholder="Email" required autocomplete="off"> 
                                    <hr>
                                    <select name="type" required>
                                        
                                        <option value="2" selected>Admin</option>
                                        <option value="1" selected>User</option>
                                    </select>
                                   
                                </div>
                                                                
                            </div>
                            <div class="col-12">
                                
                                
                                    <br>
                                    
                                    <div class="row" style="margin-top:0.8rem; margin-bottom:0.8rem;">
                                        <button name="btn_submit" id="btn_submit" type="submit" class="btn btn-blue btn-large btn-wide" onsubmit="btn_disable()">Register</button>
                                    </div>
                                    
                                    <div class="alert-fail" hidden>
                                        <span class="close-btn-fail" id="user_alert" onclick="alert_user_close()">&times;</span>
                                        Username already exists
                                    </div>
                                    
                                    <div class="alert-fail" hidden>
                                        <span class="close-btn-fail" id="pass_alert" onclick="alert_pass_close()">&times;</span>
                                        Passwords do not match
                                    </div>                                   
                                    
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
         <script>
            
            function alert_user_close(){
                user_alert.parentElement.style.display='none';
            }
             
            function alert_pass_close(){
                pass_alert.parentElement.style.display='none';
            }
             
            function check_pass(){
                var pass1 = document.getElementById("pass1").value;
                var pass2 = document.getElementById("pass2").value;
                
                if (pass1 != pass2 && pass2 != "" )
                {
                        pass_alert.parentElement.style.display='block';
                        return false;
                }
                else
                {
                        alert_pass_close();
                }
            }
             
            function btn_submit(){
                document.getElementById("btn_submit").disabled = true;
            }
            
        </script>
        <?php include("footer.php"); ?>


        <?php

            if(isset($_POST["btn_submit"]))
            {   
                $user = $_POST["user"];

                include("connection.php");
                $result = mysqli_query($con, "SELECT username FROM user_login WHERE username='$user'");

                if (mysqli_num_rows($result) == 1)
                {
                    echo "<script> user_alert.parentElement.style.display='block'; </script>";
                }
                else
                {
                    $pass = md5($_POST["pass1"]);
                    $email = $_POST["email"];
                    $type = $_POST["type"];
                    
                    
                    $result1 = mysqli_query($con, "INSERT INTO user_login(username, pw, type) VALUES('$user','$pass','$type')");
                    
                    
                    echo "<script> register_success.parentElement.style.display='block'; </script>";
                    
                    
                }

            }


        ?>

    </body>
</html>