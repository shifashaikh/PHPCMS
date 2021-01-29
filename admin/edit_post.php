<?php include "includes/adminheader.php";?>
<?php include "includes/adminheader1.php";?>
<?php require "includes/db.php";?>
<?php require "function.php";?>


<style>
  image{
         height: 400px;
         width: 800px;
  }
</style>
    <div id="wrapper">
        <!-- Navigation -->
       <?php include "includes/adminnavigation.php";?>
        <div id="page-wrapper">

            <div class="container-fluid">

            </div>
            <!-- /.container-fluid -->
        </div>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Post 



         
                        </h1>





<!-- edit qurey -->
 <?php 
if(isset($_GET['p_id'])){
	$the_post_id = $_GET['p_id'];
}
             $query="SELECT * FROM posts where post_id = $the_post_id";
                       $select_post_by_id = mysqli_query($connection,$query);

                       while($row=mysqli_fetch_assoc($select_post_by_id))
                       {

                          $post_id=$row['post_id'];                            
                          $post_author=$row['post_author'];
                          $post_title=$row['post_title'];
                          $post_catergory_id=$row['post_catergory_id'];
                          $post_content=$row['post_content'];  
                          $post_status=$row['post_status'];
                          $post_image=$row['post_image'];
                          $post_tags=$row['post_tags']; 
                          $post_comments_count=$row['post_comments_count'];
                          $post_date=$row['post_date']; 
                           } 

                       if(isset($_POST['update_post']))
                       {
                          $post_author=$_POST['post_author'];
                          $post_title=$_POST['post_title'];
                          $post_catergory_id=$_POST['post_catergory_id'];
                          $post_content=$_POST['post_content'];  
                          $post_status=$_POST['post_status'];

                         
                          $post_image=$_FILES['post_image']['name'];        
                          $post_image_temp=$_FILES['post_image']['tmp_name'];

                          $post_tags=$_POST['post_tags']; 
                          $post_comments_count=$_POST['post_comments_count'];
                          $post_date=$_POST['post_date'];

                            move_uploaded_file($post_image_temp,"../images/$post_image");

                         $query1=" UPDATE posts SET ";                         
                         $query1.="post_author ='{$post_author}',";
                         $query1.="post_title ='{$post_title}',";
                         $query1.="post_catergory_id ='{$post_catergory_id}',";
                         $query1.="post_content ='{$post_content}',";
                         $query1.="post_status ='{$post_status}',";
                         $query1.="post_image ='{$post_image}',";
                         $query1.="post_tags ='{$post_tags}',";
                         $query1.="post_comments_count ='{$post_comments_count}',";
                         $query1.="post_date = now()";
                         $query1.="WHERE post_id={$the_post_id}";


                                    $update_query=mysqli_query($connection,$query1);
                                   
                                    if(!$update_query)
                                    {
                                      die("Update not  working").mysql_error($connection);
                                    }
                                    else
                                    {
                                    		echo "<p class='bg-success'>Post Successfully Updated.
                                        <a href='admin_post.php'>View Post</a></p>";


                                    }

                       }
                       ?>
                     
<!-- edit query -->

                        <div class="col-xs-6">                         
                           <form action="" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
							    <label for="formGroupExampleInput">Add Author :</label> 
							    <input type="text" name="post_author" class="form-control" id="formGroupExampleInput" value="<?php echo $post_author; ?>" placeholder="Input Author">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Add Title:</label>  
							    <input type="text" name="post_title" class="form-control" id="formGroupExampleInput2"  value="<?php echo $post_title; ?>" >
							  </div>
                             <div class="form-group">
							    <label for="formGroupExampleInput">Add Category Id:</label>


							    <select name="post_catergory_id" class="form-control"  id="" >
							    	
							    	<?php
 
                        $query = "SELECT * FROM categories";

									    $select = mysqli_query($connection, $query);

									    while ($row = mysqli_fetch_assoc($select))
									    {
									        $cat_id = $row['cat_id'];
									        $cat_title = $row['cat_title'];
									        echo "<option value='{$cat_id}'>{$cat_title}</option>";

                                       }
                                    ?>

							    </select>

							

                   <div class="form-group">
                  <label for="formGroupExampleInput2">Add Content:</label>
              <input type="text" name="post_content" style="width: 500px; height: 150px;" class="form-control" id="formGroupExampleInput2" value="<?php echo $post_content; ?>" placeholde5=" ">
                </div>
  
                <div class="form-group">

                   <label for="formGroupExampleInput">Add Status:</label>

                <div class="form-group">
                  <select name="post_status" class="form-control" type="text" id="">

                    <option value=""><?php echo $post_status ; ?></option>
                       <?php

                      if ($post_status=="Publish") {
                        echo "<option value='Draft'>Draft</option>"; 
                      }
                      else
                      {
                         echo "<option value='Publish'>Published</option>";
                      }
                       ?>
                  </select>
                </div>
                </div>

							    <div class="form-group">
							    	<label for="post_image">Post Image</label>
							    	<input type="file" name="post_image"  value="<?php echo $post_image; ?>">
							    </div>
							   
							  <div class="form-group">
							    <label for="formGroupExampleInput">Add Tags:</label>  
							    <input type="text" name="post_tags" class="form-control" id="formGroupExampleInput" >
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Add Comment:</label>
							    <input type="text" name="post_comments_count" class="form-control" id="formGroupExampleInput2" value="<?php echo $post_comments_count; ?>">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Date :</label>
							    <input type="text" id="start" name=" post_date" value="<?php echo $post_date; ?>"  class="form-control" >
							  </div>
								<div>
              <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
               </div>
								</div>
					</form>
				</div>    
    
				</div>  
                    </div>
                </div>
            <!--     row -->
            </div>
           <!--  .container-fluid -->
        </div>
           

        <?php include "includes/adminfooter.php"; ?>
