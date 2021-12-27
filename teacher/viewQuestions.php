<!DOCTYPE html>
<html>
<?php
include_once '../partials/config.php';
if(isset($_POST['getQuestion'])){
  if($_POST['type']=='objective'){


    try {
      session_start();
      $_SESSION['subjectfordelete'] = $_POST['subject'];
    }

    //catch exception
    catch(Exception $e) {

    }

?>
    <form action="deleteQuestion.php" method="post">
      <head>

      <style>
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin: 20px;
      }

      td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      }
      input{
        width: 20px;
        height: 14px;
      }
      #butto{
        width: 90px;
        height: 40px;
        background-color: #4CAF50; /* Green */
  border: none;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
      }

      /* tr:nth-child(even) {
      background-color: #dddddd;
      } */
      </style>


      </head>
      <br><br><br>

<h2 style="margin-left:20px">SELECT QUESTIONS TO DELETE FROM DATABASE.</h2>
<br>
    <table>
      <tr>
        <th>Select</th>
        <th>Questions</th>
        <th>Option1</th>
        <th>Option2</th>
        <th>Option3</th>
        <th>Option4</th>
        <th>Correct Option</th>
      </tr>






    <?php

    $a = $_POST['subject'];
    $sql = "SELECT * FROM $a;";
    $result = $conn2->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><input type="checkbox" name="check_list[]" value=" <?php echo $row['qid']; ?> "></input></td>



    <?php
            $allowTypes = array('.jpg','.png','.gif');
            $z = substr($row['question'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['question']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['question']; ?></td>
              <?php
            }
            $z = substr($row['option1'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['option1']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['option1']; ?></td>
              <?php
            }
            $z = substr($row['option2'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['option2']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['option2']; ?></td>
              <?php
            }
            $z = substr($row['option3'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['option3']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['option3']; ?></td>
              <?php
            }
            $z = substr($row['option4'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['option4']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['option4']; ?></td>
              <?php
            }
            $z = substr($row['correctoption'], -4);
            if(in_array($z, $allowTypes)) {
              ?><td><?php echo "<img src='../".$row['correctoption']."' width='300' height='150' >"; ?></td><?php
            } else {
              ?>
              <td><?php echo $row['correctoption']; ?></td>
              <?php
            }
            ?>




          </tr>

          <!-- <input type="checkbox" name="check_list[]" value=" <?php echo $row['qid']; ?> "><label> <?php echo $row['question']; ?> </label></input> <br><br> -->
          <?php
        }
    }
     ?>
    </table>
    <br>
    <input id="butto" style="margin:20px" type="submit" name="submit" Value="Delete"/>
    <br>
    <br>
    </form>
<?php  }

else{



?>
  <form action="deleteQuestion.php" method="post">
    <head>

    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin: 20px;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    input{
      width: 20px;
      height: 14px;
    }
    #butto{
      width: 90px;
      height: 40px;
      background-color: #4CAF50; /* Green */
border: none;
color: white;

text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
    }

    /* tr:nth-child(even) {
    background-color: #dddddd;
    } */
    </style>


    </head>
    <br><br><br>

<h2 style="margin-left:20px">SELECT QUESTIONS TO DELETE FROM DATABASE.</h2>
<br>
  <table>
    <tr>
      <th>Select</th>
      <th>Questions</th>

      <th>Answer</th>
    </tr>






  <?php
session_start();
  $a = $_POST['subject'];
  $b = $a.'subjective';
  $_SESSION['subjectfordelete'] = $b;
  $sql = "SELECT * FROM $b;";
  $result = $conn2->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><input type="checkbox" name="check_list[]" value=" <?php echo $row['qid']; ?> "></input></td>



  <?php
          $allowTypes = array('.jpg','.png','.gif');
          $z = substr($row['question'], -4);
          if(in_array($z, $allowTypes)) {
            ?><td><?php echo "<img src='../".$row['question']."' width='300' height='150' >"; ?></td><?php
          } else {
            ?>
            <td><?php echo $row['question']; ?></td>
            <?php
          }

          $z = substr($row['answer'], -4);
          if(in_array($z, $allowTypes)) {
            ?><td><?php echo "<img src='../".$row['answer']."' width='300' height='150' >"; ?></td><?php
          } else {
            ?>
            <td><?php echo $row['answer']; ?></td>
            <?php
          }
          ?>











        </tr>

        <!-- <input type="checkbox" name="check_list[]" value=" <?php echo $row['qid']; ?> "><label> <?php echo $row['question']; ?> </label></input> <br><br> -->
        <?php
      }
  }
   ?>
  </table>
  <br>
  <input id="butto" style="margin:20px" type="submit" name="submit" Value="Delete"/>
  <br>
  <br>
</form><?php
}
}
?>
</html>
