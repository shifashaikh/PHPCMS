<form action="" method="post">
                          <!-- edit(insert) categories query -->
                          <?php

                            if(isset($_GET['edit']))
                            {
                             $cat_id=$_GET['edit'];
                             $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                             $select_catergories_id = mysqli_query($connection,$query);
                              while($row=mysqli_fetch_assoc($select_catergories_id))
                              {
                                 $cat_id=$row['cat_id'];
                                 $cat_title=$row['cat_title'];                           
                          ?>
                          <!-- edit(insert) categories query//// -->


                          <?php
                          // update  categories query
                                if(isset($_POST['cat_title']))
                                  {
                                     $the_cat_title = $_POST['cat_title'];
                                         
                                         // echo $_POST['cat_title'];


                                    $query="UPDATE categories SET cat_title ='{$the_cat_title}' WHERE 
                                    cat_id = '{$cat_id}'";
                                    $update_query=mysqli_query($connection,$query);
                                    // header not working 
                                    if(! $update_query){
                                      die("Update not working").mysql_error($connection);
                                    }
                                  }
                          ?>


                          <label>Edit Category</label>
                           <input value=" <?php if(isset($cat_title)) {echo $cat_title;}?>" type="text" class="form-control" name="cat_title">
                           <br>

                               <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit" value="Update catergory">
                            </div>
                        </form>

                          <?php
                           }}
                          ?>
                          
                         <!--  <label for ="cat_title">Edit Category</label> -->
                           