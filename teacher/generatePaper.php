<?php
session_start();
include '../partials/config.php';
if(isset($_POST["submit"])) {
    $testName = $_POST['testName'];
    $noOfQuestions = $_POST['noQuestions'];
    $chapters = $_POST['chapters'];
    $chapters = explode (",", $chapters);
    $questionCount = $_POST['questionCount'];
    $questionCount = explode (",", $questionCount);
    $duration = $_POST['duration'];
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $class = $_POST['standard'];
    $subject = $_POST['subject'];
    $markPerQues = $_POST['mark_per_question'];
    $negMark = $_POST['neg_mark'];
    $resultType = $_POST['result_type'];
    $medium = $_POST['medium'];

    $sum = 0;
    $i=0;
    $data1 = array();
    $data2 = array();
    while($i < sizeof($chapters)) {
        $query = "SELECT qid,correctoption FROM $subject WHERE chapter_no = '$chapters[$i]'";
        $result = mysqli_query($conn2,$query);
        if ($result->num_rows < $questionCount[$i] || $questionCount[$i]<='0'){
            echo '<script>alert("No of questions based on chapter '.$chapters[$i].' are less. Please reduce the no of questions")</script>';
            echo "<script>
                    window.location='teacher.php';
                </script>";
        }
        else {
            if ($result->num_rows > 0) {
                $qid = array();
                $correct = array();

                while($row = $result->fetch_assoc()) {
                    array_push($qid,$row['qid']);
                    array_push($correct,$row['correctoption']);
                }
                if($questionCount[$i] == 1) {
                    array_push($data1,$qid[0]);
                    array_push($data2,$correct[0]);
                } else {
                    $keys=array_rand($qid,$questionCount[$i]);
                    $j = 0;
                    while($j < $questionCount[$i]) {
                        array_push($data1,$qid[$keys[$j]]);
                        array_push($data2,$correct[$keys[$j]]);
                        $j = $j + 1;
                    }
                }
            }
        }
        $sum = $sum + $questionCount[$i];
        $i = $i + 1;
    }
    if($sum != $noOfQuestions) {
        echo '<script>alert("Total number of questions and sum of questions per chapter does not match")</script>';
        echo "<script>
            window.location='teacher.php';
        </script>";
    }
    else {
        $data1 = implode(",",$data1);
        $data2 = implode(",",$data2);
        $emailAddress = $_SESSION['emailAddress'];
        $sql = "INSERT INTO testdata VALUES(NULL, '$testName', '$class', '$medium', '$subject', current_timestamp(), '$emailAddress', '$noOfQuestions', '$data1', '$data2', NULL, '$duration', '$startDate', '$startTime', '$markPerQues', '$negMark', '$resultType','0')";

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
}
?>
