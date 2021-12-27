<?php
  include '../partials/head.php';
?>
<?php
  session_start();

  if(!isset($_SESSION['emailAddress']))
  {
    echo '<script>alert("Please Log in to Proceed")</script>';
    echo "<script>
      window.location='../index.php';
    </script>";
  } else {
    if($_SESSION['role']!='student'){
      $a = 'location:../'.$_SESSION['role'].'/'.$_SESSION['role'].'.php';
      header($a);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Page</title>
  <style>
    body {
        background: url("bg.jpg");
      background-size:100%;
      background-repeat: no-repeat;
      position: relative;
      background-attachment: fixed;
    }
    /* button */
    .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 500px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;
    }
    .title{
      background-color: #ccc11e;
      font-size: 28px;
      padding: 20px;

    }
    .button3 {
        border: none;
        color: white;
        padding: 10px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }
    .button3 {
        background-color: white;
        color: black;
        border: 2px solid #f4e542;
    }

    .button3:hover {
        background-color: #f4e542;
        color: Black;
    }
  </style>
  <script>
    $(document).bind("contextmenu",function(e){return false;});
    $(document).ready(function () {
        $('body').bind('cut copy', function (e) {
            e.preventDefault();
        });
    });
  </script>
</head>
<body>
  Click here to <a href="../logout.php" tite="Logout">Logout.</a>
<?php
include '../partials/config.php';
$result = mysqli_query($conn, "SELECT * FROM testdata WHERE test_name='python 7'");

if($row = mysqli_fetch_array($result))
{
  $_SESSION['duration'] = $row['duration'];
  $_SESSION["start_time"] = date("Y-m-d H:i:s");
  $end_time = date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
  $_SESSION["end_time"] = $end_time;
  $_SESSION['testID'] = $row['testid'];
  $subject_id = $row['subject_id'];
  $question = $row['question_id_array'];
  $correctOption = $row['correct_option_array'];
  $question = explode (",", $question);
  $correctOption = explode (",", $correctOption);
  $_SESSION['negMark'] = $row['negative_mark'];
  $_SESSION['resultType'] = $row['instant_result'];
  $_SESSION['type'] = $row['type'];
  if($_SESSION['type']==0) {
    $_SESSION['markPerQues'] = $row['mark_per_question'];
  } else {
    $_SESSION['hashMark'] = explode (",", $row['corres_mark_per_question']);;
  }
  $hashMap = array();
  $i = 0;
  while($i < sizeof($question)){
    $hashMap[$question[$i]] = $correctOption[$i];
    $i = $i + 1;
  }
  $_SESSION['hashMap'] = $hashMap;
}
?>
<div class="title">Quiz</div>
  <div id="response"></div>
  <form action="checkAnswers.php" method="post">
    <table>
    <?php
      $i = 0;
      $allowTypes = array('.jpg','.png','.gif');
      while($i < sizeof($question)){
          $j = $question[$i];
          $sql = "SELECT question,option1,option2,option3,option4 FROM $subject_id WHERE qid = $j";
          $next = mysqli_query($conn2, $sql);
          $k = $next->num_rows;
          if ($k > 0) {
            while($row = $next->fetch_assoc()) {
              $z = substr($row['question'], -4);
              if(in_array($z, $allowTypes)) {
                ?><tr><td><br><?php echo "<img src='../".$row['question']."' width='600' height='400' >"; ?></td></tr><?php
              } else {
                ?>
                <tr><td><h3><br><?php echo $row['question']; ?></h3></td></tr>
                <?php
              }
              $z = substr($row['option1'], -4);
              if(in_array($z, $allowTypes)) {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option1']; ?>">&nbsp;
                  <?php echo "<img src='../".$row['option1']."' width='600' height='400' >"; ?>
                  </td></tr>
                <?php
              } else {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option1']; ?>">&nbsp;
                  <?php echo $row['option1']; ?>
                  </td></tr>
                <?php
              }
              $z = substr($row['option2'], -4);
              if(in_array($z, $allowTypes)) {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option2']; ?>">&nbsp;
                  <?php echo "<img src='../".$row['option2']."' width='600' height='400' >"; ?>
                  </td></tr>
                <?php
              } else {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option2']; ?>">&nbsp;
                  <?php echo $row['option2']; ?>
                  </td></tr>
                <?php
              }
              $z = substr($row['option3'], -4);
              if(in_array($z, $allowTypes)) {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option3']; ?>">&nbsp;
                  <?php echo "<img src='../".$row['option3']."' width='600' height='400' >"; ?>
                  </td></tr>
                <?php
              } else {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option3']; ?>">&nbsp;
                  <?php echo $row['option3']; ?>
                  </td></tr>
                <?php
              }
              $z = substr($row['option4'], -4);
              if(in_array($z, $allowTypes)) {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option4']; ?>">&nbsp;
                  <?php echo "<img src='../".$row['option4']."' width='600' height='400' >"; ?>
                  <br><br><br></td></tr>
                <?php
              } else {
                ?>
                  <tr><td>
                  <input name="<?php echo $question[$i]; ?>" type="radio" value="<?php echo $row['option4']; ?>">&nbsp;
                  <?php echo $row['option4']; ?>
                  <br><br><br></td></tr>
                <?php
              }
              ?>

              <?php
            }
          $correspondingAns = $hashMap[$j];
          $i = $i + 1;
        }
      }
     ?>
     <tr><td><button id="button" class="button3" name="submit">Submit</button></td></tr>
    </table>
  <form>
</body>
<script type = "text/javascript">
    setInterval(function()
    {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","timer.php",false);
    xmlhttp.send(null);
    if(xmlhttp.responseText=="00:00:00"){
        // window.location = "checkAnswers.php";
        var button = document.getElementById("button");
        button.click();
    } else {
        document.getElementById("response").innerHTML = xmlhttp.responseText;
    }
    }, 1000);
</script>
</html>