<?php
session_start();
include "../partials/config.php";
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
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, my admin design, my admin dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="My Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Welcome Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/myadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
#addReceptionist {
  display: none;
}
#removeReceptionist {
  display: none;
}
#updateReceptionist{
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
                    <li><a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light"><i
                                class="ti-arrow-circle-left ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">

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
        <div class="navbar-default sidebar nicescroll" role="navigation">
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
                <!-- <div class="center p-20">
                    <span class="hide-menu"><a href="http://wrappixel.com/templates/myadmin/" target="_blank"
                            class="btn btn-info btn-block btn-rounded waves-effect waves-light">Upgrade to
                            Pro</a></span>
                </div> -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">

                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                    <div class="white-box table-responsive">
                            <table class="table">
                                <tr>
                                    <th><h3>Receptionist</h3></th>
                                    <th style="text-align:right;"><button onclick="addReceptionist()"  class="btn btn-primary" name="button">Add</button>&nbsp<button onclick="removeReceptionist()" class="btn btn-primary" name="button">Remove</button>&nbsp<button onclick="updateReceptionist()" class="btn btn-primary" name="button">Update</button></th>
                                </tr>
                            </table>
                            <div id="updateReceptionist">
                                <form action="" method="post">
                                  <div class="form-group">
                                      <label>Choose Receptionist id to Update</label>
                                      <select  class="form-control"  name="recep_id" required>
                                        <?php
                                            $sql5 = "SELECT recep_id FROM receptionist";
                                            $result = $conn->query($sql5);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                              echo "<option value='". $row['recep_id'] ."'>" .$row['recep_id'] ."</option>";
                                            }}
                                         ?>

                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" name="name" class="form-control">
                                  </div>
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobileNo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" name="salary" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="eMail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <button type="submit" name="updateReceptionist" class="btn btn-primary">Update</button>
                                </form>

                                <?php
                                    if(isset($_POST['updateReceptionist'])) {
                                      $recep_id = $_POST['recep_id'];
                                        $name = $_POST['name'];
                                        $mobileNo = $_POST['mobileNo'];
                                        $address = $_POST['address'];
                                        $salary = $_POST['salary'];
                                        $email = $_POST['eMail'];
                                        $password = $_POST['password'];
                                        $query = "UPDATE receptionist SET name = '$name', mobile_no= '$mobileNo', address= '$address', salary= '$salary', email= '$email', password = '$password' WHERE recep_id = '$recep_id';";
                                        if(mysqli_query($conn,$query)) {
                                            echo "<script>
                                                window.location='receptionist.php';
                                            </script>";
                                        }
                                        else {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>

                            <div id="addReceptionist">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobileNo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" name="salary" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="eMail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <button type="submit" name="addReceptionist" class="btn btn-primary">Add</button>
                                </form>

                                <?php
                                    if(isset($_POST['addReceptionist'])) {
                                        $name = $_POST['name'];
                                        $mobileNo = $_POST['mobileNo'];
                                        $address = $_POST['address'];
                                        $salary = $_POST['salary'];
                                        $email = $_POST['eMail'];
                                        $password = $_POST['password'];
                                        $query = "INSERT INTO receptionist VALUES(NULL,'$name','$mobileNo','$address','$salary','$email','$password',current_timestamp())";
                                        if(mysqli_query($conn,$query)) {
                                            echo "<script>
                                                window.location='receptionist.php';
                                            </script>";
                                        }
                                        else {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>

                            <div id="removeReceptionist">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Enter Receptionist Id to be removed</label>
                                        <input type="text" name="remove" class="form-control">
                                    </div>
                                    <button type="submit" name="removeReceptionist" class="btn btn-primary">Remove</button>
                                </form>

                                <?php
                                    if(isset($_POST['removeReceptionist'])) {
                                        $id = $_POST['remove'];
                                        $query1 = "DELETE FROM receptionist WHERE recep_id = '$id'";
                                        if(mysqli_query($conn,$query1)) {
                                            echo "<script>
                                                window.location='receptionist.php';
                                            </script>";
                                        }
                                        else {
                                            echo("Error description: " . mysqli_error($conn));
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                $sql = "SELECT * FROM receptionist";?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Receptionist Id</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>Salary</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr><td>" . $row["recep_id"]. "</td><td>" . $row["name"] . "</td><td>" . $row["mobile_no"] . "</td><td>" . $row["address"] . "</td><td>" . $row["salary"] . "</td><td>" . $row["email"] . "</td></tr>";
                                                }
                                            }
                                ?>
                                    </tbody>
                                </table>
                        </div>
                        <script>
                            function addReceptionist() {
                                var x = document.getElementById("addReceptionist");
                                var y = document.getElementById("removeReceptionist");
                                var z = document.getElementById("updateReceptionist");
                                if(y.style.display = "block"){
                                    y.style.display = "none";
                                }
                                if(z.style.display = "block"){
                                    z.style.display = "none";
                                }
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                            function removeReceptionist() {
                                var x = document.getElementById("removeReceptionist");
                                var y = document.getElementById("addReceptionist");
                                var z = document.getElementById("updateReceptionist");
                                if(y.style.display = "block"){
                                    y.style.display = "none";
                                }
                                if(z.style.display = "block"){
                                    z.style.display = "none";
                                }
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                            function updateReceptionist() {
                                var x = document.getElementById("updateReceptionist");
                                var y = document.getElementById("addReceptionist");
                                var z = document.getElementById("removeReceptionist");
                                if(y.style.display = "block"){
                                    y.style.display = "none";
                                }
                                if(z.style.display = "block"){
                                    z.style.display = "none";
                                }
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>
                    </div>
                </div>
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
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/myadmin.js"></script>
</body>

</html>
