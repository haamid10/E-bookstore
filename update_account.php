


<?php

// include 'config.php';

// if(isset($_GET['submit'])){

//    $name = mysqli_real_escape_string($conn, $_POST['name']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

//    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query f11ailed');

//    if(mysqli_num_rows($select_users) > 0){
//       $message[] = 'u!';
   
      
//          mysqli_query($conn, "UPDATE `users` SET (name, email, password, user_type) VALUES('$name', '$email', '$pass')") or die('query failed');
//          $message[] = 'registered successfully!';
//          header('location:home.php');
//       }
//       else{
//         die();
//         header("location: update_account.php");
//       }
   
//     }


// require("config.php");
// if($conn){
//         if(isset($_POST['submit'])){
//            $id = $_GET['id'];
//            $name = $_POST['name'];
//            $email = $_POST['email'];
//            $password = $_POST['password'];
//            $query = "UPDATE `users` SET `name` ='".$name."', `email` ='".$email."' , `password` = $password, WHERE `d` = $id";
//           $result =  mysqli_query($conn , $query);
//            if(!$result){
//              echo "NO UPDATED"; }
//            else{
//              header("location:home.php");
//              echo "UPDATED"; }

//         }    
//     else {
//      echo "DATA NO SETTED";}
// }
// else{
//   die("NO CONNECTION");}
// ?>


// ?>

<!-- 

// <!DOCTYPE html>
// <html lang="en">
// <head>
//    <meta charset="UTF-8">
//    <meta http-equiv="X-UA-Compatible" content="IE=edge">
//    <meta name="viewport" content="width=device-width, initial-scale=1.0">
//    <title>register</title>

//    <!-- font awesome cdn link  -->
//    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

//    <!-- custom css file link  -->
//    <link rel="stylesheet" href="css/style.css">

// </head>
// <body> -->



// <?php
// if(isset($message)){
//    foreach($message as $message){
//       echo '
//       <div class="message">
//          <span>'.$message.'</span>
//          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
//       </div>
//       ';
//    }
// }
// ?>
   
<!-- // <div class="form-container">

//    <form action="" method="post">
//       <h3>register now</h3>
//       <input type="text" name="name" placeholder="enter your name" required class="box">
//       <input type="email" name="email" placeholder="enter your email" required class="box">
//       <input type="password" name="password" placeholder="enter your password" required class="box">
      
    
//       <input type="submit" name="submit" value="register now" class="btn">
//    </form>

// </div>

// </body>
// </html> -->



<?php

// php code to Update data from mysql database Table
// include 'config.php';

// if(isset($_GET['submit'])){

if(isset($_POST['edit']))
{
    
   $hostname = "localhost";
   $username = "root";
   $pass= "";
   $databaseName = "shop_db";
   
   $connect = mysqli_connect($hostname, $username, $pass, $databaseName);
   
   // get values form input text and number

   
          
                 
        
   
   $id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);
  //  $pass =($connect, md5($_POST['password']));

           
   // mysql query to Update data
   $password = $_POST['password'];
   $query = "UPDATE `users` SET `name`='".$name."',`email`='".$email."',`password`= '".$password."' WHERE `id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
     header("location:home.php");
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
   die();
}

?>

<!DOCTYPE html>

<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link  -->   <link rel="stylesheet" href="css/style.css">
    <head>

        <title> PHP UPDATE DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <form id="edit" class="form_container" action="" method="post">


            ID:<input type="number" name="id" required><br><br>

            New  Name:<input type="text" name="name" required><br><br>

            New Email:<input type="email" name="email" required><br><br>

            New pass<input type="md5" name="password"  required><br><br>

            <input type="submit" name="edit" value="Update Data">

        </form>

    </body>


</html>
