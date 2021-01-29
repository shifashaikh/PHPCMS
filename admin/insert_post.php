<?php include "includes/adminheader.php";?>
<?php include "includes/adminheader1.php";?>
<?php require "includes/scripts.js"?>
<?php require "includes/db.php";?>
<?php require "function.php";?>




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
                            Add Post                    
                        </h1>

<!-- SELECT -->

  <?php

             $query="SELECT * FROM posts";
                       $select_all_post_query=mysqli_query($connection,$query);
                       while($row=mysqli_fetch_assoc($select_all_post_query))
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
                       ?>
<!-- SELECT -->



<?php
  

   if(isset($_POST['create_post'])) 
   {
	                               
  $post_author=$_POST['post_author'];
  $post_title=$_POST['post_title'];
  $post_catergory_id=$_POST['post_catergory_id'];
  $post_content=$_POST['post_content'];  
  $post_status=$_POST['post_status'];

  $post_image=$_FILES['post_image']['name'];        
  $post_image_temp=$_FILES['post_image']['tmp_name'];

  $post_tags=$_POST['post_tags']; 
  $post_date=$_POST['post_date'];


    move_uploaded_file($post_image_temp,"../images/$post_image");
		       
		  $create_post ="INSERT INTO posts (post_author,post_title,post_catergory_id,post_content,post_status,post_image,post_tags,post_date) ";
		      
             $create_post .="VALUES('{$post_author}','{$post_title}','{$post_catergory_id}','{$post_content}','{$post_status}','{$post_image}','{$post_tags}',now())"; 
		             

	  $create_post_query = mysqli_query($connection, $create_post);  



  if (!$create_post_query) 
                    {
                    	echo "not working";
                    }else
                    {
                    
                    echo "<p class='bg-success'>Post Created.</p>";
                    
                    }
		  }
?>
            <div class="col-xs-6">                         
               <form action="" method="POST" enctype="multipart/form-data">
                 <div class="form-group">
							    <label for="formGroupExampleInput">Add Author :</label> 
							    <input type="text" name="post_author" class="form-control" id="formGroupExampleInput" placeholder="Input Author">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Post Title:</label>  
							    <input type="text" name="post_title" class="form-control" id="formGroupExampleInput2" placeholder=" Input Title">
							  </div>
                            
							      <div class="form-group">
							    <label for="formGroupExampleInput">Add Category Id:</label>
							    <select name="post_catergory_id" class="form-control"  placeholder="select category" id="" >
							    	<option value=""></option> 
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

							  </div>
              

          <div class="form-group">
            <label for="formGroupExampleInput2" >Add Content:</label>
              <input type="text" maxLength="100" name="post_content" style="width: 500px; height: 150px;" class="form-control" id="formGroupExampleInput2" placeholder="">
                </div>            
							  <div class="form-group">
			                   <label for="formGroupExampleInput">Add Status:</label>
			                  <select name="post_status" type="text" id="">
                          <option value="Draft"> </option> 
			                    <option value="Published">Published</option>  
                           <option value="Draft">Draft</option> 
			                  </select>
			                </div>
							  
							    <div class="form-group">
							    	<label for="post_image">Post Image</label>
							    	<input type="file" name="post_image">
							    </div>
							   
							  <div class="form-group">
							    <label for="formGroupExampleInput">Add Tags:</label>  
							    <input type="text" name="post_tags" class="form-control" id="formGroupExampleInput" placeholder="Add Tags">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Add Comment:</label>
							    <input type="text" name="post_comments_count" class="form-control" id="formGroupExampleInput2" placeholder="Add Comment">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Date :</label>
							    <input type="text" id="start" name=" post_date" value="2020-01-22" class="form-control" min="2020-01-01" max="2040-12-31">
							  </div>
								<div>
		                            <div class="form-group">
		                                <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
		                             </div>
								</div>
					</form>
				
				</div>    
    
				</div>  
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
           

        <?php include "includes/adminfooter.php"; ?>
