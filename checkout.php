<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   // $city = mysqli_real_escape_string($conn, '. $_POST['city'].');
   // $country = mysqli_real_escape_string($conn,  '. $_POST['country'].');
   // $street = mysqli_real_escape_string($conn,  '. $_POST['street'].');

    $city = $_POST['city'];
   $country = $_POST['country'];
   $street = $_POST['street'];

   // $placed_on = mysqli_real_escape_string($conn, $_POST['placed_on']);

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND city = '$city' AND country = '$country' AND street = '$street' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
         header("location:home.php");
      }elseif($total_products < $cart_products){

        
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, city,country,street, total_products, total_price) VALUES('$user_id', '$name', '$number', '$email', '$method', '$city','$country','$street', '$total_products', '$cart_total')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         
      }else{
         $message[] = 'we didnot have that ammount!';

      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].''.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> grand total : <span>$<?php echo $grand_total; ?></span> </div>

</section>


<section class="checkout">

   <form action="" method="post">
   
   <h3>Zaad:+252 063-3917014</h3>
      <h3>E-dahab:+252 065-3917014</h3>
     
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
       
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method">
               <!-- <option value="cash on delivery">cash on delivery</option> -->
               <option value="zaad">Zaad</option>
               <option value="edahab">E-dahab</option>
            </select>
         </div>
         <!-- <div class="inputBox">
            <span>address line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
         </div> -->
         <div class="inputBox">
            <span>Street :</span>
            <input type="string" name="street" required placeholder="e.g. Xawaadle">
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="string" name="city" required placeholder="e.g. Hergeisa">
         </div>
         <!-- <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" required placeholder="e.g. Maroodi-jeex">
         </div> -->
         <div class="inputBox">
            <span>Country :</span>
            <input type="string" name="country" required placeholder="e.g. Somaliland">
         </div>
         <!-- <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div> -->
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>