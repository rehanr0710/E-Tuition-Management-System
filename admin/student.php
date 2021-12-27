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
                            <form action="" method="post">
                                <div class="input-group">
                                    <select name="class" class="form-control" required>
                                        <option value="" disabled selected>Choose Class</option>
                                        <?php
                                            $sql = "SELECT standard FROM class";
                                            $result=mysqli_query($conn,$sql);
                                            if(!$result)
                                            {
                                                echo "Error ".$sql."<br>".mysqli_error($conn);
                                            }

                                            while($rows = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option class="table" value="<?php echo $rows['standard'];?>" >

                                                    <?php echo $rows['standard'] ;?>

                                                </option>
                                        <?php
                                            }
                                        ?>
                                        </option>
                                    </select>

                                </div>
								<br>
                                <div class="input-group">
                                        <select  class="form-control"  name="medium" required>
                                          <option value="english">English</option>
                                          <option value="hindi">Hindi</option>
                                          <option value="marathi">Marathi</option>
                                          <option value="semi">Semi-English</option>
                                        </select>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" name="submit" style="margin-left: 10px">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['submit'])) {
                                    $class = $_POST['class'];
                                    $medium = $_POST['medium'];
                                    $a = 'class'.$class.$medium;
                                    $query = "SELECT * FROM $a";
                                    if(mysqli_query($conn1,$query)) {?>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Enrollment Id</th>
                                                    <th>Roll No</th>
                                                    <th>Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Gender</th>
                                                    <th>Father's Name</th>
                                                    <th>Mother's Name</th>
                                                    <th>Parent's Contact No</th>
                                                    <th>E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $result = $conn1->query($query);
                                                    if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr><td>" . $row["Enrollment_ID"]. "</td><td>" . $row["Roll_No"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Mobile_No"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Fathers_Name"] . "</td><td>" . $row["Mothers_Name"] . "</td><td>" . $row["Parents_contact_no"] . "</td><td>" . $row["Email_Address"] . "</td></tr>";
                                                        }
                                                    }
                                        ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
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
