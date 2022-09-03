<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iqra Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>SALES REPORT</h1>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User_Id</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Method</th>
                                    <th>City</th>
                                    <th>Total Products</th>
                                    <th>Total Price</th>
                                    <th>Placed On</th>
                                    <th>Payment Status</th>
                                    <th>Street</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                
                                require("config.php");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM orders WHERE placed_on BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                  <td scope="row"><?php echo $row['user_id'];  ?></td>
                                <td><?php echo $row['name'];  ?></td>
                                <td><?php echo $row['number'];  ?></td>
                                <td><?php echo $row['city'];  ?></td>
                                <td><?php echo $row['country'];  ?></td>
                                <td><?php echo $row['street'];  ?></td>
                                <td><?php echo $row['email'];  ?></td>
                                <td><?php echo $row['total_products'];  ?></td>
                                <td><?php echo $row['total_price'];  ?></td>
                                <td><?php echo $row['payment_status'];  ?></td>
                                <td><?php echo $row['placed_on'];  ?></td>
                                <td><?php echo $row['method'];  ?></td>
                              
                                
                  </tr>
                                           
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                        <a class = "printME " href = "javascript:window.print()" > PRINT </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>