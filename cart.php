<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>


</head>
<body>
   
<?php include 'header.php'; ?>

<!-- <div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="home.php">home</a> / cart </p>
</div> -->

<section class="shopping-cart">

   <h1 class="title">products added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="name"><?php echo $fetch_cart['quantity']; ?></div>
         
         <div class="price iprice">$<?php echo  $fetch_cart['price']; ?></div>
         <div class="itotal"> </div>
         <form action="" method="post">
            <input type="hidden" name="cart_id " value="<?php echo $fetch_cart['id']; ?>">
            <input class="iquantity" onchange="sub_total()" type="number" min="1" max="10 name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            
            <input type="submit" name="update_cart" value="update" class="option-btn">
         </form>
         <div class="sub-total">
             sub total : <span ">$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span>
             <h4><b class="total-amount itotal " ><?php echo number_format($fetch_cart['quantity'] * $fetch_cart['price']) ?></b></h4>
      </div>
      </div>
      <?php
         $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>

      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
   </div>

   <div class="cart-total">
      <p>grand total : <span>$<?php echo $grand_total; ?></span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">continue shopping</a>
         <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
      </div>
   </div>

</section>


<!-- mine -->
<!-- <section>
<div class="container"> 
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>My Cart</h1>
        </div>

      <div class="col-lg-9 ">
          <table class="table">

              <thead class="text-center">
                  <tr>
                      <th>name</th>
                      <th>image</th>
                      <th>price</th>
                      <th>quantity</th>
                  </tr>
              </thead>
              <tbody class="text-center">
                  <?php 
      include 'config.php';
      $grand_total = 0;
    //   if(mysqli_num_rows($select_cart) > 0){
    //      while($fetch_cart = mysqli_fetch_assoc($select_cart)){ 

                  $total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

                  if(mysqli_num_rows($select_cart) > 0){
                //   if(isset($_SESSION['cart'])){
                      foreach($_SESSION['cart'] as $key => $value){
                          $sr = $key+1;
                          $total= $total+$value['price'];
                          echo"
                <tr>
                     <td> $sr </td>
                     <td>$value[name]</td>
                     <td>$value[price] <input type='hidden' name='product_name'value='$value[price] class='iprice' '> </td>
                     <td> $value[quantity]<input onchange='sub_total()' class='iquantity text-center' type='number' value='$value[quantity]'></td>
                     <td class='itotal'> 0</td>
                     <td> 
                     <form action='' method='post'>
                       <input type='hidden' name='product_name' value='$value[name]'> 
                      </form>
                     </td>
                 </tr>


                       
         "; 
                      }
                    // }
                  }?>
                 
              </tbody>
          </table>
      </div>  
    </div>

</div>



</section> -->


<!-- new one -->






<?php include 'footer.php'; ?>

<script>

    var iprice = document.getElementsByClassName('iprice')
    var iquantity = document.getElementsByClassName('iquantity')
var itotal = document.getElementsByClassName('itotoal')

function sub_total(){
    for(i =0;i>iprice.length; i++){
        itotal[i].innerText=(iprice[i].value * iquantity[i].value)
    }

}
sub_total();

</script>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>