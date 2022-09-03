

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



          



   <form action="admin_edit.php" method="post">
      <h3>UPDATE NOW</h3>
      <input type="number" name="id" placeholder="enter your id" required class="box"></br>
      <input type="text" name="name" placeholder="enter your name" required class="box"></br>
      <input type="email" name="email" placeholder="enter your email" required class="box"></br>
      <input type="password" name="password" placeholder="enter your password" required class="box"></br>
      
      <select name="user_type" class="box">
      
         <option value="user">user</option>
         <option value="admin">admin</option>

      </select>

      <a name="update_user" href="admin_edit.php">Update</a>

</form>
</main>


</body>
</html>
