<?php include "includes/adminheader.php";?>
<?php include "includes/adminheader1.php";?>
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
                            Add Users                   
                        </h1>

<?php
  

   if(isset($_POST['create_user'])) 
   {
 
                                                 
                          $username=$_POST['username'];
                          $password=$_POST['password'];
                          $user_firstname=$_POST['user_firstname'];

                         $user_lastname=$_POST['user_lastname'];

                          $user_email=$_POST['user_email'];
                          $user_role=$_POST['user_role']; 

						                        
						  $user_image=$_FILES['user_image']['name'];        
						  $user_image_temp=$_FILES['user_image']['tmp_name'];


                          $user_date=$_POST['user_date'];

                         move_uploaded_file($user_image_temp,"../images/$user_image");


		       
         $user_query = "INSERT INTO users(username,password,user_firstname,user_lastname,user_email,user_role,user_image,user_date)";
		      
        $user_query .= "VALUES('{$username}','{$password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}','{$user_image}',now())"; 
		             

		      $create_user_query = mysqli_query($connection, $user_query);  

		      if (!$create_user_query) 
		                        {
		                        	echo "not working";
		                        }
		                        else
		                        {
		                        	  	echo "<p class='bg-success'>User Created.
		                        	  	<a href='view_all_user.php'>View Users</p>";


		                        }


		  }

		                        
       
?>
                        <div class="col-xs-6">                         
                           <form action="" method="POST" enctype="multipart/form-data">

                             <div class="form-group">
							    <label for="formGroupExampleInput">Add Username :</label> 
							    <input type="text" name="username" class="form-control" id="formGroupExampleInput">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Add Password:</label>  
							    <input type="text" name="password" class="form-control" id="formGroupExampleInput2">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput2">First Name:</label>
							    <input type="text" name="user_firstname" class="form-control" id="formGroupExampleInput2">
							  </div>
                              <div class="form-group">
							    <label for="formGroupExampleInput">Last Name:</label>
							    <input type="text" name="user_lastname" class="form-control" id="formGroupExampleInput">
							  </div>
							  <div class="form-group">
							    <label for="formGroupExampleInput">Email Id:</label>
							    <input type="email" name="user_email" class="form-control" id="formGroupExampleInput" >
							  </div>


							    <div class="form-group">
							    	<label for="user_image">User Image</label>
							    	<input type="file" name="user_image">
							    </div>
							   
							  <div class="form-group">
							    
							    <select name="user_role" type="text" id="">
							        <option value="subscriber">Select Options</option>
							    	<option value="admin">Admin</option>
							    	<option value="subscriber">Subscriber</option>
							    </select>

							  </div>
							  
							  <div class="form-group">
							    <label for="formGroupExampleInput2">Date:</label>
							    <input type="text" id="start" name="user_date" value="2020-01-22" class="form-control" min="2020-01-01" max="2040-12-31">
							  </div>
							  <!--  <div class="form-group">
							    <label for="formGroupExampleInput">RantSalt:</label>  
							    <input type="text" name="rantSalt" class="form-control" id="formGroupExampleInput"ss>
							  </div> -->
							  

							  
								<div>
		                            <div class="form-group">
		                                <input class="btn btn-primary" type="submit" name="create_user" value="Publish">
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
