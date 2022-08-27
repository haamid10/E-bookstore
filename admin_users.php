<?php


include 'config.php';


session_start();


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>
<?php



if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      // $message[] = 'user!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:admin_users.php');
      }
   }

}

if(isset($_POST['search'])){
   $str = $_GET['search'];
   
}




?>

<!DOCTYPE html>

<?php include 'admin_header.php'; ?>
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


</head>

<body>




 <main class="main" id="main">

<div class="heading">
   <h3>search page</h3>
   <p> <a href="admin_users.php">users</a> / search </p>
</div>

<section class="search-bar">
   <form class="search-form d-flex align-items-center" action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <!-- <input type="submit" name="submit" value="search" class="btn"> -->
      <!-- <input type="text" name="query" placeholder="Search" title="Enter search keyword"> -->
        <button><input type="submit" name="submit" value="search"><i class="bi bi-search"></i></button>
   </form>
</section>

<section class="section" style="padding-top: 0;">

   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE id LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_users) > 0){
         while($fetch_users = mysqli_fetch_assoc($select_users)){
   ?>
   <form action="" method="get" class="box">
     
      <input type="number"  class="qty" name="product_quantity" min="1" value="1">
 

      <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <td>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
         <a href="admin_edit.php?id=<?php echo $fetch_users['id']; ?>">Update</a>
         </td>
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
  

</section>


<!-- users -->
<section class=" ">
 <div class="row align-items-center mb-32">
        <div class="col-lg-32">
           
      
 <div class="row-lg-3 ml-12  ">
   <div class="flex  flex-row justify-between items-center">



    
          <!-- Card with titles, buttons, and links -->
          <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
          <div class=" card mb-32 ml-12">
            <div class="card-body">
              <h5 class="card-title">user-id: <?php echo $fetch_users['id']; ?></h5>
              <h3 class="card-title"> Name: <?php echo $fetch_users['name']; ?> </span></h1>
              <h1 class="card-title"> Email: <?php echo $fetch_users['email']; ?></h1>
              <h1 class="card-title"> User-type: <?php echo $fetch_users['user_type']; ?></h1>
              <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="btn btn-primary">delete user</a>
              
             
              <a href="admin_edit.php?id=<?php echo $fetch_users['id']; ?> class="card-link"">Update</a>
             
            </div>
          </div><!-- End Card with titles, buttons, and links -->

          <?php
          } ?>
   </div>
 </div>
        </div>

 </div>
</section>


<section class="section">
?>


   </div>



   
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
   
<div class="user">

   <form class="box-container" action="" method="post">
      <h3 class="title">Add user</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="btn">

    
      
   </form>

  
   </div>
</div>

</section>


</main>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>