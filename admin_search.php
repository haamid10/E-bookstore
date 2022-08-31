

<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}





?>
<?php 

if(isset($_POST['search'])){
   $str = $_GET['search'];
   
} ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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
   
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
</head>
<body>
  

<section class="section">
   <form action="" method="post" class="search-form">
      <input type="text" name="search" placeholder="search products..." >
      <input type="submit" name="submit" value="search" class="btn">
   </form>
   <h2>Summury Report</h2>

<?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_sales = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_sales) > 0){
         while($fetch_sales = mysqli_fetch_assoc($select_sales)){
   ?>
   <form action="" method="post" >

<!--  -->
<div class="container">

        <div class="row mb-32">
            <div class="col-lg-44">
            
                
                <table class="table table-hover" >
                    <thead>
                        <tr>
                        <th >user Id</th>       
                        <th >name</th>          
                        <th >phone</th>
                        <th >price</th>           
                        <th >city</th>          
                        <th >country</th>       
                        <th >street</th>        
                        <th >email</th>         
                        <th >quantity</th>       
                                 
                        <th >payment method</th>
                        <th >placed on</th>     
                        <th >payment status</th>
                       
                       

                  </tr>
                </thead>
                <tbody>
                
                
      <input type="hidden"   name="total_product" min="1" value="1">
      <input type="hidden" name="id" value="<?php echo $fetch_sales['id']; ?>">
     <td> <input type="text" name="user_id" value="<?php echo $fetch_sales['user_id']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['name']; ?>"></td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['number']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['total_price']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['city']; ?>"></td>
      <td> <input type="text" name="name" value="<?php echo $fetch_sales['country']; ?>"></td>
      <td> <input type="text" name="name" value="<?php echo $fetch_sales['street']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['email']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['total_products']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['method']; ?>"> </td>

     <td> <input type="text" name="name" value="<?php echo $fetch_sales['placed_on']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['payment_status']; ?>"> </td>


     


                </tbody>
  
         </table>
            </div>
   </div></div>
   </form>
     <?php
            }
         }else{
            echo '<p ">no result found!</p>';
         }
         
        }else{
         echo '<p >search something!</p>';
        }
      ?>
         <div class="text-center">
                    <button> <a href="admin_sales.php" class="btn btn-primary" id="print-btn">print</a> </button>
                    <button onclick="window.print();" class="btn btn-primary" id="print-btn">print now</button>
                </div>
   
 </section>
</body>
</html>