<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  include "../partials/config.php";
  $name = $_POST['name'];
  $name = strtolower($name);
  $mobile_no = $_POST['mobileNo'];
  $class = $_POST['class'];
  $totalfees = $_POST['totalfees'];
  $paidfees = $_POST['paidfees'];
  $remfees = $_POST['remfees'];
  $medium = $_POST['medium'];
  $a='class';
  $b = 'result';

  $sql = "INSERT INTO registered_students VALUES (NULL,'$name','$mobile_no','$class','$medium','$totalfees','$paidfees','$remfees',current_timestamp())";

  if(mysqli_query($conn, $sql)){
    $sql1 = "SELECT enrollement_no FROM registered_students WHERE name_of_stu='$name' AND class='$class' AND parent_contact_no = '$mobile_no'";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $enroll_id = $row["enrollement_no"];
      }
    }


    $sql2 = "INSERT INTO $a$class$medium VALUES ($enroll_id,NULL, '$name', NULL, NULL, NULL, NULL, NULL, '$mobile_no', NULL, NULL,NULL)";
    $sql3 = "INSERT INTO $a$class$medium$b (Enrollment_ID) VALUES ($enroll_id)";

    if(mysqli_query($conn1, $sql2) && mysqli_query($conn1, $sql3)){
      echo '<script type="text/javascript">alert("Student registered with enrollement_no:- '.$enroll_id.'");</script>';
      echo "<script>
            window.location='receptionist.php';
          </script>";
  }
  else{
        echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn1);

    } }else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
} ?>
