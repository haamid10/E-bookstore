<?php
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
<link href="stylse.css" rel="stylesheet">
<body>
<header class="header">

  

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">IQRA BOOKS</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="edit_account.php" class="">update</a>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>
  

</header>
 <!--  -->

 <div class="w-full">
  <div class="p-0 flex items-center overflow-hidden min-h-screen-75">
    <div class="container mx-auto px-4">
      <div class="items-center text-left flex flex-wrap -mx-4">
        <div class="px-4 relative w-full lg:w-6/12">
          <h1 class="text-4xl font-bold leading-tight">Design with us, speed your development...</h1>
          <p class="mt-4 mb-4 text-xl leading-relaxed text-blueGray-400">We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation.</p>
          <div class="flex flex-wrap -mx-4 mt-8">
            <div class="px-4 pr-2 relative w-full sm:w-8/12">
              <div class="mb-3 pt-0"><input placeholder="Your email here" class="border-blueGray-300 px-3 py-2 text-sm  w-full placeholder-blueGray-200 text-blueGray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 "></div>
            </div>
            <div class="px-4 pl-0 relative w-full sm:w-4/12"><button class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Join us</button></div>
          </div>
        </div>
        <div class="px-4 relative w-full lg:w-6/12"><img src="https://demos.creative-tim.com/notus-pro-react/static/media/example-17.76927438.svg" class="w-full lg:ml-12" alt="..."></div>
      </div>
    </div>
  </div>
</div>


</body>