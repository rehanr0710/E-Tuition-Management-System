<?php
session_start();
$arr = $_SESSION['qidarray'];
$d = $_SESSION['subid'];
require_once("../partials/config.php");
require('../fpdf182/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(46,14,'Subjective Paper',0,1);
$c=0;
$x=1;
while($c<sizeof($arr)){
  $a=$arr[$c];
  $ret ="SELECT question FROM $d WHERE qid ='$a'";
  $result = mysqli_query($conn2,$ret);
  $pdf->SetFont('Arial','',13);
  if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    foreach($row as $column){
    $pdf->Multicell(0,8,'Q'.$x.' :-  '.$column,0,1);
      }
    }
  }
  $c+=1;
  $x+=1;
}

$pdf->Output();

?>
