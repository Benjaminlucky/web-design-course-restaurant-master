<?php include('partials/menu.php'); ?>

    <!--Main Content Section start Here -->

    <div class="main-content">

        <div class="wrapper">

            <h2>DASHBOARD</h2>

            <br>  <br>

            <?php 
        
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        
            ?>

        <br> <br>

            <div class="col-4 text-center">

                <h1>5</h1>
                <br>
                categories

            </div>


            <div class="col-4 text-center">

                <h1>5</h1>
                <br>
                categories

            </div>


            <div class="col-4 text-center">

                <h1>5</h1>
                <br>
                categories

            </div>


            <div class="col-4 text-center">

                <h1>5</h1>
                <br>
                categories

            </div>

            <div class="clearfix"></div>

        </div>
        
       
    </div>


    <!-- Main Content Section Ends Here-->
<?php include('partials/footer.php'); ?>