<style>
    table td,table th{
        padding: 3px !important;
    }
</style>





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
   header('location:admin_orders.php');
}

?>
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
                        <th>address</th>
                        <th>email</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>payment method</th>
                        <th>placed on</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
                    <tr>  <td class="text-center"><?php echo $i++ ?></td>
                        <td> <span><?php echo $fetch_orders['user_id']; ?></td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['name'] ?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['number'] ?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['address']?></p>
                        </td>
                        <td>
                            <p class="m-0"><?php echo $fetch_orders['email'] ?></p> </td>
                        <td class="text-center"><?php echo $fetch_orders['total_products']?></td>
                       
                        <td class="text-right"><?php echo $fetch_orders['total_price'] ?></td>
                        <td class="text-center"><?php echo $fetch_orders['method']?></td>
                    </tr>
                   
                    <?php if($qry->num_rows <= 0): ?>
                    <tr>
                        <td class="text-center" colspan="20">No Data...</td>
                    </tr>
                    <?php endif; ?>
      

                </tbody>
                <?php
         }
      }else{
         echo '<p class="empty">no sales placed yet!</p>';
      }
      
      ?>
               <button onclick="myFun()">print111</button>            
         <script type="text/javascript">

       function myFun(){
          window.print();
       }
            </script>
            </table>
           
       
   


                    

















