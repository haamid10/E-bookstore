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

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Hand Picked Book to your door.</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>


<section class="relative w-full h-full">
<div class="absolute hidden w-full bg-gray-50 lg:block h-96"></div>
 <div class="relative px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">

    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
        <span class="relative inline-block">
          <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-gray-400 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
            <defs>
              <pattern id="2c67e949-4a23-49f7-bf27-ca140852cf21" x="0" y="0" width=".135" height=".30">
                <circle cx="1" cy="1" r=".7"></circle>
              </pattern>
            </defs>
            <rect fill="url(#2c67e949-4a23-49f7-bf27-ca140852cf21)" width="52" height="24"></rect>
          </svg>
          <span class="relative text-6xl">latest products</span>
        </span class=" font-semibold">
        affordable for everyone
      </h2>
    </div>


   <div class="grid max-w-screen-md gap-10 md:grid-cols-2 sm:mx-auto">
   <div>
        <div class="p-8 bg-gray-900 rounded">
          <div class="mb-4 text-center">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
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
        </div>  
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>


   
 </div>
</section>

<!-- tailwind landing 1 -->
<div class="relative w-full h-full">
  <div class="absolute hidden w-full bg-gray-50 lg:block h-96"></div>
  <div class="relative px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
      <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
        <span class="relative inline-block">
          <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-gray-400 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
            <defs>
              <pattern id="2c67e949-4a23-49f7-bf27-ca140852cf21" x="0" y="0" width=".135" height=".30">
                <circle cx="1" cy="1" r=".7"></circle>
              </pattern>
            </defs>
            <rect fill="url(#2c67e949-4a23-49f7-bf27-ca140852cf21)" width="52" height="24"></rect>
          </svg>
          <span class="relative">Affordable</span>
        </span>
        for everyone
      </h2>
      <p class="text-base text-gray-700 md:text-lg">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque ipsa quae.
      </p>
    </div>
    <div class="grid max-w-screen-md gap-10 md:grid-cols-2 sm:mx-auto">
      <div>
        <div class="p-8 bg-gray-900 rounded">
          <div class="mb-4 text-center">
            <p class="text-xl font-medium tracking-wide text-white">
              Starter Plan
            </p>
            <div class="flex items-center justify-center">
              <p class="mr-2 text-5xl font-semibold text-white lg:text-6xl">
                $39
              </p>
              <p class="text-lg text-gray-500">/ month</p>
            </div>
          </div>
          <ul class="mb-8 space-y-2">
            <li class="flex items-center">
              <div class="mr-3">
                <svg class="w-4 h-4 text-teal-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                  <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                  <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                </svg>
              </div>
              <p class="font-medium text-gray-300">10 deploys per day</p>
            </li>
            <li class="flex items-center">
              <div class="mr-3">
                <svg class="w-4 h-4 text-teal-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                  <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                  <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                </svg>
              </div>
              <p class="font-medium text-gray-300">10 GB of storage</p>
            </li>
            <li class="flex items-center">
              <div class="mr-3">
                <svg class="w-4 h-4 text-teal-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                  <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                  <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                </svg>
              </div>
              <p class="font-medium text-gray-300">3 domains</p>
            </li>
            <li class="flex items-center">
              <div class="mr-3">
                <svg class="w-4 h-4 text-teal-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                  <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                  <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                </svg>
              </div>
              <p class="font-medium text-gray-300">SSL Certificates</p>
            </li>
          </ul>
          <button
            type="submit"
            class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
          >
            Get Now
          </button>
        </div>
        <div class="w-11/12 h-2 mx-auto bg-gray-900 rounded-b opacity-75"></div>
        <div class="w-10/12 h-2 mx-auto bg-gray-900 rounded-b opacity-50"></div>
        <div class="w-9/12 h-2 mx-auto bg-gray-900 rounded-b opacity-25"></div>
      </div>
      
    </div>
  </div>
</div>
<!-- end -->


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>