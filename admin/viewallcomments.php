<!DOCTYPE html>
<html>
   <head>
      <style>
         body{background-color: white;}
         img{border:0;height:25px !important;width:50px !important}
         button a{
          color: white;
         }
      </style>

      <?php include "includes/adminheader.php"; ?>
      <?php include "includes/adminheader1.php"; ?>
     <?php require "includes/db.php";?>
      <?php require "function.php"; ?>
      <div id="wrapper">
      <!-- Navigation -->

      <?php include "includes/adminnavigation.php" ?> 
      <div id="page-wrapper">
         <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
               <div class="col-lg-6">
                <button type="submit" name="add_post" class="btn btn-lg btn-primary"><a href="insert_post.php">Add New</a></button>

                
                <br>
                <br>
                  <div class="table1">
                     <table class="table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                           <tr>
                              <th>Id</th>
                              <th>Author</th>
                              <th>Comments</th>
                              <th>E-mail</th>
                              <th>Status</th>
                              <th>In Response To</th>
                               <th>Date</th> 
                              <th>Approve</th>
                              <th>Unapprove</th> 
                              <th>Delete</th> 

                  <?php
                       $query="SELECT * FROM comments";
                       $select_all_post_query=mysqli_query($connection,$query);

                       while($row=mysqli_fetch_assoc($select_all_post_query))
                       {

                          $comment_id=$row['comment_id'];                            
                          $comment_post_id=$row['comment_post_id'];
                          $comment_author=$row['comment_author'];
                          $comment_status=$row['comment_status'];
                          $comment_content=$row['comment_content'];
                          $comment_email=$row['comment_email'];    
                          $comment_date=$row['comment_date'];

                              echo"<tr>";
                              echo "<td>{$comment_id}</td>"; 
                              echo "<td>{$comment_author}</td>"; 
                              echo "<td>{$comment_content}</td>";
                              echo "<td>{$comment_email}</td>";
                              echo "<td>{$comment_status}</td>";  
                             

                              $query_title="SELECT * FROM posts WHERE post_id=$comment_post_id";

                              $select_post_id=mysqli_query($connection,$query_title);

                              while($row=mysqli_fetch_assoc($select_post_id))
                             {

                                   $post_id =$row['post_id'];
                                   $post_title =$row['post_title'];
                                   echo "<td><a href ='../post.php?p_id=$post_id'>$post_title</td>";
                            }

                              echo "<td>{$comment_date}</td>";

                              echo "<td><a href='viewallcomments.php?approve={$comment_id}'>Approve</td>";

                            
                              echo "<td><a href='viewallcomments.php?Unapprove={$comment_id}'>Unapprove</a></td>";

                               echo "<td><a href='viewallcomments.php?delete={$comment_id}'>Delete</a></td>";
                               

                              echo"<tr>";
     
                              
                       }  


                        ?>  
                         </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                     </table>
                  </div>
                    <!-- delete post -->
       

                  <?php 
                            
                         if (isset($_GET['delete']))
                                {
                                    $delete_id = $_GET['delete'];
                                    
                                $delete_comment_query = "DELETE FROM comments WHERE comment_id={$delete_id}";
                                    $delete__query = mysqli_query($connection, $delete_comment_query);
                                    header("location:viewallcomments.php");
                                }
                                ?>   
    

                   <?php 
                                //Unapproved
                             if (isset($_GET['approve']))
                                {
                                    $approve_id = $_GET['approve'];

                                    $approved_query = "UPDATE comments SET comment_status='Approved' WHERE comment_id={$approve_id}";
                                    $approvequery = mysqli_query($connection, $approved_query);
                                   
                                    header("location:viewallcomments.php");
                                } ?>



                                 <?php 
                                //Unapproved
                             if (isset($_GET['Unapprove']))
                                {
                                    $unapprove_id = $_GET['Unapprove'];

                                    $unapproved_query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id={$unapprove_id}";
                                    $approvequery = mysqli_query($connection, $unapproved_query);
                                   
                                    header("location:viewallcomments.php");
                                } ?>

                    <!-- edit new -->
               </div> 
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
      </div>
      <?php include "includes/adminfooter.php"; ?>