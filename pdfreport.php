<?php
require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

     $conn =mysqli_connect('localhost','root','','shop_db') or die('connection failed');
      $sales = ( "SELECT * FROM `orders` WHERE placed_on ='{$_POST['model']}'") ;
      $result= mysqli_query($conn,$sales);
    while($rows=mysqli_fetch_assoc($result)){
      $pdf->Cell(40,10,$rows['user_id'],0,0);
      $pdf->Cell(40,10,$rows['name'] ,0,0);
      $pdf->Cell(40,10,$rows['number'] ,0,0);
      $pdf->Cell(40,10,$rows['email'] ,0,0);
      $pdf->Cell(40,10,$rows['method'] ,0,0);
      $pdf->Cell(40,10,$rows['address'] ,0,0);
      $pdf->Cell(40,10,$rows['total_products'] ,0,0);
      $pdf->Cell(40,10,$rows['total_price'] ,0,1);
    }

     
      ?>
     
      
   </div>

<?php
    

$pdf->Output();
?>