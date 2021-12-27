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
        <th>Option1</th>
        <th>Option2</th>
        <th>Option3</th>
        <th>Option4</th>
        <th>Correct Option</th>
      </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
			$a = $_SESSION['subject'];
			$sql = "SELECT * FROM $a;";
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