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


<?php
include 'config.php';
session_start();
   if(isset($_GET['update'])){
      $update_id = $_POST['id'];
      $update_name = $POST['name'];
      $update_password = $POST['password'];
      $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
      if(mysqli_num_rows($update_query) > 0){
         while($fetch_update = mysqli_fetch_assoc($update_query)){
?>
<input type="hidden" name="id" value="<?php echo $update_id=$_SESSION['id']; ?>">
<?php

}
}
}else{
echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
}

?>
   


            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
         https://www.youtube.com/watch?v=9Qk2GlkkvH8
         <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>

         <div class="user-box">
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
            <a href="logout.php" class="delete-btn">logout</a>
            <a href="admin_edit.php?id=<?php echo $fetch_users['id']; ?>">Update</a>

            <?php
         }
            ?>

         </div>
      </div>
   </div>
  
  
</header>
 <!--  -->

 
   .
   .


</body>