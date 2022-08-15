
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
    <?php
    $currentUser = $_SESSION['user_name'];
    $sql = "SELECT * FROM users WHERE name = '$currentUser'";
    $query9 = mysqli_query($conn, $sql);
    if($query9 )
    {

        if($query9){
            if(mysqli_num_rows($query9)>0){
                while($row = mysqli_fetch_array($query9)){
                    // print_r($row['user_name']);
                    ?>
         <input type="text" name="name" value="userName" class="box" required placeholder="enter user name"></br>
      <input type="text" name="email" value="UserEmail" min="0" class="box" required placeholder="enter user email"></br>

                    <?php
                }
            }
        }
    }
    ?>
    <section class="update_account.php">
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_U_id" value="<?php echo $fetch_update['id']; ?>"></br>
      
      <input type="text" name="name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter user name"></br>
      <input type="text" name="email" value="<?php echo $fetch_update['email']; ?>" min="0" class="box" required placeholder="enter user email"></br>
      <input type="password" name="password" value="<?php echo $fetch_update['password']; ?>" min="0" class="box" required placeholder="enter user password"></br>
      <!-- <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png"> -->
      <input type="submit" value="update" name="update" class="btn" <?php echo $fetch_update['id']; ?>"></br>
      <input type="reset" value="cancel" id="close-update" class="option-btn"></br>
   </form>

   <?php
   include 'config.php';

   session_start();
   
   
   if(isset($_POST['update'])){
   
       $update_U_id = $_POST['id'];
       $update_name = $_POST['name'];
       $update_email = $_POST['email'];
       $update_password = $_POST['password'];
   
   
    
       mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email= '$update_email', password = '$update_password',WHERE id = '$update_U_id'") or die('query failed');
      if(isset($_GET['update'])){
         $update_id = $_GET['id'];
         $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
  
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
      header('location:update_account.php');
   }
   ?>

</section>
</body>
</html>

