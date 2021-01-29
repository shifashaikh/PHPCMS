 <?php include"db.php"?>
  <!-- Navigation -->
   <?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Start Bootstrap</a> -->
                <a class="navbar-brand" >ADMIN</a>
                <!-- <a href="admin">ADMIN</a>-->      
           </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="font-weight-bold;">
                      
                       <?php
                       $query = "SELECT * FROM categories";
                       $select_all_cat_query = mysqli_query($connection,$query);
                       while($row=mysqli_fetch_assoc($select_all_cat_query)){
                       
                             $cat_title=$row['cat_title'];
                             echo "<li><a href='#'>{$cat_title}</a></li>";
                       }
                      ?>





<!-- nooootttt working -->
                      <?php
                        if (isset($_SESSION['user_role'])) 
                        {
                          if (isset($_GET['p_id'])) {

                           $id= $_GET['p_id'];
                   echo "<li>
                <a href='admin/admin_post.php?source=edit_post.php?source=edit&p_id={$id}'>Edit Posts</a>
                    </li>";
                          }
                        }
                      ?>
                     
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                    <!-- displaying dynamic data from database in navbar -->
                   
                      <!-- /////////navbar////// -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>