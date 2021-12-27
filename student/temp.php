
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

<?php
  include '../partials/head.php';
?>
<h1>Hello</h1>