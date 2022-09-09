<?php

include 'config.php';

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
   <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Template Main CSS File -->
  <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="../css/admin_style.css"> -->

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative overflow-hidden bg-white">
  <div class="mx-auto max-w-7xl">
    <div class="relative z-10 bg-white pb-8 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
      <svg class="absolute inset-y-0 right-0 hidden h-full w-48 translate-x-1/2 transform text-white lg:block" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div>
        <div class="relative px-4 pt-6 sm:px-6 lg:px-8">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex flex-shrink-0 flex-grow items-center lg:flex-grow-0">
              <div class="flex w-full items-center justify-between md:w-auto">
                <!-- <a href="#">
                  <span class="sr-only">Your Company</span>
                  <img alt="Your Company" class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600">
                </a> -->
                <div class="-mr-2 flex items-center md:hidden">
                  <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/bars-3 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
           
          </nav>
        </div>

        <!--
          Mobile menu, show/hide based on menu open state.

          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute inset-x-0 top-0 z-10 origin-top-right transform p-2 transition md:hidden">
          <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5">
            <div class="flex items-center justify-between px-5 pt-4">
              <div>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
              </div>
              <div class="-mr-2">
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close main menu</span>
                  <!-- Heroicon name: outline/x-mark -->
                  <!-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg> -->
                </button>
              </div>
            </div>
            
            <a href="#" class="block w-full bg-gray-50 px-5 py-3 text-center font-medium text-indigo-600 hover:bg-gray-100">Log in</a>
          </div>
        </div>
      </div>

      <main class=" mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline capitalize">Read and visit us to Grow</span>
            <span class="block text-indigo-600 xl:inline">your mind</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
          
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:h-full lg:w-full" src="./uploaded_img/books.jpg" alt="">
  </div>
</div>


<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?></span> </p>
         <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>
   <section class="section">

  <div class="col-lg-16">
   <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title">Order  tables</h5> -->
             
              <!-- Small tables -->
              <table class="table table-hover">
                <thead>
                  <tr>
                   
                        <th scope="col"> Id</th>       
                        <th scope="col">name</th>          
                        <th scope="col">phone</th>         
                        <th scope="col">city</th>          
                           
                        <th scope="col">email</th>         
                        <th scope="col">quantity</th>       
                        <th scope="col">price</th>           
                        <th scope="col"> method</th>
                        <th scope="col">date</th>     
                        <th scope="col"> status</th>
                        <th scope="col"> update</th>
                       

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
                           
                                <td><?php echo $fetch_orders['email'];  ?></td>
                                <td><?php echo $fetch_orders['total_products'];  ?></td>
                                <td><?php echo $fetch_orders['total_price'];  ?></td>

                                
                                <td><?php echo $fetch_orders['payment_status'];  ?></td>
                                <td><?php echo $fetch_orders['placed_on'];  ?></td>
                                <td><?php echo $fetch_orders['method'];  ?></td>
                               
            <td> <form action="" method="post">
               <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>"></td>
            <td><select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select></td>
         
           <td> <input type="submit" value="update" name="update_order" class="btn btn-secondary"></td> 
           <td>   <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="btn btn-primary">delete</a>
           </form>
         </td>
          
            
         
                                
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








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>