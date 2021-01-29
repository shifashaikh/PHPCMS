<!DOCTYPE html>
<html>
   <head>
      <style>
         body{background-color: white;}
         img{border:0;height:25px !important;width:50px !important}
         button a{
          color: white;
}
.row{ 
  overflow-x:auto;
}




        }  
      </style>
      <?php include "includes/adminheader.php"; ?>
      <?php include "includes/adminheader1.php"; ?>
      <?php include "includes/db.php"; ?>
      <?php require "function.php"; ?>
      <div id="wrapper">
      <!-- Navigation -->
      <?php include "includes/adminnavigation.php" ?> 
      <div id="page-wrapper">
         <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
               <div class="col-lg-6 col-md-4  col-2">
                  <div class="table1">
                    <form action="" method="post">
                      <?php
if (isset($_POST['CheckBoxArray']))
{

    foreach ($_POST['CheckBoxArray'] as $postValueId)
    {

        $bulkoptions = $_POST['bulkoptions'];

        switch ($bulkoptions)
        {
            case 'publish':

                $publish = "UPDATE posts SET post_status='{$bulkoptions}' WHERE post_id={$postValueId}";

                $update_to_publish = mysqli_query($connection, $publish);
            break;

            case 'draft':
                $draft = "UPDATE posts SET post_status='{$bulkoptions}' WHERE post_id={$postValueId}";

                $update_to_draft = mysqli_query($connection, $draft);
            break;

            case 'delete':
                $delete = "DELETE FROM posts WHERE post_id={$postValueId}";

                $update_to_delete = mysqli_query($connection, $delete);
            break;

            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
                $select_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($select_post_query))
                {
                    $post_title = $row['post_title'];

                    $post_catergory_id = $row['post_catergory_id'];

                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];

                }


        $query = "INSERT INTO posts(post_catergory_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
        

       $query .= "VALUES({$post_catergory_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";
                $copy_query = mysqli_query($connection, $query);

                if (!$copy_query)
                {

                    die("QUERY FAILED" . mysqli_error($connection));
                }
            break;
        }

    }


  }
?>
                     <table class="table-bordered table-striped table-condensed cf  form-control-sm">   
                        <div class="bulkOptionContainer" aria-labelledby="dropdownMenuButton">
                          <select  name="bulkoptions"  id="" class="btn btn-default dropdown-toggle dropdown-toggle" type="button" data-toggle="dropdown">
                           <option value="">Select options</option> 
                           <option value="publish">Publish</option>
                           <option value="draft">Draft</option> 
                           <option value="delete">Delete</option>  
                           <option value="clone">Clone</option> 
                          </select> 

                         
                        <div class=" btn btn-group">
                          <input type="submit" name="submit" class="btn btn-success" value="Apply">            <a href="insert_post.php" class="btn btn-primary">Add new</a>   
                        </div>
                        </div>

                        <thead class="cf">
                           <tr>
                              <th><input  name ="selectAll" id="selectAllBoxes" type="checkbox" name=""></th>
                              <th>ID</th>
                              <th>AUTHOR</th>
                              <th>TITLE</th>
                              <th>CATEGORY</th>
                              <th>CONTENT</th>
                              <th>STATUS</th>
                              <th>IMAGE</th>
                              <th>TAGS</th>
                              <th>COMMENTS</th>
                              <th>DATE</th>
                             <th>View Post</th>
                               <th>Edit</th>  
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
      
<?php
    $query = "SELECT * FROM posts";
    $select_all_post_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_post_query))
    {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_catergory_id = $row['post_catergory_id'];
        $post_content = substr($row['post_content'], 0, 50);
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments_count = $row['post_comments_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
?>
               
               <td><input class="checkBoxes" type="checkbox" name="CheckBoxArray[]" 
                value="<?php echo $post_id ?>"></td>
                                    
 <?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $query_cat = "SELECT * FROM categories WHERE cat_id={$post_catergory_id}";
        $select_catergories_name = mysqli_query($connection, $query_cat);
        while ($row = mysqli_fetch_assoc($select_catergories_name))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td>{$post_content}...</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img src ='../images/$post_image'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comments_count}</td>";
        echo "<td>{$post_date}</td>";

        // view all post
        echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
        // edit
        echo "<td><a href='edit_post.php?edit & p_id={$post_id}'>Edit</a></td>";
        // delete
        echo "<td><a onclick=\"javascript:return confirm('are you sure you want to delete')\"href='admin_post.php?delete={$post_id}'>Delete</a></td>";

        echo "<tr>";
    }

?>

                           </tr>
                        </tbody>
                     
                     </form>

                     </table>
                  </div>
                    <!-- delete post -->

                  <?php

    if (isset($_GET['delete']))
    {
        $the_post_id = $_GET['delete'];
        $query1 = "DELETE FROM  posts WHERE post_id={$the_post_id}";
        $delete_query = mysqli_query($connection, $query1);
        // header not working
        header("location:admin_post.php");
    } ?>

                    <!-- delete post -->
                                         <?php
    if (isset($_GET['add_post']))
    {
        header("location:admin_post.php");
    } ?>                   
                                        
                    <!-- edit new -->
                          
                                     <?php
    if (isset($_GET['edit_post']))
    {
        header("location:edit_post.php");
    } ?>

                    <!-- edit new -->
               </div> 
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
      </div>
      <?php include "includes/adminfooter.php"; ?>
