<?php require  "db.php"; ?>
<?php session_start(); ?>
<?php
if (isset($_POST['login'])) 
{

  




  $username= $_POST['username'];
  $password= $_POST['password'];


 $username=mysqli_real_escape_string($connection,$username);

 $password=mysqli_real_escape_string($connection,$password);



$query_select="SELECT * FROM users WHERE username='{$username}'";
$select_user_query=mysqli_query($connection,$query_select);

if (!$select_user_query)
{
die("query failed".mysql_error($connection));
}

while ($row=mysqli_fetch_array($select_user_query)) {

   $db_id=$row['user_id'];
   $db_username=$row['username'];
   $db_password=$row['password'];
   $db_user_firstname=$row['user_firstname'];
   $db_user_lastname=$row['user_firstname'];
   $db_user_role=$row['user_role'];

}






  $password=crypt($password,$db_password);

if($username===$db_username && $password===$db_password)
{
  $_SESSION['username']=$db_username;
  $_SESSION['firstname']=$db_user_firstname;
  $_SESSION['lastname']=$db_user_lastname;
  $_SESSION['user_role']=$db_user_role;


header("location:../admin");
  
}
else
{
  header("location:../index.php");
}



}

?>