<?php
    include_once 'database.php';
    session_start();
    if(isset($_SESSION["email"]))
	{
		session_destroy();
    }
    
    $ref=@$_GET['q'];
    if(isset($_POST['submit']))
	{	
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripslashes($email);
        $email = addslashes($email);
        $password = stripslashes($password); 
        $password = addslashes($password);

        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
        
        $result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            session_start();
            if(isset($_SESSION['email']))
            {
                session_unset();
            }
            $_SESSION["name"] = 'Admin';
            $_SESSION["key"] ='admin';
            $_SESSION["email"] = $email;
            header("location:dashboard.php?q=0");
        }
        else
        {
            echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
            header("refresh:0;url=admin.php");
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | Online Quiz System</title>
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/form.css">
    <style type="text/css">
        body {
            width: 100%;
            background: url(image/exam-3.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <section class="login first grey">
        <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="box-wrapper">
                <div class="box box-border">
                    <div class="box-body">
                        <a href="index.php" align="right">&times;</a>
                        <center>
                            <h5 style="font-family: Noto Sans;">Login to </h5>
                            <h4 style="font-family: Noto Sans;">Admin Page</h4>
                        </center><br>
                        <form method="post" action="admin.php" enctype="multipart/form-data" id='form'>
                            <div class="form-group">
                                <label>Enter Your Email Id:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="fw">Enter Your Password:
                                </label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button class="btn btn-primary btn-block" name="submit">Login</button><br>
                            <div class="form-group text-right">
                                <a href="index.php" class="btn btn-primary btn-block">Close</a>
                            </div>
                        </div>
                    <div id="cls" target="index.php">

                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- <div class="center"> -->
    <!-- <input type="checkbox" id="show"> -->
    <!-- <label for="show" class="show-btn">View Form</label> -->
    <!-- <div class="container">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        <div class="text">
            Login Form
        </div>
        <form action="#">
            <div class="data">
                <label>Email or Phone</label>
                <input type="text" required>
            </div>
            <div class="data">
                <label>Password</label> 
                <input type="password" required>
            </div>
            <div class="forgot-pass">
                <a href="#">Forgot Password?</a>
            </div>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit">login</button>
            </div>
            <div class="signup-link">
                Not a member? <a href="#">Signup now</a>
            </div>
        </form>
    </div>
    </div> --> 





    <script src="js/jquery.js"></script>
    <script src="scripts/bootstrap/bootstrap.min.js"></script>
</body>

</html>