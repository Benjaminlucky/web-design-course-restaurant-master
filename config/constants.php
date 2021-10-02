<?php 

    //Start Session

    session_start();

    //Create Constants to store non repeting values
    define('SITEURL', 'http://localhost/web-design-course-restaurant-master/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Syndicate123!');
    define('DB_NAME', 'food-order');

    //3 Execute the query and save data in database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Database Connection

    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database

?>