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
    if($_SESSION['role']!='receptionist'){
      $a = 'location:../'.$_SESSION['role'].'/'.$_SESSION['role'].'.php';
      header($a);
    }
  }
?>
<svg style="display:none;">
  <symbol id="down" viewBox="0 0 16 16">
    <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
  </symbol>
  <symbol id="users" viewBox="0 0 16 16">
    <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
  </symbol>
  <symbol id="collection" viewBox="0 0 16 16">
    <rect width="7" height="7" />
    <rect y="9" width="7" height="7" />
    <rect x="9" width="7" height="7" />
    <rect x="9" y="9" width="7" height="7" />
  </symbol>


  <symbol id="pages" viewBox="0 0 16 16">
    <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)"/><polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14"/>
    </symbol>




  <symbol id="collapse" viewBox="0 0 16 16">
    <polygon points="11.62 3.81 7.43 8 11.62 12.19 10.09 13.71 4.38 8 10.09 2.29 11.62 3.81"/>
  </symbol>

</svg>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<header class="page-header" style="background-color:#024fba; opacity: 0.8;">
  <nav>
    <a href="#0">
      <img class="logo" src="logo.png" alt="logo" style="height:60px;width:90px;">
    </a>
    <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu" style="height: 35px">
      <svg width="20" height="20" aria-hidden="true">
        <use xlink:href="#down"></use>
      </svg>
    </button>
    <ul class="admin-menu">
      <li class="menu-heading">
        <h3 style="color:#fff;font-weight:bold; font-size:14px;">Receptionist Panel</h3>
      </li>

      <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#users"></use>
          </svg>
          <span value="a" onclick="showDiva()">Edit Student Data</span>
        </a>
      </li>
	  <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#pages"></use>
          </svg>
          <span value="b" onclick="showDivb()" >Register a Student</span>
        </a>
      </li>
      <li>
        <a href="#class" style="color: #dde9f8; text-decoration: none;">
          <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M12 38c0 2 2 4 4 4h16c2 0 4-2 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/></svg>
          <span value="c" onclick="showDivc()">Delete Student Data</span>
        </a>
      </li>
      <li>
        <a href="#class" style="color: #dde9f8; text-decoration: none;">
          <svg viewBox="0 0 24 24" version="1" xmlns="http://www.w3.org/2000/svg"><path d="M0 5v18l1 1h8l1-1V5L5 0 0 5zm8 17H2v-3h6v3zm0-4H2V6h6v12zM3 5l2-2 3 2H3zM21 0h-5l-1 1v2h-2l-1 1v8l1 1 1-1V5h1v18l1 1h5l1-1V1l-1-1zm-1 22h-3V10h3v12zm0-13h-3V8h3v1zm0-2h-3V2h3v5z"/></svg>
          <span value="d" onclick="showDivd()">Get Enroll_id List</span>
        </a>
      </li>
      <li>

      <li>
        <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
          <svg aria-hidden="true">
            <use xlink:href="#collapse"></use>
          </svg>
          <span>Collapse</span>
        </button>
      </li>
    </ul>
  </nav>
</header>
<section class="page-content" >
  <section class="search-and-user" style="margin-top: 15px; margin-left: 10px; box-shadow: 0px 3px #CACACA;  ">
    <p style="font-weight: bold;">Hello, <?php echo $_SESSION['name']?></p>
    <div class="admin-profile">
      <a href="../logout.php"><span class="greeting">Logout</span></a>
      <div class="notifications">

        <svg>
          <use xlink:href="#users"></use>
        </svg>
      </div>
    </div>
  </section>


<div id="d" style="display:none;">
  <h3>Get Enrollment_IDs</h3><br>
  <form action="" method="post">
    <div class="ml-2 mr-2 student box">
        <label class='form-label'>Class</label>
        <select name="class" class="form-control" required>
          <option value="" disabled selected>Choose</option>
          <?php
            include '../partials/config.php';
            $sql = "SELECT DISTINCT standard FROM class";
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
    <div class="ml-2 mr-2 student box">
            <label class='form-label'>Medium of Education</label>
            <select  class="form-control"  name="medium" required>
              <option value="" disabled selected>Choose Medium</option>
              <option value="english">English</option>
              <option value="hindi">Hindi</option>
              <option value="marathi">Marathi</option>
              <option value="semi">Semi-English</option>
            </select>


    </div>
    <br>
    <button style="margin-left:8px" type="submit" name="getEnrollId" class="btn btn-primary">Get Enrollment_IDs</button>
  </form>

<br>
<br>

<?php

if(isset($_POST['getEnrollId'])){
  $class = $_POST['class'];
  $medium = $_POST['medium'];
  $sql = "SELECT * FROM registered_students WHERE class = '$class' and medium = '$medium'";
  $results = mysqli_query($conn, $sql);
  if (mysqli_num_rows($results) >0){
    ?>
    <h4>Showing  Enrollment_IDs  list Of Class <?php echo $class; ?> (<?php echo $medium; ?>)</h4>
           <table>
             <tr>
               <th>Sr. No.</th>
               <th>Name</th>
               <th>Enrollment_ID</th>
             </tr>

    <?php
    $i=1;
  while($row = mysqli_fetch_assoc($results)){?>

<tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $row['name_of_stu']; ?></td>
  <td><?php echo $row['enrollement_no']; ?></td>
</tr>

    <?php
$i = $i+1;

  }
}else{
  echo "<h4>No Students Found!</h4>";
}
}


 ?>
 </table>



</div>



  <div id="a">
<h3>Edit Student Details</h3><br>
<form action="" method="post">
  <div class="ml-2 mr-2 student box">
      <label class='form-label'>Class</label>
      <select name="class" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
          include '../partials/config.php';
          $sql = "SELECT DISTINCT standard FROM class";
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
  <div class="ml-2 mr-2 student box">
          <label class='form-label'>Medium of Education</label>
          <select  class="form-control"  name="medium" required>
            <option value="" disabled selected>Choose Medium</option>
            <option value="english">English</option>
            <option value="hindi">Hindi</option>
            <option value="marathi">Marathi</option>
            <option value="semi">Semi-English</option>
          </select>


  </div>
  <br>
  <div class="ml-2 mr-2">
      <label class='form-label'>Enrollment_ID</label>
      <input class="form-control" type="text" name="enrollID" placeholder="enter Enrollment_ID" required>
  </div>
  <br>
  <button style="margin-left:8px" type="submit" name="editDetails" class="btn btn-primary">Get Details</button>
</form>


<form action="" method="post">

<?php
if(isset($_POST['editDetails'])){
  $class = $_POST['class'];
  $medium = $_POST['medium'];
  $enrollID = $_POST['enrollID'];
  $a = 'class'.$class.$medium;
  $sql = "SELECT * FROM $a WHERE Enrollment_ID='$enrollID'";
  $results = mysqli_query($conn1, $sql);
  if (mysqli_num_rows($results) == 1) {
    while($row = mysqli_fetch_assoc($results)){?>


<br>
<br>
      <div class="ml-2 mr-2">
          <label class='form-label'>Enrollment ID</label>
          <input class="form-control" type="text" name="Enroll_id" placeholder="<?php echo $row['Enrollment_ID']; ?>" required>
      </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Roll No</label>
            <input class="form-control" type="text" name="rollNo" placeholder="<?php echo $row['Roll_No']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Name</label>
            <input class="form-control" type="text" name="name" placeholder="<?php echo $row['Name']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Mobile No</label>
            <input class="form-control" type="text" name="mobileNo" placeholder="<?php echo $row['Mobile_No']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Address</label>
            <input class="form-control" type="text" name="address" placeholder="<?php echo $row['Address']; ?>" required>
        </div>
      <br>

        <div class="ml-2 mr-2">
            <label class='form-label'>Father's Name</label>
            <input class="form-control" type="text" name="fathersName" placeholder="<?php echo $row['Fathers_Name']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Mother's Name</label>
            <input class="form-control" type="text" name="mothersName" placeholder="<?php echo $row['Mothers_Name']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Parents/guardians contact No</label>
            <input class="form-control" type="text" name="parentsNo" placeholder="<?php echo $row['Parents_contact_no']; ?>" required>
        </div>
      <br>
      <div class="ml-2 mr-2 student box">
          <label class='form-label'>Class</label>
          <select name="class" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php

              $sql = "SELECT DISTINCT standard FROM class";
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
      <div class="ml-2 mr-2 student box">
              <label class='form-label'>Medium of Education</label>
              <select  class="form-control"  name="medium" required>
                <option value="" disabled selected>Choose Medium</option>
                <option value="english">English</option>
                <option value="hindi">Hindi</option>
                <option value="marathi">Marathi</option>
                <option value="semi">Semi-English</option>
              </select>


      </div><br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Email Address</label>
            <input class="form-control" type="email" name="emailAddress" placeholder="<?php echo $row['Email_Address']; ?>" required>
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Password</label>
            <input class="form-control" placeholder="<?php echo $row['Password']; ?>" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <!-- <p>add a password strength checker here</p> -->
        </div>
      <br>
        <div class="ml-2 mr-2">
            <label class='form-label'>Date of Birth</label>
            <input class="form-control" type="date" name="dateofbirth" placeholder="<?php echo $row['dateofbirth']; ?>" required>
        </div>

        <br>
        <button type="submit" name="saveDetails" class="btn btn-success">Save</button>







      <?php
    }}else {
      echo '<script>alert("Invalid Details")</script>';
      echo "<script>
            window.location='receptionist.php';
          </script>";
    }

}
 ?>
</form>
<?php
if(isset($_POST['saveDetails'])){
  $roll_no = $_POST['rollNo'];
  $name = $_POST['name'];
  $mobile_no = $_POST['mobileNo'];
  $address = $_POST['address'];
  $fathers_name = $_POST['fathersName'];
  $mothers_name = $_POST['mothersName'];
  $enroll_id = $_POST['Enroll_id'];
  $emailAddress = $_POST['emailAddress'];
  $password = $_POST['password'];
  $dateofbirth = $_POST['dateofbirth'];


$class = $_POST['class'];
$medium = $_POST['medium'];
$a='class'.$class.$medium;
  $sql ="UPDATE $a SET Roll_No='$roll_no',Name='$name',Mobile_No= '$mobile_no',Address='$address',Fathers_Name='$fathers_name',Mothers_Name='$mothers_name',Email_Address='$emailAddress',Password='$password',dateofbirth='$dateofbirth' WHERE Enrollment_ID = '$enroll_id'";
  if(mysqli_query($conn1, $sql)){
    echo '<script>alert("Updated Successfully!")</script>';
    echo "<script>
          window.location='receptionist.php';
        </script>";
  }else {
    echo '<script>alert("Invalid Details!")</script>';
    echo "<script>
          window.location='receptionist.php';
        </script>";
  }

}
   ?>

    </div>
  </div>
</div>

<div id="c" style="display:none;">

  <h3>Delete Student Details</h3><br>
  <form action="" method="post">
    <div class="ml-2 mr-2 student box">
        <label class='form-label'>Class</label>
        <select name="class" class="form-control" required>
          <option value="" disabled selected>Choose</option>
          <?php
            include '../partials/config.php';
            $sql = "SELECT DISTINCT standard FROM class";
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
    <div class="ml-2 mr-2 student box">
            <label class='form-label'>Medium of Education</label>
            <select  class="form-control"  name="medium" required>
              <option value="" disabled selected>Choose Medium</option>
              <option value="english">English</option>
              <option value="hindi">Hindi</option>
              <option value="marathi">Marathi</option>
              <option value="semi">Semi-English</option>
            </select>


    </div>
    <br>
    <div class="ml-2 mr-2">
        <label class='form-label'>Enrollment_ID</label>
        <input class="form-control" type="text" name="enrollID" placeholder="enter Enrollment_ID" required>
    </div>
    <br>
    <button style="margin-left:8px" type="submit" name="deleteStudent" class="btn btn-primary">Delete Student Details</button>
    <br>
    <br>
    <h5>Note : Once deleted student details, it will disappear from everywhere and student wont be able to log in or use any services. All his data will be deleted.</h5>
  </form>
<?php
if(isset($_POST['deleteStudent'])){
  $class = $_POST['class'];
  $medium = $_POST['medium'];
  $enrollID = $_POST['enrollID'];
  $a = 'class'.$class.$medium;
  $b = 'class'.$class.$medium.'result';
  $sql = "DELETE FROM $a WHERE Enrollment_ID = '$enrollID'";
  $sql1 = "DELETE FROM $b WHERE Enrollment_ID = '$enrollID'";
  $sql2 = "DELETE FROM registered_students WHERE enrollement_no = '$enrollID'";
  if(mysqli_query($conn1,$sql1)){
    if(mysqli_query($conn1,$sql)){
      if(mysqli_query($conn,$sql2)){
      echo '<script>alert("Deleted Successfully!")</script>';
      echo "<script>
            window.location='receptionist.php';
          </script>";
    }else{
      echo '<script>alert("Invalid Details!")</script>';
      echo "<script>
            window.location='receptionist.php';
          </script>";
    }}else{
      echo '<script>alert("Invalid Details!")</script>';
      echo "<script>
            window.location='receptionist.php';
          </script>";
    }
  }else{
    echo '<script>alert("Invalid Details!")</script>';
    echo "<script>
          window.location='receptionist.php';
        </script>";
  }
}

 ?>
  </div>
</div>
</div>
</div>


<div id="b" style="display:none;">



            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registeration</h5>

                </div>
                <div class="modal-body">

                    <form action="studentRegisterRecep.php" method="post">
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Parent's Contact No.</label>
                            <input class="form-control" type="text" name="mobileNo" required>
                        </div>
                        <br>
                        <div class="ml-2 mr-2 student box">
                            <label class='form-label'>Class</label>
                            <select name="class" class="form-control" required>
                              <option value="" disabled selected>Choose</option>
                              <?php
                                include '../partials/config.php';
                                $sql = "SELECT DISTINCT standard FROM class";
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
                        <script>
                            function myFunction()
                            {
                            value1 = parseInt(document.getElementById("value1").value);
                            value2 = parseInt(document.getElementById("value2").value);
                                if(!value1==""&&!value2=="")
                                {
                                sum = value1 - value2;
                                document.getElementById("total").value = sum;
                                }
                            }
                        </script>
                        <div class="ml-2 mr-2 student box">
                                <label class='form-label'>Medium of Education</label>
                                <select  class="form-control"  name="medium" required>
                                  <option value="" disabled selected>Choose Medium</option>
                                  <option value="english">English</option>
                                  <option value="hindi">Hindi</option>
                                  <option value="marathi">Marathi</option>
                                  <option value="semi">Semi-English</option>
                                </select>


                        </div>
<br>
                        <div class="ml-2 mr-2 student box">
                            <label class='form-label'>Total Fees to be paid</label>
                            <input class="form-control" type="text" name="totalfees" id="value1" onkeyup="myFunction()">
                        </div>
                        <br>
                        <div class="ml-2 mr-2 student box">
                            <label class='form-label'>Fees paid</label>
                            <input class="form-control" type="text" name="paidfees" id="value2" onkeyup="myFunction()">
                        </div>
                        <br>
                        <div class="ml-2 mr-2 student box">
                            <label class='form-label'>Remaining Fees</label>
                            <input class="form-control" type="text" name="remfees" id="total" readonly="readonly">
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>

            </div>



</div>
</section>
<script>
  const body = document.body;
const menuLinks = document.querySelectorAll(".admin-menu a");
const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
const toggleMobileMenu = document.querySelector(".toggle-mob-menu");
const collapsedClass = "collapsed";

collapseBtn.addEventListener("click", function() {
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  this.getAttribute("aria-label") == "collapse menu"
    ? this.setAttribute("aria-label", "expand menu")
    : this.setAttribute("aria-label", "collapse menu");
  body.classList.toggle(collapsedClass);
});

toggleMobileMenu.addEventListener("click", function() {
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  this.getAttribute("aria-label") == "open menu"
    ? this.setAttribute("aria-label", "close menu")
    : this.setAttribute("aria-label", "open menu");
  body.classList.toggle("mob-menu-opened");
});

for (const link of menuLinks) {
  link.addEventListener("mouseenter", function() {
    body.classList.contains(collapsedClass) &&
    window.matchMedia("(min-width: 768px)").matches
      ? this.setAttribute("title", this.textContent)
      : this.removeAttribute("title");
  });
}
function showDivd() {
  document.getElementById('d').style.display = "block";
  document.getElementById('a').style.display = "none";
  document.getElementById('b').style.display = "none";
  document.getElementById('c').style.display = "none";
}


function showDivc() {
  document.getElementById('c').style.display = "block";
  document.getElementById('a').style.display = "none";
  document.getElementById('b').style.display = "none";
  document.getElementById('d').style.display = "none";

}

function showDivb() {
  document.getElementById('b').style.display = "block";
  document.getElementById('a').style.display = "none";
  document.getElementById('c').style.display = "none";
  document.getElementById('d').style.display = "none";
}
function showDiva() {
  document.getElementById('a').style.display = "block";
  document.getElementById('b').style.display = "none";
  document.getElementById('c').style.display = "none";
  document.getElementById('d').style.display = "none";
}

</script>

<!-- In Add Image Question Choose either of two inputs -->

<script>
  jQuery(function ($) {
    var $inputs = $('input[name=question],input[name=questionimg]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
  jQuery(function ($) {
    var $inputs = $('input[name=option1],input[name=option1img]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
  jQuery(function ($) {
    var $inputs = $('input[name=option2],input[name=option2img]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
  jQuery(function ($) {
    var $inputs = $('input[name=option3],input[name=option3img]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
  jQuery(function ($) {
    var $inputs = $('input[name=option4],input[name=option4img]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
  jQuery(function ($) {
    var $inputs = $('input[name=correctoption],input[name=correctoptionimg]');
    $inputs.on('input', function () {
      // Set the required property of the other input to false if this input is not empty.
      $inputs.not(this).prop('required', !$(this).val().length);
    });
  });
</script>
