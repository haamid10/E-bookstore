<!-- <style>
    table td,table th{
        /* padding: 0 !important; */
        margin-right: 32rem;
    }
</style> -->





<?php

include 'config.php';

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
   header('location:admin_sales.php');
}




?>
<?php 

if(isset($_POST['search'])){
   $str = $_GET['search'];
   
} ?> 

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="css/admin_style.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="heading">
   <h3>sales page</h3>
   <p> <a href="admin_page.php">home</a> / search </p>
</div>

<!-- sales search -->
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>

<section  >

   <div >
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_sales = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_sales) > 0){
         while($fetch_sales = mysqli_fetch_assoc($select_sales)){
   ?>
   <form action="" method="post" >
     <table>
     <colgroup>
                    <col >
                    <col >
                    <col >
                    <col >
                    <col >
                    <col >
                    <col >
                    <col >
                    <col >
                </colgroup>
                <thead>
                    <tr>
                       
                        <th>user Id</th>       
                        <th>name</th>          
                        <th>phone</th>         
                        <th>total price</th>          
                        <th>city</th> 
                        <!-- <th>country</th> -->
                        <th>street</th>
                         <th>quantity</th>        
                        <th>payment status</th>
                        <th>payment method</th>
                        <th>email</th>
                        <th>placed on</th>   
                        <th>country</th>  
                        
                        
                    </tr>
                </thead>
                
                <tbody>
      <input type="hidden"  class="qty" name="total_product" min="1" value="1">
      <input type="hidden" name="id" value="<?php echo $fetch_sales['id']; ?>">
     <td> <input type="text" name="user_id" value="<?php echo $fetch_sales['user_id']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['name']; ?>"></td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['number']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['total_price']; ?>"></td>
      <td><input type="text" name="name" value="<?php echo $fetch_sales['city']; ?>"></td>
      <td> <input type="text" name="name" value="<?php echo $fetch_sales['country']; ?>"></td>
      <td> <input type="text" name="name" value="<?php echo $fetch_sales['street']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['total_products']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['payment_status']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['method']; ?>"> </td>


     <td> <input type="text" name="name" value="<?php echo $fetch_sales['email']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['placed_on']; ?>"> </td>
     <td> <input type="text" name="name" value="<?php echo $fetch_sales['country']; ?>"> </td>

     


                </tbody>
  
         </table>
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">no result found!</p>';
         }
         
      }else{
         echo '<p class="empty">search something!</p>';
      }
   ?>
   
   </div>
   <tr>
                        <td class="text-center" colspan="20">___________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="20">___________________________________________________________________________________________</td>
                    </tr>

    </section>
<!-- ende of search -->




       
   <table class="table table-bordered">
                <colgroup>
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                    <col width="60">
                </colgroup>
                <thead>
                    <tr>
                       
                        <th>user Id</th>       
                        <th>name</th>          
                        <th>phone</th>         
                        <th>city</th>          
                        <th>country</th>       
                        <th>street</th>        
                        <th>email</th>         
                        <th>quantity</th>       
                        <th>price</th>           
                        <th>payment method</th>
                        <th>placed on</th>     
                        <th>payment status</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
                   
                        <td> <span><?php echo $fetch_orders['user_id']; ?></td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['name'] ?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['number'] ?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['city']?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['country']?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['street']?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['email'] ?></p> </td>
                        <td class="text-center"><?php echo $fetch_orders['total_products']?></td>
                       
                        <td class="text-right">$<?php echo $fetch_orders['total_price'] ?></td>
                        <td class="text-center"><?php echo $fetch_orders['method']?></td>
                        <td class="text-center"><?php echo $fetch_orders['placed_on']?></td>
                        <td class="text-center"><?php echo $fetch_orders['payment_status']?></td>
                        <td>   <a href="admin_sales.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a> </td>
                    </tr>
                   
                    <?php if($qry->num_rows <= 0): ?>
                    <tr>
                        <td class="text-center" colspan="20">___________________________________________________________________________________________</td>
                    </tr>
                    <?php endif; ?>
      

                </tbody>
                <?php
         }
      }else{
         echo '<p class="empty">no sales placed yet!</p>';
      }
      
      ?>
               <a href="sales_print.php" >print111</a>            
         <script type="text/javascript">

       function myFun(){
          window.print();
       }
            </script>
            </table>
           
       
   


                    

















