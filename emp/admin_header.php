<?php

require("../config.php");


if(isset($message)){
  foreach($message as $message){
     echo '
     <div class="message">
        <span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
     </div>
     ';
  }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employee  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/admin_style.css">


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
      <a href="emp/admin_page.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">IQRA BOOKS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   

   <div class="flex">

      

   

      <div class="nav-item dropdown ">
         <div  id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"> Employee</div>
      </div>
      <?php
      require("../config.php");
         $select_user = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_user = mysqli_fetch_assoc($select_user)){
      ?>

      <div class="account-box">
         <p> username : <span><?php echo $fetch_user['employee_name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_user['employee_email']; ?></span> </p>
         <a href="logout.php" class="delete-btn">logout</a> 
         <div><?php }?></div>
      </div>

   </div>

</header>


<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="../emp/admin_page.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="../emp/admin_orders.php">
      <i class="bi bi-person"></i>
      <span>orders</span>
    </a>
  </li>

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="../emp/admin_contacts.php">
      <i class="bi bi-envelope"></i>
      <span>Messeges</span>
    </a>
  </li>

  
  <li class="nav-item">
    <a class="nav-link " href="../emp/admin_sales.php">
      <i class="bi bi-layout-text-window-reverse"></i>
      <span>sales report</span>
    </a>
  </li>


 
</ul>

</aside><!-- End Sidebar-->

