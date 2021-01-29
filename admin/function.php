<?php require "includes/db.php"; ?>

<?php
// <!-- insert catergories query -->
function insert_catergories()
{
    // include "includes/db.php";
    global $connection;
    if (isset($_POST['submit']))
    {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title))
        {
            echo "*This field should not be empty..!!!";
        }
        else
        {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query)
            {
                die('query failed') . mysql_error($connection);
            }
        }
    }

}

// FINDALL CATEGORIES
function findall_catergories()
{
    // FIND ALL CATEGORIES QUERY
    global $connection;
    $query = "SELECT * FROM categories";
    $select_catergories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_catergories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='cat.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='cat.php?edit={$cat_id}'>Edit</a></td>";
        echo "<tr>";
    }

}

// DELETE CATEGORIES
function delete_catergories()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $the_cat_id = $_GET['delete'];
        $query1 = "DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query = mysqli_query($connection, $query1);
        // header not working
        header("location:cat.php");
    }
}



 // view all posts


function select_all_post(){
                                 global $connection;
                                $query = "SELECT * FROM posts";
                                $select_all_post_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_all_post_query))
                                {
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_catergory_id = $row['post_catergory_id'];
                                    $post_content = $row['post_content'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comments_count = $row['post_comments_count'];
                                    $post_date = $row['post_date'];
                                }

                              
}



function view_all_post()
{
    global $connection;
    $query="SELECT * FROM posTs";
                       $select_all_post_query=mysqli_query($connection,$query);
                       while($row=mysqli_fetch_assoc($select_all_post_query))
                       {
                          $post_id=$row['post_id'];                            
                          $post_author=$row['post_author'];
                          $post_title=$row['post_title'];
                          $post_catergory_id=$row['post_catergory_id'];
                          $post_content=substr($row['post_content'],0,50);  
                          $post_status=$row['post_status'];
                          $post_image=$row['post_image'];
                          $post_tags=$row['post_tags']; 
                          $post_comments_count=$row['post_comments_count'];
                          $post_date=$row['post_date'];

                              echo "<td>{$post_id}</td>"; 
                              echo "<td>{$post_author}</td>"; 
                              echo "<td>{$post_title}</td>";                              

                   $query_cat = "SELECT * FROM categories WHERE cat_id={$post_catergory_id}";
                             $select_catergories_name=mysqli_query($connection,$query_cat);
                              while($row=mysqli_fetch_assoc($select_catergories_name))
                              {
                                 $cat_id=$row['cat_id'];
                                 $cat_title=$row['cat_title']; 
                              }
                              echo "<td>{$cat_title}</td>"; 
                              echo "<td>{$post_content}...</td>"; 
                              echo "<td>{$post_status}</td>";                               
                              echo "<td><img src ='../images/$post_image'></td>";         
                              echo "<td>{$post_tags}</td>"; 
                              echo "<td>{$post_comments_count}</td>";  
                              echo "<td>{$post_date}</td>"; 

                              // edit
                              echo "<td><a href='edit_post.php?edit & p_id={$post_id}'>Edit</a></td>";
                              
                              // delete
                              echo "<td><a href='admin_post.php?delete={$post_id}'>Delete</a></td>";

                              echo "<tr>";
                           }   
                     
  }
    



    function delete_post()
    {
         global $connection;
          
                             if (isset($_GET['delete']))
                                {
                                    $the_post_id = $_GET['delete'];
                                    $query1 = "DELETE FROM  posts WHERE post_id={$the_post_id}";
                                    $delete_query = mysqli_query($connection, $query1);
                                    // header not working
                                    // header("location:cat.php");
                                }

                       
    }


   

        
      function invalid()
      { 
         global $connection;
        if (isset($_POST["submit"])) { $post_author = $_POST['post_author']; $post_title = $_POST['post_title']; $post_catergory_id = $_POST['post_catergory_id']; $post_content = $_POST['post_content']; $post_status = $_POST['post_status']; $post_image = $_POST['post_image']; $post_tags = $_POST['post_tags']; $post_comments_count = $_POST['post_comments_count']; $post_date = $_POST['post_date']; if ($post_author == "" || empty($post_author)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_title == "" || empty($post_title)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_catergory_id == "" || empty($post_catergory_id)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_content == "" || empty($post_content)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_status == "" || empty($post_status)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_image == "" || empty($post_image)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_tags == "" || empty($post_tags)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_comments_count == "" || empty($post_comments_count)) { echo "<h4>*empty or invalid value*</h4>"; } elseif($post_date == "" || empty($post_date)) { echo "<h4>*empty or invalid value*</h4>"; } else { header("location:insert_post.php"); } } }
 

function allpost(){
  global $connection;
  $query = "SELECT * FROM posts";
$select_all_post_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_post_query))
{
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_catergory_id = $row['post_catergory_id'];
    $post_content = $row['post_content'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comments_count = $row['post_comments_count'];
    $post_date = $row['post_date'];

    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_catergory_id}</td>";
    echo "<td>{$post_content}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img src ='../images/$post_image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comments_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='admin_post.php?delete={$post_id}'>Delete</a></td>";
    echo "<tr>";
}
}
?>





