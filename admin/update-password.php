<?php include('partials/menu.php'); ?>

    <div class="main-content">

        <div class="wrapper">

            <h1>Change Password</h1>
            <br> <br>

            <?php  
            
               if(isset($_GET['id']))
               {
                   $id = $_GET['id'];
               }
            

              
            ?>

            <form action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td class="form-label">Current Password:</td>
                        <td> <input  class="form-control"  type="password" name="current_password" placeholder="current password"> </td>
                    </tr>

                    <tr>
                        <td class="form-label">New Password:</td>
                        <td>  <input class="form-control"  type="password" name="new_password" placeholder="new password"> </td>
                    </tr>

                    <tr>
                        <td class="form-label">Confirm Password:</td>
                        <td>  <input class="form-control" type="password" name="confirm_password" placeholder="confirm password"> </td>
                    </tr>
                
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
        
        </div>

    </div>
            
    <?php 
    
        if(isset($_POST['submit']))
        {
            //echo "$current_password";

            //1 Get Data from Form
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //2. Check whether the user with the current ID and current password exist or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            // 3. Execute the Query
            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                //check whether data exist or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                       //That means user exist and password can be changed
                       //echo "<div class='alert alert-success d-flex align-items-center' role='alert'>User Found</div>";
                       //Check if new password and confirm password match
                       if($new_password ==$confirm_password)
                       {
                           //Then Update Password
                           $sql2 = "UPDATE tbl_admin SET
                                password = '$new_password'
                                WHERE id=$id
                           ";

                           //Execute the query

                            $result = mysqli_query($conn, $sql2);

                        
                            // Check if query is executed
                            if($result==true)
                            {
                                //Show Success Message
                                $_SESSION['password-changed'] = "<div class='alert alert-success d-flex align-items-center' role='alert'>Password Changed Successfully</div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                            else
                            {
                                //Show failed message
                                $_SESSION['password-not-changed'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>Failed to Change Password</div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }

                       }
                       else
                       {
                            // Send message Password does not match
                            $_SESSION['password-not-matched'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>Password Does not Match</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                       }

                }
                else
                {
                        //User does not exist Set message and Redirect
                        $_SESSION['user-not-found'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>User Does Not Exist</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            
           
        }
    
    ?>

<?php include('partials/footer.php'); ?>