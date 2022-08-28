<?php

include 'config.php';
include 'admin_header.php'; 

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>

<?php include 'admin_header.php'; ?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
   
<main class="main" id="main">

<section class="orders bg-blue-50">



         <!-- <div class="flex flex-row  items-center justify-between"> -->
      <!-- <div class="row align-items-top"> -->

         <!-- <div class="col-lg-3"> -->

   <!-- <h1 class="title">placed orders</h1> -->

   <div class="box-container   ">
      
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="card">
            <div class=" ml-32 flex  flex-row">
               
      <div class="card-body box">
         
         <p class="card-title" > user id : <?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> placed on : <?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <?php echo $fetch_orders['email']; ?></span> </p>
         <p> city : <?php echo $fetch_orders['city']; ?></span> </p>
         <p> total products : <?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : $<?php echo $fetch_orders['total_price']; ?></span> </p>
         <p> payment method : <?php echo $fetch_orders['method']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
         
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
            
         </form>
        
         
      </div>
      <?php
         }
      }else{
         echo ' class="card-title"class="empty">no orders placed yet!</p>';
      }
      ?>

   </div>

</section>


</main>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>


