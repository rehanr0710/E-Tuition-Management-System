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
    $class = $_POST['standard'];
    $subject = $_POST['subject'];
    $medium = $_POST['medium'];
    $e='subjective';
    $d = $subject.$e;
    $sum=0;
    $i=0;
    $data1 = array();
    while($i < sizeof($chapters)) {
        $query = "SELECT qid FROM $d WHERE chapter_no = '$chapters[$i]'";
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

                while($row = $result->fetch_assoc()) {
                    array_push($qid,$row['qid']);
                }
                if($questionCount[$i] == 1) {
                    array_push($data1,$qid[0]);
                } else {
                    $keys=array_rand($qid,$questionCount[$i]);
                    $j = 0;
                    while($j < $questionCount[$i]) {
                        array_push($data1,$qid[$keys[$j]]);
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
      $_SESSION['subid'] = $d;
      $_SESSION['qidarray'] = $data1;
        $data1 = implode(",",$data1);
        $emailAddress = $_SESSION['emailAddress'];
        $sql = "INSERT INTO subjective_testdata VALUES(NULL, '$testName', '$class', '$subject', current_timestamp(), '$emailAddress', '$noOfQuestions', '$data1');";
        if(!mysqli_query($conn,$sql)) {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

            echo '<script>alert("Failed to add Question Paper!!!")</script>';
            echo "<script>
                window.location='teacher.php';
            </script>";
        }
        else {
          echo '<script>alert("Question Paper Added!!!")</script>';
          echo "<script>
              window.location='downloadSubPdf.php';
          </script>";
        }
    }
}
?>
