<?php 
include '../config.php';

?>


<!DOCTYPE html>
<html lang="en">


<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="print.css" media="print">
    <!-- Font Awesome -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>

    <?php
    
    include '../config.php';
    
    ?>
    <style>
        .assets.styles.admin {
            display: none
        }

        #print-btn {
            border: white;

        }

        button {
            border: none;
        }
    </style>

</head>

<body>
    <?php include '../config.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Summury Report </h2>
                <table class="table table-bordered   " >
                    <thead>
                        <tr>
                        <th>user Id</th>       
                        <th>name</th>          
                        <th>phone</th>         
                        <th>city</th>          
                        <th>country</th>       
                        <th>street</th>        
                        <th>email</th>         
                        <th>quantity</th>       
                        <th>price</th>           
                        <th>payment method</th>
                        <th>placed on</th>     
                        <th>payment status</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <?php
                        // $sn = 1;
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                        if(mysqli_num_rows($select_orders) > 0){
                           while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                       ?>
                            <tr>
                                <td><?php echo $fetch_orders['user_id'];  ?></td>
                                <td><?php echo $fetch_orders['name'];  ?></td>
                                <td><?php echo $fetch_orders['number'];  ?></td>
                                <td><?php echo $fetch_orders['city'];  ?></td>
                                <td><?php echo $fetch_orders['country'];  ?></td>
                                <td><?php echo $fetch_orders['street'];  ?></td>
                                <td><?php echo $fetch_orders['email'];  ?></td>
                                <td><?php echo $fetch_orders['total_products'];  ?></td>
                                <td><?php echo $fetch_orders['total_price'];  ?></td>
                                
                                
                                
                                <td><?php echo $fetch_orders['payment_status'];  ?></td>
                                <td><?php echo $fetch_orders['placed_on'];  ?></td>
                                <td><?php echo $fetch_orders['method'];  ?></td>
                               
                            </tr>
                        <?php
                            $sn++;
                        }
                      }
                    
                        ?>
                    </tbody>

                </table>
                <div class="text-center">
                    <button> <a href="../admin_sales.php" class="btn btn-primary" id="print-btn">Back</a> </button>
                    <button onclick="window.print();" class="btn btn-primary" id="print-btn">print now</button>
                </div>


            </div>

        </div>


    </div>




    <script src="../assets/scripts/admin_bus.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>