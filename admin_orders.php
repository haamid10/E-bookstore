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

<section class="section">

  <div class="col-lg-6">
   <div class="card">
            <div class="card-body">
              <h5 class="card-title">Small tables</h5>
              <p>Add <code>.table-sm</code> to make any <code>.table</code> more compact by cutting all cell padding in half.</p>
              <!-- Small tables -->
              <table class="table table-lg">
                <thead>
                  <tr>
                   
                        <th scope="col"> Id</th>       
                        <th scope="col">name</th>          
                        <th scope="col">phone</th>         
                        <th scope="col">city</th>          
                           
                        <th scope="col">email</th>         
                        <th scope="col">quantity</th>       
                        <th scope="col">price</th>           
                        <th scope="col"> method</th>
                        <th scope="col">placedon</th>     
                        <th scope="col"> status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                        // $sn = 1;
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                        if(mysqli_num_rows($select_orders) > 0){
                           while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                       ?>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>Developer</td>
                    <td>35</td>
                    <td>2014-12-05</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>Finance</td>
                    <td>45</td>
                    <td>2011-08-12</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>34</td>
                    <td>2012-06-11</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>2011-04-19</td>
                  </tr>
                </tbody>
              </table>
              <!-- End small tables -->

            </div>
          </div>
  </div>
</section>

   <section class="bg-white ">
 
 <!-- <div class="col-lg-32"> -->
    
<h1 class=" text-center font-bold text-blue-700 ">User Accounts</h1>
<div class="flex flex-row  gap-14 justify-between">
<!-- <!-- <div class="col-lg-3  "> -->
<div class="box-container"> 

   <!-- <div class="flex flex-row  items-center justify-between"> -->
      
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="card  ">
            
               
      <div class="card-body  box">
         
         <p class="card-title" > user id : <?php echo $fetch_orders['user_id']; ?> </p>
         <p > placed on : <?php echo $fetch_orders['placed_on']; ?> </p>
         <p> name : <?php echo $fetch_orders['name']; ?> </p>
         <p> number : <?php echo $fetch_orders['number']; ?> </p>
         <p> email : <?php echo $fetch_orders['email']; ?> </p>
         <p> city : <?php echo $fetch_orders['city']; ?> </p>
         <p> total products : <?php echo $fetch_orders['total_products']; ?> </p>
         <p> total price : $<?php echo $fetch_orders['total_price']; ?> </p>
         <p> payment method : <?php echo $fetch_orders['method']; ?> </p>
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


