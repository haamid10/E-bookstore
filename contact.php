<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/admin_style.css">

   <script src="https://cdn.tailwindcss.com"></script>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
<link href="style.css" rel="stylesheet">


</head>
<body>
   
<?php include 'header.php'; ?>








<div class="w-fit ml-32 rounded-lg ">
    <section class="relative block py-24 ">
       <div class="container  mx-auto px-4">
          <div class="mb-12  flex flex-wrap -mx-4 justify-center">
             <div class="px-4 relative w-full lg:w-8/12 text-center">
                
                <h3 class="text-6xl font-bold mt-3 mb-1 text-black">Type in the bellow form</h3>
                <p class="mt-2 mb-4 text-xl leading-relaxed text-black opacity-75">They say there's no future for the street rascals, nothing for them, leave them to fall. But it isn't always how you would like it to be, especially when you do nothing for yourself.</p>
             </div>
          </div>
          <div class="flex flex-wrap justify-center ">
             <div class="w-full lg:w-12/24 lg:h-12/24 px-4 ">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg  ">
                   <div class="flex-auto p-5 lg:p-10 bg-blue-200">
                      <h4 class="text-4xl uppercase font-semibold text-center">Want to inform  us?</h4>
                      <p class="leading-relaxed  mt-1 mb-4 text-center text-blueGray-500">Complete this form and we will get back to you in 24 hours.</p>
                      
   <form action="" method="post" class="flex flex-col ml-32 mr-24 text-black">
                     
                            <label class="block uppercase text-blueGray-500 text-2xl font-bold mb-2 ml-1">Full Name</label>
      <input type="text" name="name" required placeholder="enter your name" cols="30" rows="10" class="px-3 py-1 mt-2  uppercase bg-white rounded text-xl text-black shadow focus:outline-none focus:ring w-82 h-16 ease-linear transition-all duration-150 border-transparent">

                            <!-- <input placeholder="Full Name" type="text" class="px-3 py-3 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-82 ease-linear transition-all duration-150 border-transparent"> -->
                       
                            <label class="block uppercase text-blueGray-500 text-2xl font-bold mt-2 ml-1 mb-2">Email</label>
      <input type="email" name="email" required placeholder="enter your email" cols="30" rows="10" class="px-3 py-1 mt-2  uppercase bg-white rounded text-xl text-black shadow focus:outline-none focus:ring w-82 h-16 ease-linear transition-all duration-150 border-transparent">

                            <!-- <input placeholder="Email" type="email" class="px-3 py-3 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-82 ease-linear transition-all duration-150 border-transparent"> -->
                            <label class="block uppercase text-blueGray-500 text-2xl font-bold mt-2 ml-1 mb-2">Phone </label>
                        
      <input type="number" name="number" required placeholder="enter your number" class="px-3 py-1 mt-2 uppercase bg-white rounded text-xl text-black shadow focus:outline-none focus:ring w-82 h-16 ease-linear transition-all duration-150 border-transparent">
      
                            <label class="block uppercase text-blueGray-500 text-2xl mt-2 font-bold mb-2 ml-1">Message</label>
      <textarea name="message" placeholder="enter your message" id="" cols="30" rows="10"  class="mt-6 px-3 py-3 placeholder-blueGray-400 text-blueGray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-82 ease-linear transition-all duration-150 border-transparent"></textarea>

                            <!-- <textarea placeholder="Type a message..." type="textarea" rows="4" cols="80" class="px-3 py-3 placeholder-blueGray-400 text-blueGray-500 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 border-transparent"></textarea> -->
                     
      <input type="submit" value="send message" name="send" class="text-xl  px-4 py-2 shadow hover:shadow-md text-white w-48 mx-96 mt-12 rounded-lg border-blueGray-800  bg-blue-700 active:border-blueGray-900 outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold">

                         <!-- <button class="text-xs px-4 py-2 shadow hover:shadow-md text-white bg-blueGray-800 border-blueGray-800 active:bg-blueGray-900 active:border-blueGray-900 rounded outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold">Send Message</button> -->
                      </div>
   </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
 </div>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>