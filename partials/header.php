<?php
include 'register.php';
?>

<div id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">Eshwar Tech</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <!--<li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>-->
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <!--<li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>-->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
		  <li><a  class="nav-link scrollto" type="submit" data-bs-toggle="modal" data-bs-target="#RegisterModal" >Register</a></li>
		  <li><a  class="nav-link scrollto" type="submit" data-bs-toggle="modal" data-bs-target="#LoginModal" >Login</a></li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>

</div>
  </div>


<!-- Registration modal -->
    <div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#ADC8F3;">
                <div class="modal-header">
                    <h5 class="modal-title">Registration</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" style="background-color:#BF0F0F; border-radius:100px;padding-top:1px;padding-bottom:1px;">Close</button>
                </div>
                <div class="modal-body" style="background-color:#ADC8F3;">
                    <form action="" method="post">
                      <div class="ml-2 mr-2">
                          <label class='form-label'>Enrollment ID</label>
                          <input class="form-control" type="text" name="Enroll_id" required>
                      </div>
					  <br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Roll No</label>
                            <input class="form-control" type="text" name="rollNo" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Mobile No</label>
                            <input class="form-control" type="text" name="mobileNo" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Address</label>
                            <input class="form-control" type="text" name="address" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Gender</label>
                            <select name="gender" class="form-control" required>
                              <option value="" disabled selected>Choose</option>
                              <option class="table" value="male">Male</option>
                              <option class="table" value="female">Female</option>
                            </select>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Father's Name</label>
                            <input class="form-control" type="text" name="fathersName" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Mother's Name</label>
                            <input class="form-control" type="text" name="mothersName" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Parents/guardians contact No</label>
                            <input class="form-control" type="text" name="parentsNo" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Class</label>
                            <select name="class" class="form-control" required>
                              <option value="" disabled selected>Choose</option>
                              <?php
                                include 'config.php';
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
            <div class="ml-2 mr-2">
                <label class='form-label'>Medium of Education</label>
                <select name="medium" class="form-control" required>
                  <option value="" disabled selected>Choose</option>
                  <option value="english">English</option>
                  <option value="hindi">Hindi</option>
                  <option value="marathi">Marathi</option>
                  <option value="semi">Semi-English</option>
                </select>
            </div><br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Email Address</label>
                            <input class="form-control" type="email" name="emailAddress" required>
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Password</label>
                            <input class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            <!-- <p>add a password strength checker here</p> -->
                        </div>
						<br>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Date of Birth</label>
                            <input class="form-control" type="date" name="dateofbirth" required>
                        </div>

                        <br>
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!-- Login Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#ADC8F3;">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-danger" data-bs-dismiss="modal" aria-label="Close" style="background-color:#BF0F0F; border-radius:100px;padding-top:1px;padding-bottom:1px;">Close</button>
                </div>
                <form action="LoginAction.php" method="POST">
                    <div class="modal-body">
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Email Address</label>
                            <input class="form-control" name="emailAddress" type="email" required>
                        </div>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Password</label>
                            <input class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <div class="ml-2 mr-2">
                            <label class='form-label'>Medium of Education</label>
                            <select name="medium" class="form-control" required>
                              <option value="" disabled selected>Choose</option>
                              <option value="english">English</option>
                              <option value="hindi">Hindi</option>
                              <option value="marathi">Marathi</option>
                              <option value="semi">Semi-English</option>
                              <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
