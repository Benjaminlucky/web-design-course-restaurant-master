<?php include('partials/menu.php'); ?>


    <!--Main Content Section start Here -->

    <div class="main-content">

        <div class="wrapper">
            

            <h2>Manage Admin</h2>

            <br> <br>

            <?php 
            
            if(isset($_SESSION['add']))
            {
               echo $_SESSION['add'];  // Display session Message
               unset($_SESSION['add']); //Remove Session Message
            }

            if(isset($_SESSION['delete']))
            {
                //Display Delete Admin Success Message
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }


            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['password-not-matched']))
            {
                echo $_SESSION['password-not-matched'];
                unset($_SESSION['password-not-matched']);
            }

            if(isset($_SESSION['password-not-changed']))
            {
                echo $_SESSION['password-not-changed'];
                unset($_SESSION['password-not-changed']);
            }

            if(isset($_SESSION['password-changed']))
            {
                echo $_SESSION['password-changed'];
                unset($_SESSION['password-changed']);
            }

            ?>

            <br>  <br>

            <!-- Button to Add Admin-->

            <br />

            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br />
            <br />

            <table class="tbl-full">

                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>


                <?php 

                    // query to get all Admin                
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute the Query 
                    $res=mysqli_query($conn, $sql);

                    //Check whether the query is executed or not

                    if($res==TRUE)
                    {
                        //Count Rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //function to get rows in database

                        $sn=1; //Create a variable and Assign the value

                        //check the numbers of rows
                        
                        if($count>0)
                        {
                            //We have data in database
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                //Using while loop to get all the data from database
                                //While loop will run as long as we have data in database

                                //Get Individual data

                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username = $rows['username'];

                                //Display the values in our table

                                ?>

                                <tr>

                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>

                                    </tr>

                                <?php 

                            }
                        }
                        else
                        {
                            //We do not have data in database
                        }

                    }
                
                ?>

               
            </table>
           
        </div>
        
       
    </div>


    <!-- Main Content Section Ends Here-->

 <?php include('partials/footer.php'); ?>