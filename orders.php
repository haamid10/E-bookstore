<?php

include 'config.php';
include 'header.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

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
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

</head>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

  

</head>
<body>
   




  




<section class=" mx-32 my-12">

  <div class="col-md-32">
   <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title">Order  tables</h5> -->
             
              <!-- Small tables -->
              <table class="table table-hover">
                <thead>
                  <tr>
                   
                        <th scope="col"  class=" ml-16 gap-3"> Id</th>       
                        <th scope="col"  class=" ml-16 gap-3">name</th>          
                        <th scope="col"  class=" ml-16 gap-3">phone</th>         
                        <th scope="col"  class=" ml-16 gap-3">city</th>          
                           
                        <th scope="col"  class=" ml-16 gap-3">email</th>         
                        <th scope="col"  class=" ml-16 gap-3">quantity</th>       
                        <th scope="col"  class=" ml-16 gap-3">price</th>           
                        <th scope="col"  class=" ml-16 gap-3"> method</th>
                        <th scope="col"  class=" ml-16 gap-3">date</th>     
                        <th scope="col"  class=" ml-16 gap-3"> status</th>
                       

                  </tr>
                </thead>
                <tbody class="">
                <?php
                        // $sn = 1;
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                        if(mysqli_num_rows($select_orders) > 0){
                           while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                       ?>
                  <tr  class=" ">
                  <td scope="row" "><?php echo $fetch_orders['user_id'];  ?></td>
                                <td "><?php echo $fetch_orders['name'];  ?></td>
                                <td "><?php echo $fetch_orders['number'];  ?></td>
                                <td><?php echo $fetch_orders['city'];  ?></td>
                           
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
              <!-- End small tables -->

            </div>
          </div>
  </div>
</section>

</section>


</main>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>