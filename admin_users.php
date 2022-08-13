<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

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
      $message[] = 'user already exist!';
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
   
<?php include 'admin_header.php';
  ?>

<section class="search-form">


<form  method="post" name="searchdeals">
                <h5 class="display-5 text-left py-3">Find a favourite vehicle </h5>
                <div class="form-group select">
                    <select name="manufacturer_code" id="manufacturer_code" class="form-control" onchange="getState(this.value);">
                        <option selected>Select Brand</option>
                        <?php $ret="SELECT * FROM shop_db";
                        $query= $dbh -> prepare($ret);
                        $query-> execute();
                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                        if($query -> rowCount() > 0)
                        {
                            foreach($results as $result)
                            {
                                ?>
                                <option value="<?php echo htmlentities($result->manufacturer_code);?>"><?php echo htmlentities($result->manufacturer_name);?></option>
                            <?php }} ?>
                    </select>
                </div>
                <div class="form-group select">
                    <select name="model_code" id="model_code" class="form-control">
                        <option selected>Select Model</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="searchdeals" value="Filter" class="btn btn-block btn-warning"><i class="fa fa-search" aria-hidden="true"></i> Search Vehicle</button>
                </div>
            </form>
   
</section>


<section class="users">
<form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
         <a type="submit" value="update"  class="option-btn" href="admin_edit.php">click here </a>
      </div>
      <?php
         };
      ?>


   </div>
   <a href="admin_registration.php" type="submit" name="submit" value="register now" class="btn">register</a>


   
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

</section>





<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>