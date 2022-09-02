<?php

include 'config.php';
include 'admin_header.php';



session_start();



 

// php code to Update data from mysql database Table
// include 'config.php';

// if(isset($_GET['submit'])){

if(isset($_POST['id']))
{
   include 'config.php';
   
   // get values form input text and number
   
   $id = $_GET['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $user_type = $_POST['user_type'];
  //  $pass =($connect, md5($_POST['password']));

           
   // mysql query to Update data
   $password = md5($_POST['password']);
   $query = "UPDATE `users` SET `name`='".$name."',`email`='".$email."',`password`= '".$password."', `user_type`= '".$user_type."' WHERE `id` = $id";
   
   $result = mysqli_query($conn, $query);
   
   if($result)
   {
     header("location:admin_users.php");
       echo 'Data Updated';
   }else{
      //   $message[] = 'payment status has been updated!';
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
   die();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
<main class="main" id="main">
   <form action="" method="post">
      <h3>UPDATE NOW</h3>
      <input type="hidden" name="id" placeholder="enter your id" required class="box"></br>
      <input type="text" name="name" placeholder="enter your name" required class="box"></br>
      <input type="email" name="email" placeholder="enter your email" required class="box"></br>
      <input type="password" name="password" placeholder="enter your password" required class="box"></br>
      
      <select name="user_type" class="box">
      
         <option value="user">user</option>
         <option value="admin">admin</option>

      </select>
      <input type="submit" value="update" name="update_user" class="option-btn">

</form>

</main>


</body>
</html>