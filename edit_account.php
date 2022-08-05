<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>IT SourceCode</title>
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/style.css">
  </head>

  
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
  <?php
  
  
$user_id=$_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM users where id='$user_id'")or die();
$row=mysqli_fetch_array($query);
  ?>
  <h1>User Profile</h1>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your name" value="<?php echo $row['name']; ?>" required />
          </div>
          <div class="form-group">
           
         
          <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" name="email" style="width:20em;" required placeholder="Enter your email" value="<?php echo $row['email']; ?>"></textarea>
          </div>
          <!-- <div class="form-group">
            <label>password</label>
            <input type="password" class="form-control" name="password" style="width:20em;" required placeholder="Enter your password" value="<?php 
            //echo $row['password']; ?>"></textarea>
          </div> -->
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        //$password = $_POST['password'];
      $query = "UPDATE users SET name = '$name',
                     password = $password, email = '$email'
                      WHERE id = '$user_id'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
              alert("Update Successfull.");
              window.location = "home.php";
              </script>
        <?php
             }               
?>