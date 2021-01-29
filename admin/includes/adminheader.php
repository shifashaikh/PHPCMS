<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>


<!-- user role admins -->
<?php
if(!isset($_SESSION['user_role']))
 {
    // if($_SESSION['user_role']!=='admin')
    // {
  header("location:../index.php");
    // }
}
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">


    <!-- my css -->

    <link href="css/styles.css" rel="stylesheet">">

    <!-- Custom Fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <!-- google charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>






</head> 

<body>





    <!-- database -->


