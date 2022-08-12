<?php
include("config.php");

?>
<form action="update_account.php" method="post">
    name: <input type="text" name="name"><br>
    email: <input type="text" name="email" required><br>

   password: <input type="password" name="password"><br>
   user_type: <input type="password" name="user_type"><br>
   <input type="submit" name="edit" value="edit">
   
</form>
