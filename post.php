<?php require "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


  <!--Navigation  -->
<?php include "includes/navigation.php" ?>
<!-- navigation // -->
    <!-- Page Content -->
    <style>
  image{
         height: 400px;
         width: 800px;
  }
</style>
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                  <?php
if (isset($_GET['p_id']))
{

    $the_post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts where post_id = $the_post_id";

    $select_all_post_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_post_query))
    {

        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

?>   
               

                <!--  Blog Posts -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
                <hr>
                <!-- ****** -->
                <?php
    }
}

?>
                 <!-- ****** --> 


                 <!-- comments on post -->

                        <?php

if (isset($_GET['p_id']))
{

    $the_comment_id = $_GET['p_id'];





    if (isset($_POST['create_comment']))
    {
       
        $the_comment_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        // if (!empty($comment_author)&&!empty($comment_email)&&!empty($comment_content)) 
        // {
           
            $insert_comment = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";

            $insert_comment .= "VALUES($the_comment_id,'{$comment_author}','{$comment_email}','{$comment_content}','Unpproved',now())";

            $create_comment_query = mysqli_query($connection, $insert_comment);

            if (!$create_comment_query)
            {
                die('Query failed' . mysqli_error());
            }

            // increment of comment count query
            $comment_count = "UPDATE posts SET post_comments_count= post_comments_count + 1  WHERE post_id = $the_comment_id";

            // SEND Query to update comment count
            $add_count = mysqli_query($connection, $comment_count);
            if (!$add_count)
            {
                die(' update comment not working' . mysql_error());
            }

        }
    
    }
  


?>
                         
                         <!--  comments-->
                                   <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  action=" " method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                           <input type="text"  class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="Email-id">Email-id</label>
                       <input type="email"  class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="Email-id">Your Comment:</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment"class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

 <?php
// display comments
if (isset($_GET['p_id']))
{

    $the_post_id = $_GET['p_id'];
    $display_comments = "SELECT * FROM comments WHERE comment_post_id={$the_post_id} AND comment_status='Approved' ORDER BY comment_id DESC";

    $select_comment_query = mysqli_query($connection, $display_comments);
    if (!$select_comment_query)
    {
        die('Query failed' . mysql_error());
    }

    while ($row = mysqli_fetch_assoc($select_comment_query))

    {
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];

?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>.
                    </div>
                </div>
<?php
    }
} ?>
               
                </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
             <!-- footer -->
       <?php include "includes/footer.php" ?>
             <!-- footer//s -->
