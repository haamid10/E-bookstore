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
      <?php



if(isset($_GET['update'])){
    include 'config.php';

   
          
                 
        
   
   $id = $_GET['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);
  //  $pass =($connect, md5($_POST['password']));

           
   $query = "UPDATE `users` SET `name`='".$name."',`email`='".$email."',`password`= '".$password."' WHERE `id` = $id";
   
   $result = mysqli_query($conn, $query);
   
   if($result)
   {
     header("location:home.php");
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
   die();
}


?>
</body>


</html>