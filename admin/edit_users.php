<?php include "includes/adminheader.php"; ?>
<?php include "includes/adminheader1.php"; ?>
<?php require "includes/db.php"; ?>
<?php require "function.php"; ?>

    <div id="wrapper">
        <!-- Navigation -->
       <?php include "includes/adminnavigation.php"; ?>
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
                           Edit Users                   
                        </h1>





<?php
if (isset($_GET['u_id']))
{

    $the_user_id = $_GET['u_id'];

    $query = "SELECT * FROM users where user_id = $the_user_id";
    $select_user_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_by_id))
    {

      
        $username = $row['username'];
        $password = $row['password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
           
         

        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_date = $row['user_date'];
        $rantSalt = $row['rantSalt'];

    if (isset($_POST['edit_user']))
    {

      
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_date = $_POST['user_date'];
        $rantSalt = $_POST['rantSalt'];

  



                         $query_update="UPDATE users SET ";                         
                         $query_update.="user_firstname ='{$user_firstname}',";
                         $query_update.="user_lastname ='{$user_lastname}',";
                         $query_update.="user_email ='{$user_email}',";
                         $query_update.="user_role ='{$user_role}',";
                         $query_update.="user_date ='{$user_date}',";
              
                         $query_update.="rantSalt ='{$rantSalt}'";
                         $query_update.= "where user_id = $the_user_id";


                                    $update_user=mysqli_query($connection,$query_update);
                                   
                                    if(!$update_user)
                                    {
                                      echo "not wrking";
                                    }
                                    else
                                    {
                                      echo "<a href='admin_post.php'><i class='fa fa-eye'></i></a></p>";
                                  

                                        
                                    }

    }

}
}

?>
                        <div class="col-xs-6">                         
                           <form action="" method="POST" enctype="multipart/form-data">

                 
                <div class="form-group">
                  <label for="formGroupExampleInput2">First Name:</label>
                  <input type="text" name="user_firstname" class="form-control" id="formGroupExampleInput2" value="<?php echo $user_firstname;?>">
                </div>
                              <div class="form-group">
                  <label for="formGroupExampleInput">Last Name:</label>
                  <input type="text" value="<?php echo $user_lastname;?>" name="user_lastname" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Email Id:</label>
                  <input type="email" value="<?php echo $user_email;?>" name="user_email"class="form-control" id="formGroupExampleInput" >
                </div>
                  
 
                <div class="form-group">
                  <select name="user_role" type="text" id="" >
                    <option value="admin"><?php echo $user_role ;?></option>
                    <?php
                        if ($user_role=='admin') {
                          echo "<option value='subscriber'>subscriber</option>";
                         }
                          else
                         {
                           echo "<option value='admin'>admin</option>";
                         }
                    ?>
                   
                  </select>

                </div>
                
                <div class="form-group">
                  <label for="formGroupExampleInput2">Date:</label>
                  <input type="text" id="start" value="<?php echo $user_date;?>" name="user_date" value="2020-01-22" class="form-control" min="2020-01-01" max="2040-12-31">
                </div>
                 <div class="form-group">
                  <label for="formGroupExampleInput">RantSalt:</label>  
                  <input type="text" value="<?php echo $rantSalt ;?>" name="rantSalt"  class="form-control" id="formGroupExampleInput">
                </div>
                

                
                <div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="edit_user" value="Save Changes">
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
