<?php
include 'partials/config.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  $_SESSION['emailAddress']=$_POST['emailAddress'];
  $emailAddress = $_POST['emailAddress'];
  $medium = $_POST['medium'];
  $password = $_POST['password'];
  $hash = "078d98d280c343fc99ce3947e1f7dbb5";
  $verify = hash("md5", $password);
  if($emailAddress == "admin@gmail.com" && $verify == $hash){
    $_SESSION['role'] = 'admin';
    header('location:admin/admin.php');
  } else {
    $query = "SELECT teacher_id,name FROM teachers WHERE email='$emailAddress' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['role'] = 'teacher';
      while($row = mysqli_fetch_assoc($results)){
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['name'] = $row['name'];
      }
      header('location:teacher/teacher.php');
    }
    else {
      $sql = "SELECT * FROM receptionist WHERE email='$emailAddress' AND password='$password'";
      $recep = mysqli_query($conn, $sql);
      if (mysqli_num_rows($recep) == 1) {
        $_SESSION['role'] = 'receptionist';
        while($row = mysqli_fetch_assoc($recep)){
          $_SESSION['recep_id'] = $row['recep_id'];
          $_SESSION['name'] = $row['name'];
        }
        header('location:receptionist/receptionist.php');
      }
      else {
        $arr = array(6,7);
        $a = 0;
        $b = 'class';
        $c = $medium;
        while ($a < sizeof($arr)) {
          $search = $b.$arr[$a].$c;
          $query = "SELECT * FROM $search WHERE Email_Address='$emailAddress' AND Password='$password'";
          $results = mysqli_query($conn1, $query);
          if (mysqli_num_rows($results) == 1) { 
            $_SESSION['role'] = 'student';
            while($row = mysqli_fetch_assoc($results)){
              $_SESSION['enrollID'] = $row['Enrollment_ID'];
              $_SESSION['class'] = $arr[$a];
              $_SESSION['medium'] = $c;
              $_SESSION['name'] = $row['Name'];
            }
            header('location:student/student.php');
            break;
          }
          $a=$a+1;
        }
        if($a==sizeof($arr)) {
          // remove all session variables
          session_unset();
          // destroy the session
          session_destroy();
          echo '<script>alert("Invalid email or password!")</script>';
          echo "<script>
                window.location='index.php';
              </script>";
        }
      }
    }
  }
}
else{
  header('location:404.php');
}
?>
