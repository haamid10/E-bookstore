



<?php
if ($pwdCheck == false) {
        header("Location:home.php?error=wrongpassword");
        exit();
      }
      else if ($pwdCheck == true) {
        session_start();
        $_SESSION['id'] = $row['idUsers'];
        $_SESSION['userUid'] = $row['uidUsers'];

        header("Location: ../index.php?logging=succes");
        exit();
?>


<?php
     require "header.php";
      require "includes/dbh.inc.php";
         $sessionkk = $_SESSION['userId'];
         error_reporting(E_ALL); ini_set('display_errors', 1);

      $query = "SELECT idUsers, uidUsers, emailUsers,pwdUsers,Voornaam,Tussenvoegsel,Achternaam,Schooljaar,School,Opleiding,Niveau,Recht,Taal 
 , 
 printerA,printerB,printerC FROM users WHERE idUsers = '$sessionkk'";
   $result = $conn->query($query) or die($conn->error);

   if(mysqli_num_rows($result) > 0){
   while ($row = mysqli_fetch_assoc($result)){
   $id = $row['idUsers'];
   $username = $row['uidUsers'];
   $email = $row['emailUsers'];
   $password = $row['pwdUsers'];
   $voornaam = $row['Voornaam'];
   $tussenvoegsel = $row['Tussenvoegsel'];
   $achternaam = $row['Achternaam'];
   $Schooljaar = $row['Schooljaar'];
   $School = $row['School'];
   $Opleiding = $row['Opleiding'];
   $niveau = $row['Niveau'];
   $Taal = $row['Taal'];
   $printera = $row['printerA'];
   $printerb = $row['printerB'];
   $printerc = $row['printerC'];

}
}





?>

  <div class="adminform">
      <h2>gegevens aanpassen</h2><br/>
          <form action="includes/update.inc.php" method="POST">
              <input type="text" name="username" placeholder="Username" 
value=" 
<?php if(isset($_GET['username'])){echo $_GET['username'];}?>"><br/><br/>
          <input type="text" name="email" placeholder="E-mail" value="<?php 
if(isset($_GET['email'])){echo $_GET['email'];}?>"><br/><br/>
          <input type="text" name="" placeholder="Schooljaar" value="<?php 
if(isset($_GET['Schooljaar'])){echo $_GET['Schooljaar'];}?>"><br/><br/>
          <input type="text" name="email" placeholder="E-mail" value="<?php 
    if(isset($_GET['School'])){echo $_GET['School'];}?>"><br/><br/>
          <button type="submit" name="adminupdate">Aanpassen</button>
      </form>
      <?php
        echo "" . $id;

       ?>
  </div>
 <?php
      }
 ?> 