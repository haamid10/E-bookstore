

<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}





?>
<?php 

if(isset($_POST['search'])){
   $str = $_GET['search'];
   
} ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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
  

<section class="section">
   <form action="" method="post" class="search-form">
      <input type="text" name="search" placeholder="search products..." >
      <input type="submit" name="submit" value="search" class="btn">
   </form>
   <h2>Summury Report</h2>
</section>





<section class="overflow-x-auto relative shadow-md lg:rounded-lg  bg-blue-100 w-full pr-12">
<?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_sales = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_sales) > 0){
         while($fetch_sales = mysqli_fetch_assoc($select_sales)){
   ?>

               
                <form action="" method="post"  class="" class="w-32 h-auto text-sm text-left text-black dark:text-gray-400">
    <table class="w-fit" >
        <thead class="text-xs text-black uppercase bg-gray-50  dark:text-gray-400 " >
            <tr class=" w-2">
               
                       <th   scope="col" class="py-1 px-1">user Id</th>       
                        <th  scope="col" class="py-2 px-1 " >name</th>          
                        <th  scope="col" class="py-2 px-1 " >phone</th>
                        <th  scope="col" class="py-2 px-1 " >price</th>           
                        <th  scope="col" class="py-2 px-1 " >city</th>          
                        <th  scope="col" class="py-2 px-1 " >country</th>       
                        <th  scope="col" class="py-2 px-1 " >street</th>        
                        <th  scope="col" class="py-2 px-1 " >email</th>         
                        <th  scope="col" class="py-2 px-1 " >quantity</th>                     
                        <th  scope="col" class="py-2 px-1 " >payment method</th>
                        <th  scope="col" class="py-2 px-1 " >placed on</th>     
                        <th  scope="col" class="py-2 px-1 " >payment status</th>
            </tr>
        </thead>
        <tbody class=" ml-0 gap-2 w-2">
            <!-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="py-4 px-6">
                    Sliver
                </td> -->
                <input type="hidden"   name="total_product" min="1" value="1">
      <input type="hidden" name="id" value="<?php echo $fetch_sales['id']; ?>">
     <td   class=" w-2"> <input type="text" name="user_id" value="<?php echo $fetch_sales['user_id']; ?>"></td>
      <td   class=" w-2"><input type="text" name="name" value="<?php echo $fetch_sales['name']; ?>"></td>
     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['number']; ?>"></td>
      <td   class=" w-2"><input type="text" name="name" value="<?php echo $fetch_sales['total_price']; ?>"></td>
      <td   class=" w-2"><input type="text" name="name" value="<?php echo $fetch_sales['city']; ?>"></td>
      <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['country']; ?>"></td>
      <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['street']; ?>"> </td>
     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['email']; ?>"> </td>
     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['total_products']; ?>"> </td>
     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['method']; ?>"> </td>

     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['placed_on']; ?>"> </td>
     <td   class=" w-2"> <input type="text" name="name" value="<?php echo $fetch_sales['payment_status']; ?>"> </td>
            </tr>
        </tbody>
    </table>
</div>
                </form>
                <?php
            }
         }else{
            echo '<p ">no result found!</p>';
         }
         
        }else{
         echo '<p >search something!</p>';
        }
      ?>
         <div class="text-center">
                    <button> <a href="admin_sales.php" class="btn btn-primary" id="print-btn">back</a> </button>
                    <button onclick="window.print();" class="btn btn-primary" id="print-btn">print now</button>
                </div>
                


 </section>
</body>
</html>