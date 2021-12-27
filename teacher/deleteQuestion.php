<?php
include_once '../partials/config.php';
if(isset($_POST['submit'])){
  session_start();
  $arr = $_POST['check_list'];
  $table = $_SESSION['subjectfordelete'];
  $i=0;
  while($i<count($arr)){
    $a = $arr[$i];
    $sql = "DELETE FROM $table WHERE qid=$a";
    if(!mysqli_query($conn2,$sql)){
      print_r(mysqli_error($conn2));
    }
    $i = $i+1;
}if($i==count($arr)){
  echo '<script>alert("Questions Deleted Successfully!")</script>';
  echo "<script>
        window.location='teacher.php';
      </script>";
}
}?>
