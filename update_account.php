


<?php


include 'config.php';

session_start();

// $id = $_SESSION['id'];


 if(isset($_POST['edit']))
 {
    // $id=$_POST['id'];
    // $name=$_POST['name'];
    // $email=$_POST['email'];
    // $password=$_POST['password'];
    // $user_type=$_POST['user_type'];
    $select= "SELECT * FROM `users` WHERE id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    // if($res === $id)
    // {
   
       $update = "UPDATE `users` SET name = '$_POST[name]',email = '$_POST[email]',password = '$_POST[password]', user_type = '$_POST[user_type]' WHERE id = '$_POST[id]'";
       $sql2 = mysqli_query($conn,$update);
     

       
if($sql2==$row)
       { 
           /*Successful*/
           header('location:home.php');
           
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:Profile_edit_form.php');
        echo("wax yarba khaldan");

       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:Profile_edit_form.php');
        echo("wax waynba khaldan");
    }
//  }
?>