<?php include "includes/adminheader.php";?>
<?php include "includes/db.php";?>

    <div id="wrapper">

      <?php
          // if ($connection) {
          // echo "<h1>connection sucessful </h1>";
          // }
          // else{
          //   echo "<h1>connection unsucessful </h1>";
          // }
      ?>
        <!-- Navigation -->
       <?php include "includes/adminnavigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>

                      
                    </div>
                </div>
                <!-- /.row -->
                        
            
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                  <?php
                      $query="SELECT * FROM posts";
                      $select_all_post=mysqli_query($connection,$query);
                     $post_counts=mysqli_num_rows($select_all_post);

                       echo "<div class='huge'>$post_counts</div>";
                  ?>
                      <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="admin_post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                      <?php
                      $query="SELECT * FROM comments";
                      $select_all_comments=mysqli_query($connection,$query);
                     $comments_counts=mysqli_num_rows($select_all_comments);

                       echo "<div class='huge'>$comments_counts</div>";
                  ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="viewallcomments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                         <?php
                      $query="SELECT * FROM comments";
                      $select_all_users=mysqli_query($connection,$query);
                     $users_counts=mysqli_num_rows($select_all_users);

                       echo "<div class='huge'>$users_counts</div>";
                  ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="view_all_user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                 <?php
                      $query="SELECT * FROM categories";
                      $select_all_cat=mysqli_query($connection,$query);
                     $cat_counts=mysqli_num_rows($select_all_cat);

                       echo "<div class='huge'>$cat_counts</div>";
                  ?>

                <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

    </div>

</div>
                <!-- /.row -->
<!-- draft posts -->




<?php

$query="SELECT * FROM posts WHERE post_status='Draft'";
  $select_all_draft_post=mysqli_query($connection,$query);
  $post_draft_counts=mysqli_num_rows($select_all_draft_post);

?>

<!-- unapproved comments-->
<?php

$query="SELECT * FROM comments WHERE comment_status='Unapproved'";
  $select_all_Unapproved_comments=mysqli_query($connection,$query);
  $Unapproved_comments_counts=mysqli_num_rows($select_all_Unapproved_comments);

?>


<!-- display subscribers -->
<?php

$query="SELECT * FROM users WHERE user_role='subscriber'";
  $select_all_subscriber=mysqli_query($connection,$query);
  $subscriber_counts=mysqli_num_rows($select_all_subscriber);

?>
<!-- published post -->

<?php

$query="SELECT * FROM posts WHERE post_status='Published'";
  $select_published_post=mysqli_query($connection,$query);
  $published_counts=mysqli_num_rows($select_published_post);

?>

<!-- // -->
  <div class="row"> 
   <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            // graph using javascript
            <?php
                                      
    $element_text = ['All Post','Active Posts','Draft posts','Comments','Pending comments','Users','Subscribers','Categories'];       
    $element_count = [$post_counts,$published_counts,$post_draft_counts,$comments_counts,$Unapproved_comments_counts,$users_counts,$subscriber_counts,$cat_counts];


    for($i =0;$i < 8; $i++) {
    
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
     
    
    
    }
   ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
                   
                   
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
                    
                    
                    
                    
                </div>

  

            </div>
            <!-- /.container-fluid -->

        </div>



        <?php include "includes/adminfooter.php";?>















