<?php
    session_start();
    include '../partials/config.php';
    if(isset($_POST["submit"])){
        $hashMap = $_SESSION['hashMap'];
        $qid = array_keys($hashMap);
        $i = 0;
        $count = 0;
        while($i < sizeof($qid)) {
            if($_POST[$qid[$i]] == $hashMap[$qid[$i]]) {
                $count = $count + $_SESSION['markPerQues'];
            } else{
                $count = $count + $_SESSION['negMark'];
            }
            $i = $i + 1;
        }
        $_SESSION['score'] = $count;
        $a  = 'class'.$_SESSION['class'].'result';
        $b = 'test'.$_SESSION['testID'];
        $c = $_SESSION['enrollID'];
        $sql = "UPDATE $a set $b = $count where Enrollment_ID = $c";
        if(!mysqli_query($conn1,$sql)){
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn1);  
        } else {
            if($_SESSION['resultType'] == "true") {
                echo "<script>
                    window.location='displayResult.php';
                </script>";
            } else {
                echo "<script>
                    window.location='student.php';
                </script>";
            }
        }
    }
?>