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
<link href="style.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>


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
            <a href="update_account.php" class="">update</a>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>
  
  
</header>
 <!--  -->

 
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
</div>

</body>