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

        <form id="update" class="form_container" action="update_account.php" method="post">




            New  Name:<input type="text" name="name" required><br><br>

            New Email:<input type="email" name="email" required><br><br>

            New pass<input type="md5" name="password"  required><br><br>

            <input type="submit" name="update" value="Update Data">

        </form>

    </body>


</html>



