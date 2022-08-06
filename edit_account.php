<?php

include 'config.php';

session_start();

$id = $_SESSION['id'];
?>

<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="w-100 justify-content-between d-flex">
                    <h4><b>Update Account Details</b></h4>
                    <a href="./?p=my_account" class="btn btn btn-dark btn-flat"><div class="fa fa-angle-left"></div> Back to Order List</a>
                </div>
                    <hr class="border-warning">
                    <div class="col-md-6">
                        <form action="" id="update_account">
                        <input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
                            <div class="form-group">
                                <label for="name" class="control-label">name</label>
                                <input type="text" name="name" class="form-control form" value="<?php echo $_settings->userdata('name') ?>" required>
                              </div>
                           
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" name="email" class="form-control form" value="<?php echo $_settings->userdata('email') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">New Password</label>
                                <input type="password" name="password" class="form-control form" value="" placeholder="(Enter value to change password)">
                            </div>
                           
                            <div class="form-group d-flex justify-content-end">
                                <button class="edit_account.php">Update</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>


<?php
if(isset($_POST['update_product'])){

$update_p_id = $_POST['update_u_id'];
$update_name = $_POST['update_name'];
$update_price = $_POST['update_password'];

mysqli_query($conn, "UPDATE `users` SET name = '$update_name', password = '$update_password' WHERE id = '$update_u_id'") or die('query failed');

// $update_image = $_FILES['update_image']['name'];
// $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
// $update_image_size = $_FILES['update_image']['size'];
// $update_folder = 'uploaded_img/'.$update_image;
// $update_old_image = $_POST['update_old_image'];

// if(!empty($update_image)){
//    if($update_image_size > 2000000){
//       $message[] = 'image file size is too large';
//    }else{
//       mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
//       move_uploaded_file($update_image_tmp_name, $update_folder);
//       unlink('uploaded_img/'.$update_old_image);
//    }
// }

header('location:edit_account.php');

}
?>