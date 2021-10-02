<?php include('partials/menu.php'); ?>

<div class="main-content">

    <div class="wrapper">


        <h1>Add Category</h1>

        <br> <br>

        <?php 
        
            if(isset($_SESSION['Add']))
            {
                echo $_SESSION['Add'];
                unset($_SESSION['Add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br> <br>

        <!-- Add Category Starts-->

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-70">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>

                </tr>
                 
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" > Yes
                        <input type="radio" name="featured" value="No" > No
                    </td>
                </tr>


                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" > Yes
                        <input type="radio" name="active" value="No" > No
                    </td>
                </tr>

                <tr>

                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn btn-secondary">
                    </td>
                    
                </tr>

            </table>


        </form>

        <?php 
        
            //Check if Submit button is clicked
            if(isset($_POST['submit']))
            {
                //1. Get Values from Category Form

                $title = $_POST['title'];

                //For radio input type, we need to check if the button is selected or not 
                if(isset($_POST['featured']))
                {
                    //Get the Value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set the default Value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    //Get the Value from form
                    $active =$_POST['active'];
                }
                else
                {
                    //Set the default Value
                    $active = "No";
                }

                //Check whether Image is selected or not and set the value for image name Accordingly
                //print_r($_FILES['image']);

                //die();//Break the code here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                    //To upload the image we need image name and source path and destination path 
                    $image_name = $_FILES['image']['name'];

                    //Auto rename Uploaded Image
                    //Get the extension of Image (JPG, PNG)
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination = "../images/category".$image_name;

                    //Finally Upload the image
                    $upload = move_uploaded_file($source_path, $destination);

                    //Check if image is uploaded or not
                    //if the image is not uploaded then we will stop the process and redirect with error message.
                    if($upload==false)
                    {
                        //Set session message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                        //redirect to Category Page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //Stop the process
                        die();
                    }
                }
                else
                {
                    //Dont Upload Image and set the image_name value as blank
                    $image_name = "";
                }

                //2. Create Sql Query to Insert data into Database
                $sql = "INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                ";

                //3. Execute the query and save in database

                $res = mysqli_query($conn, $sql);

                //Check if query is executed successfully and data added to category or not

                if($res==true)
                {
                    //Display success Message and redirect to manage category page
                    $_SESSION['Add'] = "<div class='success'>Category added successfully</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'/admin/manage-category.php');

                }
                else
                {
                    $_SESSION['Add'] = "<divclass='error'>Failed to Add Category</div>";
                     //redirect to manage category page
                     header('location:'.SITEURL.'/admin/add-category.php');
                }



            }
        
        
        ?>

        

        <!-- Add Category Ends-->


    </div>

</div>



<?php include('partials/footer.php'); ?>