<?php


include 'config.php';

session_start();


    if(isset($_POST['adminupdate'])){

     $sql = " UPDATE users SET  id= '?', email = '?', password = '?',; 
     School = '?' WHERE idUsers = '.$sessionkk.'";
                 $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                       header("Location: ../profile.php?error=sqlerror");
                      exit();
                } else{
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, 
          $Schooljaar, $School);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../profile.php?update=succes");
                    exit();
                }
              }
     ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../style.css" /> -->
  
</head>
<body>
 <!-- Sidebar -->
 <!-- <div id="mySidenav" class="sidenav">
      <p class="logo"><span>Al</span>-Ridwaan</p>
      <a href="../application/root.html" class="icon-a"
        ><i class="fa fa-dashboard icons"></i> Dashboard</a
      >
      <a href="../application/pages/customers.php" class="icon-a"
        ><i class="fa fa-users icons"></i>Customer Registration</a
      >
      <a href="../application/pages/documents.html" class="icon-a"
        ><i class="fa fa-list icons"></i>Document Saving</a
      >
      <a href="../application/pages/agreements.html" class="icon-a"
        ><i class="fa fa-tasks icons"></i>Agreements</a
      >
      <a href="../application/pages/finance.html" class="icon-a"
        ><i class="fa fa-user icons"></i>Finance</a
      >
      <a href="../application/pages/report.html" class="icon-a"
        ><i class="fa fa-list-alt icons"></i>Reports</a
      >
    </div>
 -->
        <!-- Main -->
    <!-- <div id="main">
      <div class="col-div-6">
        <span style="font-size: 30px; cursor: pointer; color: white" class="nav"
          >☰Register Form</span
        >
        <span
          style="font-size: 30px; cursor: pointer; color: white"
          class="nav2"
          >☰Register Form</span
        >
      </div>

      <div class="col-div-6">
        <div class="profile">
          <img src="/Hakiim.jpg" class="pro-img" />
          <p>Abdihakim Osman<span> Admin</span></p>
        </div>
      </div> -->

      <!-- <div class="col-div-8">
        <form
          action="Profile_edit_form.php"
          method="POST"
          class="form-controller"
        > -->


        <!-- <?php

include 'config.php';

session_start();

// $id = $_SESSION['id'];

// if(!isset($id)){
 
//          if($conn){
//          if(isset($_GET['Update'])){
//            $id = $_GET['id'];
//            $name = $_POST['name'];
//            $email = $_POST['email'];
//            $password = $_POST['password'];
//            $result = 0;

//            $query = "SELECT * FROM users WHERE id = $id";
//            $query2 = "UPDATE customer SET name ='$name', email ='$email' , password = '$password',  WHERE id = $id";
//            $result2 =  mysqli_query($conn , $query2);
//             if(!$result2)
//             echo "NO UPDATED"; 
//             else
//               header("location:home.php");
//            $message[] = ' updated!';

             
//            $result = mysqli_query($conn , $query);

//            if(mysqli_num_rows($result) > 0){
//              while($rows =  mysqli_fetch_assoc($result)){
//               $id=  $rows['id'];
//               $name = $rows['name'];
//               $email=  $rows['email'];
//               $password = $rows['password'];
            //  }
//            }

//         }          
           
//      else 
//       echo "DATA NO SETTED";
//  }
//  else
//    die("NO CONNECTION");  
         
// }
        
        
        // ?>
       
            <input type="text" readonly name="id" placeholder="Customer ID....." value="<?php echo $id ?>" />
         
        
            <input type="text" name="name" placeholder="Customer Name....." value="<?php echo $name ?>" />
         
        
            <input
              type="text" name="email" placeholder="Customer Address....." value="<?php echo $email ?>"
            />
         
        
            <input type="password" name="password" placeholder="Customer Phone....." value="<?php echo $password ?>" />
         
     
            <!-- <input type="date" name="r_date" placeholder="Register Date....." value="<?php echo $date ?>"   /> -->
         
<!--         
            <button type="submit" name="send" class="save-btn">Submit</button>
         
        </form>
      </div>
    </div>
</body>
</html> --> -->
