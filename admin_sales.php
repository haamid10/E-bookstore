

<?php

include 'config.php';
include 'admin_header.php';

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




<!DOCTYPE html>


<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
   
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>

</head>

<body>
    <main class="main" id="main">
    <div class="pagetitle">
      <h1>Summery Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_page.php">Home   </a></li>
          <li class="breadcrumb-item active"><a href="admin_sales.php">Report  </a></li>
        </ol>
      </nav>
    </div>

<!-- sales search -->
<section class="section">
  
         <div class="text-center">
                    <button> <a href="admin_search.php" class="btn btn-primary" id="print-btn">Search </a> </button>
                </div>
   
 </section>
   
   
<!-- ende of search -->





<section class="section">

  <div class="col-lg-16">
   <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title">Order  tables</h5> -->
             
              <!-- Small tables -->
              <table class="table table-hover">
                <thead>
                  <tr>
                   
                       
                        <th scope="col">user Id</th>       
                        <th scope="col">name</th>          
                        <th scope="col">phone</th>         
                        <th scope="col">city</th>          
                        <th scope="col">country</th>       
                        <th scope="col">street</th>        
                        <th scope="col">email</th>         
                        <th scope="col">quantity</th>       
                        <th scope="col">price</th>           
                        <th scope="col">payment method</th>
                        <th scope="col">placed on</th>     
                        <th scope="col">payment status</th>
                       
                       

                  </tr>
                </thead>
                <tbody>
                <?php
                        // $sn = 1;
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                        if(mysqli_num_rows($select_orders) > 0){
                           while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                       ?>
                  <tr>
                  <td scope="row"><?php echo $fetch_orders['user_id'];  ?></td>
                                <td><?php echo $fetch_orders['name'];  ?></td>
                                <td><?php echo $fetch_orders['number'];  ?></td>
                                <td><?php echo $fetch_orders['city'];  ?></td>
                                <td><?php echo $fetch_orders['country'];  ?></td>
                                <td><?php echo $fetch_orders['street'];  ?></td>
                                <td><?php echo $fetch_orders['email'];  ?></td>
                                <td><?php echo $fetch_orders['total_products'];  ?></td>
                                <td><?php echo $fetch_orders['total_price'];  ?></td>
                                
                                
                                
                                <td><?php echo $fetch_orders['payment_status'];  ?></td>
                                <td><?php echo $fetch_orders['placed_on'];  ?></td>
                                <td><?php echo $fetch_orders['method'];  ?></td>
                               
           
          
            
         
                                
                  </tr>
                  <?php
                            $sn++;
                        }
                      }
                    
                        ?>
                </tbody>
              </table>
              <div class="text-center">
                <button   id="print-btn"><a class="btn btn-primary" href="sales_print.php"> print now </a> </button>
                </div>
              <!-- End small tables -->

            </div>
          </div>
  </div>
</section>

</main>


    <script src="../assets/scripts/admin_bus.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
</body>

</html>



            
           
       
   


                    

















