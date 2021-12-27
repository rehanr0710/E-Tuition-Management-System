<?php
    session_start();
    include '../partials/config.php';
    unset($_SESSION['duration'],$_SESSION['end_time'],$_SESSION['start_time']);
    if(isset($_POST["submit"])) {
        $hashMap = $_SESSION['hashMap'];
        $qid = array_keys($hashMap);
        $i = 0;
        $count = 0;
        if($_SESSION['type']==1) {
            $hashMark = $_SESSION['hashMark'];
            while($i < sizeof($qid)) {
                if(isset($_POST[$qid[$i]])) {
                    if($_POST[$qid[$i]] == $hashMap[$qid[$i]]) {
                        $count = $count + $hashMark[$i];
                    } else {
                        $count = $count - $_SESSION['negMark'];
                    }
                }
                $i = $i + 1;
            }
        } else {
            while($i < sizeof($qid)) {
                if(isset($_POST[$qid[$i]])) {
                    if($_POST[$qid[$i]] == $hashMap[$qid[$i]]) {
                        $count = $count + $_SESSION['markPerQues'];
                    } else {
                        $count = $count - $_SESSION['negMark'];
                    }
                }
                $i = $i + 1;
            }
        }
        $medium = $_SESSION['medium'];
        $_SESSION['score'] = $count;
        $a  = 'class'.$_SESSION['class'].$medium.'result';
        $b = 'test'.$_SESSION['testID'];
        $c = $_SESSION['enrollID'];
        $sql = "UPDATE $a set $b = $count where Enrollment_ID = $c";
        if(!mysqli_query($conn1,$sql)){
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn1);
        } else {
            unset($_SESSION['testID'],$_SESSION['negMark'],$_SESSION['markPerQues'],$_SESSION['hashMap'],$_SESSION['score'],$_SESSION['type'],$_SESSION['hashMark']);
            if($_SESSION['resultType'] == "true") {
                unset($_SESSION['resultType']);
                echo '<script>alert("Your Score is '.$count.'")</script>';
                echo "<script>
                    window.location='student.php';
                </script>";
            } else {
                echo "<script>
                    window.location='student.php';
                </script>";
            }
        }
    }
?>
