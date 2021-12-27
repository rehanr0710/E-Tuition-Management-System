

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <button type="button" name="button"><a href="pdf1.php">Download Question Paper</a></button>
    <button type="button" name="button"><a href="pdf2.php">Download Paper With Answer Key</a></button>
  </body>
</html>




<?php
// require_once("../partials/config.php");
// require('../fpdf182/fpdf.php');
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',12);
//
// $pdf1 = new FPDF();
// $pdf1->AddPage();
// $pdf1->SetFont('Arial','B',12);
//
//
// $ret ="SELECT qid,question,answer FROM algebra7subjective";
// $result = mysqli_query($conn2,$ret);
// $cnt=1;
// $c=1;
// if(mysqli_num_rows($result) > 0){
// while($row = mysqli_fetch_assoc($result)){
//   $pdf->SetFont('Arial','',12);
//   $pdf1->SetFont('Arial','',12);
//   foreach($row as $column){
//     if($cnt%2==1){
//   $pdf->Cell(46,12,'Q'.$c.' :-  '.$column,0,1);
//   $pdf1->Cell(46,12,'Q'.$c.' :-  '.$column,0,1);
//   $c+=1;
//   }else{
//     $pdf->Cell(46,12,'Ans :-  '.$column,0,1);
//   }
//   $cnt+=1;
// }
// }
// }
// $pdf1->Output();
// $pdf->Output();

?>
