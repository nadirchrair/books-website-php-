<?php 
session_start();
require_once('./dashboard/include/connection.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كتبpdf</title>
    <!--bootstrap min css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--bootstrap rtl-->
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
   <!--nav-bar-->

<nav class="navbar navbar-expand-sm navbar-light">
<div class="container">
    <a href="index.php" class="navbar-brand">كتب pdf</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
<span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
    <a href="index.php" class="nav-link">الرئسية</a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">الأقسام</a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">تواصل معنا</a>
</li>
<li>
     <?php 
     if(isset($_SESSION['admininfo'])){
?>
<a href="./dashboard/dashboard.php" class="nav-link">لوحة التحكم</a>
<?php
    }
    ?>
    
    
    
       
</li>
</ul>
    </div>
</div>
</nav>
   <!--end navbar--> 