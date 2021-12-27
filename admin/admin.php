<?php
session_start();
include "../partials/config.php";
$s1 = "SELECT * FROM registered_students";
$s2 = "SELECT * FROM teachers";
$s3 = "SELECT sum(paid_fees) AS sum FROM registered_students";
$s4 = "SELECT sum(salary) AS sum FROM teachers";
$s5 = "SELECT sum(salary) AS sum FROM receptionist";
$r1 = mysqli_query($conn, $s1);
$s1 = $r1->num_rows;
$r2 = mysqli_query($conn, $s2);
$s2 = $r1->num_rows;
$r3 = mysqli_query($conn, $s3);
if (mysqli_num_rows($r3) == 1) {
    while($row = mysqli_fetch_assoc($r3)){
        $s3 = $row['sum'];
    }
}
$r4 = mysqli_query($conn, $s4);
if (mysqli_num_rows($r4) == 1) {
    while($row = mysqli_fetch_assoc($r4)){
        $s4 = $row['sum'];
    }
}
$r5 = mysqli_query($conn, $s5);
if (mysqli_num_rows($r5) == 1) {
    while($row = mysqli_fetch_assoc($r5)){
        $s5 = $row['sum'];
    }
}
$s4 = $s4 + $s5;

if(!isset($_SESSION['emailAddress']))
{
    echo '<script>alert("Please Log in to Proceed")</script>';
    echo "<script>
            window.location='../index.php';
        </script>";
} else {
    if($_SESSION['role']!='admin'){
        $a = 'location:../'.$_SESSION['role'].'/'.$_SESSION['role'].'.php';
        header($a);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/myadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
#myDiv {
  display: none;
}
#myDiv1 {
  display: none;
}
#addSubject {
  display: none;
}
#removeSubject {
  display: none;
}
</style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="admin.php"><span class="hidden-xs"><img class="logo" src="logo.png" alt="logo" style="height:40px;width:60px;"></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs hidden-lg
 waves-effect waves-light"><i class="ti-arrow-circle-left ti-menu"></i>
                        </a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!-- <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="ti-search"></i></a>
                        </form>
                    </li> -->
                    <li>
                        <a class="profile-pic" href="../logout.php"> <img src="images/users/hritik.jpg" alt="user-img" width="36"
                                class="img-circle"><b class="hidden-xs">Log out</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div class="navbar-default sidebar nicescroll" role="navigation" >
            <div class="sidebar-nav navbar-collapse ">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i> </button>
                            </span>
                        </div>
                    </li>
                    <li>
                        <a href="admin.php" class="waves-effect"><i class="glyphicon glyphicon-fire fa-fw"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="teacher.php" class="waves-effect"><i class="glyphicon glyphicon-user"></i> Teacher's</a>
                    </li>

                    <li>
                        <a href="student.php" class="waves-effect"><i class="glyphicon glyphicon-education"></i> Student's</a>
                    </li>

                    <li>
                        <a href="receptionist.php" class="waves-effect"><i class="glyphicon glyphicon-user"></i> Receptionist</a>
                    </li>

                    <li>
                        <a href="roleToTeacher.php" class="waves-effect"><i class="glyphicon glyphicon-user"></i> Assign Role to Teacher</a>
                    </li>

                    
                </ul>

            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- <div class="row bg-title">
                    <div class="col-lg-12">
                        <h4 class="page-title">Welcome to My Admin</h4>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    /.col-lg-12
                </div> -->
                <!-- /.row -->
                <div class="row bg-title">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="col-in text-center">
                                        <h5 class="text-danger">No of Students</h5>
                                        <h3 class="counter"><?php echo $s1;?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="col-in text-center b-r-none">
                                        <h5 class="text-muted text-warning">No of teachers</h5>
                                        <h3 class="counter"><?php echo $s2;?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="col-in text-center">
                                        <h5 class="text-muted text-purple">Revenue collected</h5>
                                        <h3 class="counter"><?php echo $s3;?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="col-in text-center b-0">
                                        <h5 class="text-info">Monthly Expenditure</h5>
                                        <h3 class="counter"><?php echo $s4;?></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="morris-area-chart" style="height: 345px;"></div> -->
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div class="white-box">
                            <table class="table">
                                <tr>
                                    <th><h3>CLASSES</h3></th>
                                    <th style="text-align:right;"><button onclick="myFunction()"  class="btn btn-primary" name="button">Add</button>&nbsp<button onclick="myFunction1()" class="btn btn-primary" name="button">Remove</button></th>
                                </tr>
                            </table>
                            <div id="myDiv">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="inputStandard">Enter Standard</label>
                                        <input type="text" name="standard" class="form-control" id="inputStandard" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClassName">Choose Medium</label>

                                        <select  class="form-control"  name="medium" required>
                                          <option value="english">English</option>
                                          <option value="hindi">Hindi</option>
                                          <option value="marathi">Marathi</option>
                                          <option value="semi">Semi-English</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="addClass" class="btn btn-primary">Add</button>
                                </form>

                                <?php
                                    if(isset($_POST['addClass'])) {
                                        $standard = $_POST['standard'];

                                        $medium = $_POST['medium'];
                                        $a = 'class'.$standard;

                                        $c = $a.$medium;
                                        $b=$c.'result';
                                        $query = "INSERT INTO class VALUES('$standard','$medium')";
                                        $q = "CREATE TABLE $c (
                                            `Enrollment_ID` bigint(20) NOT NULL PRIMARY KEY,
                                            `Roll_No` int(11) DEFAULT NULL,
                                            `Name` varchar(50) NOT NULL,
                                            `Mobile_No` bigint(20) DEFAULT NULL,
                                            `Address` varchar(100) DEFAULT NULL,
                                            `Gender` varchar(10) DEFAULT NULL,
                                            `Fathers_Name` varchar(50) DEFAULT NULL,
                                            `Mothers_Name` varchar(50) DEFAULT NULL,
                                            `Parents_contact_no` bigint(20) NOT NULL,
                                            `Email_Address` varchar(256) DEFAULT NULL,
                                            `Password` varchar(256) DEFAULT NULL,
                                            `dateofbirth` date DEFAULT NULL
                                          )";
                                        $q1 = "CREATE TABLE $b (
                                            `Enrollment_ID` bigint(20) NOT NULL,
                                            FOREIGN KEY (Enrollment_ID) REFERENCES $c(Enrollment_ID) ON DELETE CASCADE
                                          )";
                                          // printr($q1);
                                          // die();
                                        if(mysqli_query($conn,$query)) {
                                            if(mysqli_query($conn1,$q)) {
                                                if(!mysqli_query($conn1,$q1)) {
                                                    echo("Error description: " . mysqli_error($conn1));
                                                }
                                            }
                                            else {
                                                echo("Error description: " . mysqli_error($conn1));
                                            }
                                        }
                                        else {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>

                            <div id="myDiv1">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="inputStandard">Enter Standard to remove</label>
                                        <input type="text" name="standard" class="form-control" id="inputStandard">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputStandard">Choose Corresponding Medium</label>
                                        <select  class="form-control"  name="medium" required>
                                          <option value="english">English</option>
                                          <option value="hindi">Hindi</option>
                                          <option value="marathi">Marathi</option>
                                          <option value="semi">Semi-English</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="deleteClass" class="btn btn-primary">Remove</button>
                                </form>

                                <?php
                                    if(isset($_POST['deleteClass'])) {
                                        $standard = $_POST['standard'];

                                        $medium = $_POST['medium'];
                                        $query1 = "DELETE FROM class WHERE standard = '$standard' and medium='$medium'";
                                        if(mysqli_query($conn,$query1)) {
                                            echo "<script>
                                                window.location='admin.php';
                                            </script>";
                                        }
                                        else {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>

                                <?php
                                    $sql = "SELECT standard, medium FROM class";?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Standard</th>

                                                <th>Medium</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row["standard"]. "</td> <td>" . $row["medium"] . "</td></tr>";
                                                    }
                                                }
                                    ?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div class="white-box">
                          <h3>SUBJECTS</h3>
                            <form action="" method="post">
                                <div class="input-group">
                                        <input type="text" name="standard" placeholder="Enter standard to view the resp. subjects..." id="form1" class="form-control"  style="margin-bottom: 10px" required>
                                        <select  class="form-control"  name="medium" required>
                                          <option value="english">English</option>
                                          <option value="hindi">Hindi</option>
                                          <option value="marathi">Marathi</option>
                                          <option value="semi">Semi-English</option>
                                        </select>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" name="submit" style="margin:10px">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <?php
                                if(isset($_POST['submit'])){
                                    $class = $_POST['standard'];
                                    $medium = $_POST['medium'];
                            ?>
                                <table class="table">
                                    <tr>
                                        <th><h3>CLASS <?php echo "$class"; ?> SUBJECTS</h3></th>
                                        <th style="text-align:right;"><button onclick="addSubject()"  class="btn btn-primary" name="button">Add</button>&nbsp<button onclick="removeSubject()" class="btn btn-primary" name="button">Remove</button></th>
                                    </tr>
                                </table>

                                <div id="addSubject">
                                    <form method="post">

                                        <div class="form-group">
                                            <label for="addSubjectName">Enter Subject name</label>
                                            <input type="text" name="subName" class="form-control" id="addSubjectName" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="addSubjectName">Enter Standard</label>
                                            <input type="text" name="class1" class="form-control" id="addSubjectName" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="addSubjectName">Choose Medium</label>
                                            <select  class="form-control"  name="medium1" required>
                                              <option value="english">English</option>
                                              <option value="hindi">Hindi</option>
                                              <option value="marathi">Marathi</option>
                                              <option value="semi">Semi-English</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="addSubject" class="btn btn-primary">Add Subject</button>
                                    </form>
                                </div>

                                <div id="removeSubject">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="removeSubjectId">Enter Subject id</label>
                                            <input type="text" name="subId" class="form-control" id="removeSubjectId" required>
                                        </div>
                                        <button type="submit" name="removeSubject" class="btn btn-primary">Remove Subject</button>
                                    </form>
                                </div>
                                <?php
                                    $sql1 = "SELECT subject_name,subject_id FROM subjects WHERE standard = '$class' and medium = '$medium'";
                                    $result = $conn->query($sql1);
                                    if ($result->num_rows == 0) {
                                      echo "<strong>NO SUBJECTS FOUND...</strong>";
                                    }else{  ?>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Subject Id</th>
                                            <th>Subject Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr><td>" . $row["subject_id"]. "</td><td>" . $row["subject_name"] . "</td></tr>";
                                                }

                                        ?>
                                    </tbody>
                                </table> <?php } ?>
                            <?php
                                } else {
                                    if(isset($_POST['addSubject'])) {

                                        $subName = $_POST['subName'];
                                        $class1 = $_POST['class1'];
                                        $medium1 = $_POST['medium1'];
                                        $subId = $subName.$class1.$medium1;
                                        $query2 = "INSERT INTO subjects VALUES('$subId', '$subName', '$class1','$medium1')";
                                        if(!mysqli_query($conn,$query2)) {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                    if(isset($_POST['removeSubject'])) {
                                        $subId = $_POST['subId'];
                                        $query3 = "DELETE FROM subjects WHERE subject_id = '$subId'";
                                        if(!mysqli_query($conn,$query3)) {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <script>
                    function myFunction() {
                        var x = document.getElementById("myDiv");
                        var y = document.getElementById("myDiv1");
                        if(y.style.display = "block"){
                            y.style.display = "none";
                        }
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                    function myFunction1() {
                        var x = document.getElementById("myDiv1");
                        var y = document.getElementById("myDiv");
                        if(y.style.display = "block"){
                            y.style.display = "none";
                        }
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                    function addSubject() {
                        var x = document.getElementById("addSubject");
                        var y = document.getElementById("removeSubject");
                        if(y.style.display = "block"){
                            y.style.display = "none";
                        }
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                    function removeSubject() {
                        var x = document.getElementById("removeSubject");
                        var y = document.getElementById("addSubject");
                        if(y.style.display = "block"){
                            y.style.display = "none";
                        }
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                </script>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!--Nice scroll JavaScript -->
    <script src="js/jquery.nicescroll.js"></script>
    <!--Morris JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/myadmin.js"></script>
    <script src="js/dashboard1.js"></script>
</body>

</html>
