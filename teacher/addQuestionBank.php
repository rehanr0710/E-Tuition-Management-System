<?php
include_once '../partials/config.php';
if(isset($_POST['submit'])){
  if($_FILES['csv_info']['name']){
    $sub = $_POST['subject'];
    $_SESSION['subject'] = $_POST['subject'];
    $result = mysqli_query($conn2, "SHOW TABLES LIKE '$sub'");
    $tableExists = mysqli_num_rows($result) > 0;
    if(!$tableExists){
      $query =    "CREATE TABLE $sub (
          `qid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          `chapter_no` int(11) NOT NULL,
          `question` text NOT NULL,
          `option1` text NOT NULL,
          `option2` text NOT NULL,
          `option3` text NOT NULL,
          `option4` text NOT NULL,
          `correctoption` text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
      mysqli_query($conn2,$query);
    }
    $arrFileName = explode('.',$_FILES['csv_info']['name']);
    if($arrFileName[1] == 'csv') {
      $handle = fopen($_FILES['csv_info']['tmp_name'], "r");
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $item1 = mysqli_real_escape_string($conn2,$data[0]);
        $item2 = mysqli_real_escape_string($conn2,$data[1]);
        $item3 = mysqli_real_escape_string($conn2,$data[2]);
        $item4 = mysqli_real_escape_string($conn2,$data[3]);
        $item5 = mysqli_real_escape_string($conn2,$data[4]);
        $item6 = mysqli_real_escape_string($conn2,$data[5]);
        $item7 = mysqli_real_escape_string($conn2,$data[6]);
        $import="INSERT into $sub values(NULL,'$item1','$item2','$item3','$item4','$item5','$item6','$item7')";
        mysqli_query($conn2,$import);
      }
      fclose($handle);
      echo '<script>alert("Import Done")</script>';
    
      echo "<script>
        window.location='teacher.php';
      </script>";
    }
    else {
      header('location:404.php');
    }
  }
}
?>
