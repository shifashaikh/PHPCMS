 <?php ob_start();?>
 <?php include "db.php";?>


 <?php session_start(); ?>


 <?php
 if(isset($_session['user_role']))
 {
echo "working";
}else
// {
// header("location:../index.php");
// }

?>