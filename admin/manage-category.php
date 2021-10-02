<?php include('partials/menu.php'); ?> <!-- include files for menu navigation --> 

<div class="main-content">

    <div class="wrapper">

        <h2>Manage Category</h2>

        <br> <br>

        <?php 
        
            if(isset($_SESSION['Add']))
            {
                echo $_SESSION['Add'];
                unset($_SESSION['Add']);
            }
    
        ?>

        <br />

            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

            <br />
            <br />

            <table class="tbl-full">

                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <tr>

                    <td>1.</td>
                    <td>Lucky Benjamin</td>
                    <td>LuckyBenjamin</td>
                    <td>
                       <a href="#" class="btn-secondary">Update Admin</a>
                       <a href="#" class="btn-danger">Delete Admin</a>
                    </td>

                </tr>


                <tr>

                    <td>2.</td>
                    <td>Lucky Benjamin</td>
                    <td>LuckyBenjamin</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>

                </tr>


                <tr>

                    <td>3.</td>
                    <td>Lucky Benjamin</td>
                    <td>LuckyBenjamin</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger">Delete Admin</a>
                    </td>

                </tr>

            </table>

    </div>
    
</div>

<?php include('partials/footer.php') ?> <!--include files for footer --> 

