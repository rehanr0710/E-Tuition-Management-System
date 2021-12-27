<?php
include '../partials/config.php';
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
session_start();
// print_r($_SESSION['subject']);
// print_r($_SESSION['emailAddress']);
// print_r($_SESSION['duration']);
$checked_count = count($_POST['check_list']);
// Loop to store and display values of individual checked checkbox.
$arr = array();
// print_r($_POST['check_list']);
// print_r($_POST['check1_list']);
$maap = $_SESSION['hashmap'];
$maap1 = $_POST['check_list'];
$lst = array();
$j=0;
while($j<count($_POST['check_list'])){
  $ss=(int)$maap1[$j];
  array_push($lst,$maap[$ss]);
  $j=$j+1;
}

foreach($_POST['check1_list'] as $selected) {
  if($selected){
array_push($arr,$selected);}
}
// print_r($arr);
$temp1 = implode(',',$arr);
$temp3 = implode(',',$lst);
$temp2 = implode(',',$_POST['check_list']);
$testName = $_SESSION['testName'];
$class = $_SESSION['standard'];
$subject = $_SESSION['subject'];
$emailAddress = $_SESSION['emailAddress'];
$noOfQuestions = count($_POST['check_list']);
$duration = $_SESSION['duration'];
$startDate = $_SESSION['startDate'];
$startTime = $_SESSION['startTime'];
$negMark = $_SESSION['neg_mark'];
$resultType = $_SESSION['result_type'];
$medium = $_SESSION['medium'];
$sql = "INSERT INTO testdata VALUES(NULL, '$testName', '$class', '$medium', '$subject', current_timestamp(), '$emailAddress', '$noOfQuestions', '$temp2', '$temp3', '$temp1', '$duration', '$startDate', '$startTime', NULL, '$negMark', '$resultType','1')";

if(mysqli_query($conn,$sql)) {
    $sql1 = "select testid from testdata ORDER BY testid DESC LIMIT 1";
    $result = mysqli_query($conn,$sql1);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $testID = $row["testid"];
        }
        $a = 'class'.$class.$medium.'result';
        $b = 'test'.$testID;
        $sql2 = "ALTER TABLE $a ADD $b int";

        if(mysqli_query($conn1,$sql2)){
            echo '<script>alert("Question Paper Added Successfully")</script>';
            echo "<script>
                window.location='teacher.php';
            </script>";
        } else{
            echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn1);
        }
    } else{
        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
    }
} else {
    echo '<script>alert("Failed to add Question Paper!!!")</script>';
    echo "<script>
        window.location='teacher.php';
    </script>";
}


}
else{
echo "<b>Please Select Atleast One Question.</b>";
}
}
?>
