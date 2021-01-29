<?php include "includes/adminheader.php"; ?>
<?php include "includes/db.php"; ?>


<style>
  


  img{

    vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
    /*width:96px;
    height:96px;
  border-radius: 50%;*/
  }

  /*.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;*/
}
</style>



<?php
if (isset($_SESSION['username']))
{

    $username = $_SESSION['username'];
    $query_select = "SELECT * FROM users WHERE username='{$username}'";

    $select_user_profile = mysqli_query($connection, $query_select);

    while ($row = mysqli_fetch_array($select_user_profile))
    {

        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $password = $row['password'];
        $user_role = $row['user_role'];
        $rantSalt = $row['rantSalt'];

        $user_image = $row['user_image'];

    }
}
?>


<?php
if (isset($_POST['Updateprofile']))
{

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $password = $row['password'];


              $user_image=$_FILES['user_image']['name'];        
              $user_image_temp=$_FILES['user_image']['tmp_name'];


                          $user_date=$_POST['user_date'];

                         move_uploaded_file($user_image_temp,"../images/$user_image");
    




    $query_update = "UPDATE users SET ";
    $query_update .= "user_firstname ='{$user_firstname}',";
    $query_update .= "user_lastname ='{$user_lastname}',";
    $query_update .= "user_email ='{$user_email}',";
     $query_update .= "user_image ='{$user_image}',";
    $query_update .= "user_role ='{$user_role}',";
    $query_update .= "password ='{$password}'";
   $query_update .= "where username = '{$username}'";

    $update_profile = mysqli_query($connection, $query_update);

    if (!$update_profile)
    {
        die("profile not upadted");
    }
    
    
}

?>
    <div id="wrapper">
<!-- Navigation -->
       <?php include "includes/adminnavigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $user_firstname; ?></small> 
                        </h1>

                         <div class="col-xs-6"> 

                       <!-- profile pic -->
                   <div class="chip">
                     <?php echo "<img src ='../images/$user_image'>"; ?>
                    <?php echo $user_firstname; ?>
                  </div> 


              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="formGroupExampleInput2">First Name:</label>
                  <input type="text" name="user_firstname" class="form-control" id="formGroupExampleInput2" value="<?php echo $user_firstname; ?>">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput">Last Name:</label>
                  <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control" id="formGroupExampleInput">
                </div>

                 <div class="form-group">
                    <label for="user_image">New Profile Image?</label>
                    <input type="file" name="user_image">
                  </div>


                  <div class="form-group">
                  <select name="user_role" type="text" id="" >
                    <option value="admin" class="form-control"><?php echo $user_role; ?></option>
                    <?php
                    if ($user_role == 'admin')
                    {
                        echo "<option value='subscriber' class='form-control'>subscriber</option>";
                    }
                    else
                    {
                        echo "<option value='admin' class='form-control'>admin</option>";
                    }
                    ?>
                   
                  </select>
                   
                  <div class="form-group">
                    <br>
                  <label for="formGroupExampleInput">Username:</label>
                  <input type="text" value="<?php echo $username; ?>" name="username" class="form-control" id="formGroupExampleInput">
                </div>

                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Email Id:</label>
                  <input type="email" value="<?php echo $user_email; ?>" name="user_email"class="form-control" id="formGroupExampleInput" >
                </div>
 
                <div class="form-group">
                  <label for="formGroupExampleInput">Password</label>  
                  <input type="password" value="<?php echo $password; ?>" name="password"  class="form-control" id="formGroupExampleInput">
                </div>
                <div>
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="Updateprofile" value="Update profile">
                </div>
                      
                 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <?php include "includes/adminfooter.php"; ?>
