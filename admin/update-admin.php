<?php  include('partials/menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
    
            <h1>Update Admin</h1>

            <br> <br>

            <?php 
            
                //1. Get the ID of selected admin
                    $id=$_GET['id'];
                //2. Create SQL Query to get the Details

                    $sql =  "SELECT * FROM tbl_admin WHERE id=$id";

                //3. Execute Query 
                    $res = mysqli_query($conn, $sql); 

                //Check if Query is Executed
                    if($res==true)
                    {
                        //Check whether the data is avalaible or not
                        $count = mysqli_num_rows($res);
                        //Check Whether we have admin data or not
                        if($count==1)
                        {
                            //Get the Details 
                            //echo "Admin Avalaible";
                            $row=mysqli_fetch_assoc($res);

                            //$id = $row['id'];
                            $full_name = $row['full_name'];
                            $username = $row['username'];
                        }
                        else
                        {
                            //Redirect to Manage Admin Page
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }

            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>


                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

      </div>  

</div>

<?php 

   //check if submit button is clicked or not
    if(isset($_POST['submit'])){
        //echo "Button Clicked";
        // Get all the Values from form to update
       $id = $_POST['id'];
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];

       //Create SQL Query to update Admin

       $sql = "UPDATE tbl_admin SET
       full_name = '$full_name',
       username = '$username'
       WHERE id='$id'
       ";

       //Excute the Query
       $res = mysqli_query($conn, $sql);

       //Check whether the query is executed successfully or not
       if($res==true)
       {
           //Query Executed and Admin Updated 
           $_SESSION['update'] = "<div class='alert alert-success d-flex align-items-center' role='alert'>Admin Updated Successfully</div>";
           
           //Redirect to Manage-admin.php Page
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else
       {
            // Failed to update Admin
            $_SESSION['update'] = "<div class='error'>admin Failed to Update</div>";

            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
       }
    }

?>

<?php include('partials/footer.php'); ?>