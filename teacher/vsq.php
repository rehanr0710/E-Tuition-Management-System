<?php
  // Include the database config file
  include '../partials/config.php';
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
    if($_SESSION['role']!='teacher'){
      $a = 'location:../'.$_SESSION['role'].'/'.$_SESSION['role'].'.php';
      header($a);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
	<style>
		  .button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
}
	</style>
    <title>View Questions</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section>
        <h1>View Questions</h1>
       
    <table>
    <tr>
      <th>Questions</th>
      <th>Answer</th>
    </tr>
  <?php
  $a = $_SESSION['subject'];
  $b = $a.'subjective';
  $sql = "SELECT * FROM $b";
  $result = $conn2->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
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

       
        <?php
      }
  }
   ?>
  </table>
    <br>
    
    <br>
    <br>
    
        
    </section>
	<button class="button" onclick="location.href = 'teacher.php';" id="myButton" class="float-left submit-button" >Home</button>
</body>
  
</html>
<?php
	unset($_SESSION['subject']);
?>