<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<script src="https://cdn.tailwindcss.com"></script>
<link href="style.css" rel="stylesheet">


</head>
<body >
   
<?php include 'header.php'; ?>







.
   .
<div class="w-full p-24 ">
  <div class="p-0 flex items-center text-xl overflow-hidden min-h-screen-75">
    <div class=" mx-auto px-4">
     
       
        
        <div class="px-4 relative w-full lg:w-12/12"><img src="https://demos.creative-tim.com/notus-pro-react/static/media/example-17.76927438.svg" class="w-fit h-auto ml-0" alt="..."></div>
        </div>
        <div class="  flex flex-wrap -mx-4">
        <div class="px-4   w-full lg:w-8/12">
          <h1 class="text-7xl text font-bold leading-tight ">HAND PICKED BOOK TO YOUR DOOR...</h1>
          <p class="mt-4 mb-4 text-xl leading-relaxed text-blueGray-400">We aim high at being focused on building relationships with our clients and community. Using our creative books drives this foundation.</p>
          <div class="flex flex-wrap -mx-4 mt-8">
            <div class="px-4 pr-2 relative w-full sm:w-8/12">
              <div class="mb-3 pt-0"></div>
            </div>
            <div class="px-4 pl-0 relative w-16 sm:w-8/12"><a href="login.php" class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out w-44 uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-xl px-6 py-4  shadow hover:shadow-lg rounded-md">Join us</a></div>
          </div>
        </div>
      
    </div>
  </div>
</div



 


    <section class="products">

<h1 class="title">latest products</h1>

<div class="box-container">

   <?php  
      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_products = mysqli_fetch_assoc($select_products)){
   ?>
  <form action="" method="post" class="box">
   <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
   <div class="name"><?php echo $fetch_products['name']; ?></div>
   <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
   <input type="number" min="1" name="product_quantity" value="1" class="qty">
   <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
   <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
   <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
   <input type="submit" value="add to cart" name="add_to_cart" class="btn">
  </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>
</div>

</section>

     



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>