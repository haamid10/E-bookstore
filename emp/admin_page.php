<?php

include '../config.php';
include '../emp/admin_header.php';

session_start();

$admin_id = $_SESSION['employee_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

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

</head>
<body>
   
<main class="main" id="main">

<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../admin_page.php">Home   </a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

<!-- admin dashboard section starts  -->

<section class="section dashboard">
<div class="row">

        <div class="col-lg-8">
          <div  class="row">

            <!-- Sales Card -->
     <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <div class="card-body">
                  <h5 class="card-title">Total Pending</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
         <div class="ps-3">
         <h6>$<?php echo $total_pendings; ?></h6>
         </div>

             
       
          </div>
        </div>
      </div>
   </div>
   <!-- ends of sales card -->
        

   <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
          <div class="card-body">
                  <h5 class="card-title"> completed sales </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$<?php echo $total_completed; ?></h6>
                     

                    </div>
                  </div>
                </div>
        
      </div>
   </div>
        <!-- Revenue Card -->
        

   <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <div class="card-body">
                  <h5 class="card-title"> order placed </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $number_of_orders; ?></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
   </div>    
          
              <!-- orders card -->
     
  
   <!-- products -->
   <div class="col-xxl-4 col-md-4">
      <div class="card info-card revenue-card">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
        

      <div class="card-body">
                  <h5 class="card-title">Messeges </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bar-chart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $number_of_messages; ?></h6>
                     

                    </div>
                  </div>
                </div>  
      </div>   
</div>
</section>

<!-- messeges -->


   
        
      
          
      <!-- normal users -->

           
         
      <!--admin users  -->

   
  
      
          
              
               <!-- total users card -->

  
       
      
          
            <!-- messeges  -->



<!-- admin dashboard section ends -->






</main>


<!-- custom admin js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>

j