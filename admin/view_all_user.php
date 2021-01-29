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
                  <div class="table1">
                     <table class="table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                           <tr>
                              <th>Id</th>
                              <th>Username</th>
                              <th>Firstname</th>
                              <th>Lastname</th>
                              <th>Email_id</th>
                              <th>Role</th>
                              <th>Image</th>
                              <th>Date</th> 
                              <th>Admin</th>
                              <th>Subscriber</th>

                              <th>Edit</th>
                              <th>Delete</th>
                             

                  <?php
                       $user_query="SELECT * FROM users";
                       $select_all_user_query=mysqli_query($connection,$user_query);

                       while($row=mysqli_fetch_assoc($select_all_user_query))
                       {

                          $user_id=$row['user_id'];                            
                          $username=$row['username'];
                          $user_firstname=$row['user_firstname'];
                          $user_lastname=$row['user_lastname'];
                          $user_email=$row['user_email'];
                          $user_role=$row['user_role'];
                          $user_status=$row['user_status'];  
                          $user_image=$row['user_image']; 
                          $user_date=$row['user_date'];

                              echo"<tr>";
                              echo "<td>{$user_id}</td>"; 
                              echo "<td>{$username}</td>"; 
                              echo "<td>{$user_firstname}</td>";
                              echo "<td>{$user_lastname}</td>";
                              echo "<td>{$user_email}</td>";  
                              echo "<td>{$user_role}</td>";

                              echo "<td><img src ='../images/$user_image'></td>";  
                                
                              echo "<td>{$user_date}</td>"; 
                              echo "<td><a href='view_all_user.php?change_to_admin={$user_id}'>Admin</td>";
                              echo "<td><a href='view_all_user.php?change_to_sub={$user_id}'>Subscriber</a></td>"; 
                              echo "<td><a href='edit_users.php?edit & u_id={$user_id}'>Edit</a></td>";
                                 

                                 // echo "<td><a href='edit_post.php?edit & p_id={$post_id}'>Edit</a></td>";

                              echo "<td><a onclick=\"javascript:return confirm('are you sure you want to delete')\" href='view_all_user.php?delete={$user_id}'>Delete</a></td>";
                              echo"<tr>";
     
                              
                       }  


                        ?>  
                         </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                     </table>
                  </div>



                  <?php 
                            
                             
                                if (isset($_GET['edit_user']))

                                {

                                  
                                  header("location:edit_users.php");
                                } 
                                ?>  







                    <!-- delete post -->
      

                <?php 
                            
                         if (isset($_GET['delete']))
                                {
                                    $delete_id = $_GET['delete'];

                                $delete_user_query = "DELETE FROM users WHERE user_id={$delete_id}";
                                    $delete__user = mysqli_query($connection, $delete_user_query);
                                   
                                    header("location:view_all_user.php");
                                }
                                ?>  
    


                   <?php 
                                //approved
                             if (isset($_GET['change_to_admin']))
                                {
                                    $the_user_id = $_GET['change_to_admin'];

                                    $admin_query = "UPDATE users SET user_role='Admin' WHERE user_id={$the_user_id}";
                                    $change_admin_query = mysqli_query($connection, $admin_query);
                                   
                                    header("location:view_all_user.php");
                                } ?>



                                 <?php 
                                //Unapproved
                             if (isset($_GET['change_to_sub']))
                                {
                                    $the_user_id = $_GET['change_to_sub'];

                                    $sub_query = "UPDATE users SET user_role='Subscriber' WHERE user_id={$the_user_id}";
                                    $change_sub_query = mysqli_query($connection, $sub_query);
                                   
                                    header("location:view_all_user.php");
                                } ?>

                    <!-- edit new -->
               </div> 
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
      </div>
      <?php include "includes/adminfooter.php"; ?>