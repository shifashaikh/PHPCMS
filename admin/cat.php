<?php include "includes/adminheader.php"; ?>
<?php include "includes/adminheader1.php"; ?>
 <?php include "includes/db.php"; ?>
  <?php require "function.php" ?>


    <div id="wrapper">
        <!-- Navigation -->
       <?php include "includes/adminnavigation.php" ?>


       <?php if ($connection)
{
    echo "we are connected";
}
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                           <form action="" method="post">
                          <label for ="cat_title">Add Category</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                               <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add catergory">
                            </div>
                        </form>
                          <!-- insert catergories query -->
                          <?php insert_catergories();?>
                        <!-- UPDATE catergories -->
                             <?php
                              if (isset($_GET['edit']))
                              {
                                  $cat_id = $_GET['edit'];
                              }
                              include "includes/update_cat.php"
                              ?>
                        <!-- edit catergories// -->
                        </div>
                        <!-- Add catergory form -->
                        <div class="col-lg-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category title</th>
                                <th>Delete</th>
                                 <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>

                             <!--  FIND ALL CATEGORIES QUERY -->
                           <?php findall_catergories();?>

                             <!-- delete query -->
                             <?php delete_catergories();?>
                            </tbody>
                          </table>
                        </div>
                      
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <?php include "includes/adminfooter.php"; ?>
