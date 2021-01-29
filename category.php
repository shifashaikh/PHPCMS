<?php
 $connection = mysqli_connect('localhost','root','','cms');
if ($connection)
{
  // echo "we are connected";
}

?>

<?php include "includes/header.php"?>


  <!--Navigation  -->
<?php include "includes/navigation.php"?>
<!-- navigation // -->



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                  <?php

                       if(isset($_GET['category']))                           
                          {

                           $category = $_GET['category'];

                            // echo "<h1> $category</h1>";

                         }
                    
                     $query= "SELECT * FROM posts WHERE post_catergory_id= $category";
                      
                     $select_all_post_query=mysqli_query($connection,$query);
                      

                     while($row=mysqli_fetch_assoc($select_all_post_query))
                     {
                        
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image']; 
                        $post_content=substr($row['post_content'],0,150); 

                        
                        ?>   



                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!--  Blog Posts -->


              <h2>
                  <!-- displaying post by id -->
                    <a href="post.php?post_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <!-- ****** -->
                <?php  
                     }  
                ?>
                 <!-- ****** -->         
                </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
             <!-- footer -->
       <?php include "includes/footer.php" ?>
             <!-- footer//s -->