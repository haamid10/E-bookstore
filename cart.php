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

<div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="home.php">home</a> / cart </p>
</div>

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
         <div class="price">$<?php echo $fetch_cart['price']; ?></div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" name="update_cart" value="update" class="option-btn">
         </form>
         <div class="sub-total">
             sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span>
             <h4><b class="total-amount"><?php echo number_format($fetch_cart['quantity'] * $fetch_cart['price']) ?></b></h4>
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
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-end mb-2">
                <button class="btn btn-outline-dark btn-flat btn-sm" type="button" id="empty_cart">Empty Cart</button>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <h3><b>Cart List</b></h3>
                <hr class="border-dark">
                
         <!-- $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){    -->
      
                <?php 
    // include 'config.php';

                    $qry = $conn->query("SELECT * FROM `cart` WHERE user_id = '$user_id'")  or die('query failed');
                    if(mysqli_num_rows($qry) >0)
                    while($row= mysqli_fetch_assoc($qry)){
                        // $upload_path = base_app.'/uploads/product_'.$row['pid'];
                        // $img = "";
                        // foreach($row as $k=> $v){
                        //     $row[$k] = trim(stripslashes($v));
                        // }
                       
                ?>
                    <div class="d-flex w-100 justify-content-between  mb-2 py-2 border-bottom cart-item">
                        <div class="d-flex align-items-center col-8">
                            <span class="mr-2"><a href="javascript:void(0)" class="btn btn-sm btn-outline-danger rem_item" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></a></span>
         <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">

                            <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>"  alt="">
                            <div>
                                <p class="mb-1 mb-sm-1"><?php echo $row['name'] ?></p>
                                
                                <p class="mb-1 mb-sm-1"><small><b>Price:</b> <span class="price"><?php echo number_format($row['price']) ?></span>$</small></p>
                                <div>
                                <div class="input-group" style="width:130px !important">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-sm btn-outline-secondary min-qty" type="button" id="button-addon1"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="number" class="form-control form-control-sm qty text-center cart-qty" placeholder="" aria-label="Example text with button addon" value="<?php echo $row['quantity'] ?>" aria-describedby="button-addon1" data-id="<?php echo $row['id'] ?>" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-outline-secondary plus-qty" type="button" id="button-addon1"><i class="fa fa-plus"></i></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col text-right align-items-center d-flex justify-content-end">
                            <h4><b class="total-amount"><?php echo number_format($row['price'] * $row['quantity']) ?></b></h4>
                        </div>
                    </div>
                <?php 
                
                        }else
                        {
                           echo("somethhing is wrong");
                        }
                     ?>
                <div class="d-flex w-100 justify-content-between mb-2 py-2 border-bottom">
                    <div class="col-8 d-flex justify-content-end"><h4>Grand Total:</h4></div>
                    <div class="col d-flex justify-content-end"><h4 id="grand-total">-</h4></div>
                </div>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-end">
            <a href="./?p=checkout" class="btn btn-sm btn-flat btn-dark">Checkout</a>
        </div>
    </div>
</section>




<!-- new one -->






<?php include 'footer.php'; ?>

<script>

function calc_total(){
        var total  = 0

        $('.total-amount').each(function(){
            amount = $(this).text()
            amount = amount.replace(/\,/g,'')
            amount = parseFloat(amount)
            total += amount
        })
        $('#grand-total').text(parseFloat(total).toLocaleString('en-US'))
    }
    function qty_change($type,_this){
        var qty = _this.closest('.cart-item').find('.cart-qty').val()
        var price = _this.closest('.cart-item').find('.price').text()
            price = price.replace(/,/g,'')
            console.log(price)
        var cart_id = _this.closest('.cart-item').find('.cart-qty').attr('data-id')
        var new_total = 0
        start_loader();
        if($type == 'minus'){
            qty = parseInt(qty) - 1
        }else{
            qty = parseInt(qty) + 1
        }
        price = parseFloat(price)
        // console.log(qty,price)
        new_total = parseFloat(qty * price).toLocaleString('en-US')
        _this.closest('.cart-item').find('.cart-qty').val(qty)
        _this.closest('.cart-item').find('.total-amount').text(new_total)
        calc_total()

        $.ajax({
            url:'classes/Master.php?f=update_cart_qty',
            method:'POST',
            data:{id:cart_id, quantity: qty},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    end_loader()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    function rem_item(id){
        $('.modal').modal('hide')
        var _this = $('.rem_item[data-id="'+id+'"]')
        var id = _this.attr('data-id')
        var item = _this.closest('.cart-item')
        start_loader();
        $.ajax({
            url:'classes/Master.php?f=delete_cart',
            method:'POST',
            data:{id:id},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    item.hide('slow',function(){ item.remove() })
                    calc_total()
                    end_loader()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    function empty_cart(){
        start_loader();
        $.ajax({
            url:'classes/Master.php?f=empty_cart',
            method:'POST',
            data:{},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("an error occured", 'error');
                end_loader()
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                   location.reload()
                }else{
                    alert_toast("an error occured", 'error');
                    end_loader()
                }
            }

        })
    }
    $(function(){
        calc_total()
        $('.min-qty').click(function(){
            qty_change('minus',$(this))
        })
        $('.plus-qty').click(function(){
            qty_change('plus',$(this))
        })
        $('#empty_cart').click(function(){
            // empty_cart()
            _conf("Are you sure to empty your cart list?",'empty_cart',[])
        })
        $('.rem_item').click(function(){
            _conf("Are you sure to remove the item in cart list?",'rem_item',[$(this).attr('data-id')])
        })
    })
</script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>