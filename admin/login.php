<?php include('../config/constants.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  -  Food Order System</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    
    <div class="login">

        <h1 class="text-center">Login</h1>
        <br> <br>

        <?php 
        
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        
        ?>

        <br>  <br>

            <!--  Login Form Starts Here-->

            <form action="" method="POST" class="text-center">

                username: <br>
                <input type="text" name="username" placeholder="Enter username"> <br>
                <br>
                password: <br>
                <input type="password" name="password" placeholder="Enter Password"> <br>
                <br>
                <input type="submit" name="submit" value="Login" class="btn-primary"> <br>

            </form>
            <br> <br>

        <p class="text-center">Created by <a href="#">Inspireme Media Network</a> </p>    
    </div>


</body>
</html>


<?php 

    // Check if the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //echo "clicked";
        //1. Get the data from Login Form

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. sql to check if username and password exist

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        // Execute the Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //Count rows to check if user exist

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available display success message redirect to manage admin page
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username; // This is to Check if user is Loggedin or Not, and Logout will unset it
            
            //Redirect to HomePage
            header('location:'.SITEURL.'admin/');

        }
        else
        {
            //display error message and redirect to login page
            $_SESSION['login-fail'] = "<div class='error'>Login Failed</div>";
            //Redirect to Login Page
            header('location:'.SITEURL.'admin/login.php');

        }

    }


?>