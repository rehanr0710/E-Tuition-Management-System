<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$dbname1 = "students_info";
$dbname2 = "quiz";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn1 = mysqli_connect($servername, $username, $password, $dbname1);
$conn2 = mysqli_connect($servername, $username, $password, $dbname2);

// Check connection
// if($conn) {

// }
// else {
//     die("Error". mysqli_connect_error());
// }
?>
