<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname2 = "quiz";
$conn2 = mysqli_connect($servername, $username, $password, $dbname2);

if($conn2) {
 }
 else {
     die("Error". mysqli_connect_error());
 }
?>

<?php
if(isset($_POST['submit'])){

  try {
    session_start();
    $_SESSION['testName'] = $_POST['testName'];
    $_SESSION['duration'] = $_POST['duration'];
    $_SESSION['neg_mark'] = $_POST['neg_mark'];
    $_SESSION['startDate'] = $_POST['startDate'];
    $_SESSION['startTime'] = $_POST['startTime'];
    $_SESSION['standard'] = $_POST['standard'];
    $_SESSION['subject'] = $_POST['subject'];
    $_SESSION['result_type'] = $_POST['result_type'];
    $_SESSION['medium'] = $_POST['medium'];
    $question = explode (",", $_POST['chapters']);
  }

  //catch exception
  catch(Exception $e) {

  }



}
?>






<head>

<style>
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 8px;
}

/* tr:nth-child(even) {
background-color: #dddddd;
} */
</style>


</head>
<body>
<div class="container">
<div class="main">
<h2>Select Questions To Add To Test.</h2>
<form action="checkbox_value.php" method="post">
<br>
<br>


<table>
  <tr>
    <th>Select</th>
    <th>Questions</th>
    <th>Marks</th>
  </tr>






<?php
$hashMap = array();
foreach($question as $i) {
  $a = $_SESSION['subject'];
$sql = "SELECT qid,chapter_no,question,correctoption FROM $a WHERE chapter_no='$i';";
$result = $conn2->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $hashMap[$row['qid']]=$row['correctoption'];
      ?>
      <tr>
        <td><input type="checkbox" name="check_list[]" value="<?php echo $row['qid']; ?>"></input></td>



<?php
        $allowTypes = array('.jpg','.png','.gif');
        $z = substr($row['question'], -4);
        if(in_array($z, $allowTypes)) {
          ?><td><?php echo "<img src='../".$row['question']."' width='300' height='150' >"; ?></td><?php
        } else {
          ?>
          <td><?php echo $row['question']; ?></td>
          <?php
        }?>



        <td> <input type="text" name="check1_list[]" placeholder="marks"> </input></td>

      </tr>

      <!-- <input type="checkbox" name="check_list[]" value=" <?php echo $row['qid']; ?> "><label> <?php echo $row['question']; ?> </label></input> <br><br> -->
      <?php
    }
    $_SESSION['hashmap']=$hashMap;
}}
 ?>
</table>
<br>
<input type="submit" name="submit" Value="Submit"/>
<br>
<br>
<?php include 'checkbox_value.php'; ?>
</form>
</div>
</div>
</body>
</html>
