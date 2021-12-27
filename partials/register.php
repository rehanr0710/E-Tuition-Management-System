<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'config.php';
  $enroll_id = $_POST['Enroll_id'];
  $roll_no = $_POST['rollNo'];
  $name = $_POST['name'];
  $name = strtolower($name);
  $mobile_no = $_POST['mobileNo'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $fathers_name = $_POST['fathersName'];
  $mothers_name = $_POST['mothersName'];
  $parents_no = $_POST['parentsNo'];
  $class = $_POST['class'];
  $emailAddress = $_POST['emailAddress'];
  $password = $_POST['password'];
  $dateofbirth = $_POST['dateofbirth'];
  $a='class';
  $b=$_POST['medium'];

  $sql = "SELECT * FROM registered_students WHERE enrollement_no = $enroll_id AND parent_contact_no=$parents_no AND class=$class";

  $enroll_query=mysqli_query($conn,$sql);

  $enroll_cnt=mysqli_num_rows($enroll_query);
  if($enroll_cnt<1){
    ?>
    <script>
      alert("Either Enrollment ID doesn't exist or combination of Enrollment ID,Parents contact,Class DOESN'T match!");
    </script>
    echo "<script>
          window.location='./index.php';
      </script>";
    <?php
  }

    // Attempt insert query execution
  $emailquery="select * from $a$class$b where Email_Address='$emailAddress'";
  $query=mysqli_query($conn1,$emailquery);
  $emailcount=mysqli_num_rows($query);

  if($emailcount>0){
    ?>
    <script>
      alert("Email Already Exists");
    </script>
    echo "<script>
          window.location='./index.php';
      </script>";
    <?php
  }
  else {
    $rollnoquery="SELECT * FROM $a$class$b  WHERE Roll_No='$roll_no'";
    $rollquery=mysqli_query($conn1,$rollnoquery);
    $rollno_count=mysqli_num_rows($rollquery);
    if($rollno_count>0)
    {
      ?>
      <script>
        alert('Cannot Enter same Roll No');
      </script>
      echo "<script>
          window.location='./index.php';
          </script>";
      <?php

    }
    else{
      if(strlen($mobile_no)==10 and strlen($parents_no)==10){
        $sql ="UPDATE $a$class$b SET Roll_No='$roll_no',Name='$name',Mobile_No= '$mobile_no',Address='$address',Gender='$gender',Fathers_Name='$fathers_name',Mothers_Name='$mothers_name',Email_Address='$emailAddress',Password='$password',dateofbirth='$dateofbirth' WHERE Enrollment_ID = '$enroll_id'";
        if(mysqli_query($conn1, $sql)){
          echo '<script>alert("Registered successfully now please login to proceed")</script>';
          echo "<script>
              window.location='index.php';
            </script>";
        } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn1);
        }
      }
      else{
        ?>
        <script >
          alert('Please enter valid phone number(10 digits)!');
        </script>
        echo "<script>
              window.location='./index.php';
          </script>";
        <?php
      }
    }
  }
}
?>
