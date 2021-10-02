<?php 

    //Authorization or Access Control
    //Check whether user is loggedin or not

    if(!isset($_SESSION['user'])) //If user Session is not Set
    {

        //If User is not logged in
        //Redirect to Login Page with Message
        $_SESSION['no-login-message'] = "<div class='error'>Please Log in to Admin Panel</div>";
        //Redirect to Login Page
        header('location:'.SITEURL.'admin/login.php');

    }

?>
