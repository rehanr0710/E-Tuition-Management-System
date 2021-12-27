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
  if(isset($_SESSION['subject'])){
    unset($_SESSION['subject']);
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

	<symbol id="pen" viewBox="0 0 16 16">
          <path d="M6 35v7h8l22-22-8-8L6 35zm35-21v-3l-4-4h-3l-4 3 8 8 3-4z"/>
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
        <h3 style="color:#fff;font-weight:bold; font-size:14px;">Teacher Dashboard</h3>
      </li>
	  <li>
        <a href="#class" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#collection"></use>
          </svg>
          <span value="a" onclick="showDiva()">Classes</span>
        </a>
      </li>
	  <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#users"></use>
          </svg>
          <span value="d" onclick="showDivd()">Student</span>
        </a>
      </li>
	  <li>
        <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
			<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M6 35v7h8l22-22-8-8L6 35zm35-21v-3l-4-4h-3l-4 3 8 8 3-4z"/></svg>
          <!--<span style='font-size:20px;padding-left: -5px;'>&#10002; </span>-->
          <span value="c" onclick="showDivc()">Add Questions</span>
        </a>
      </li>
      <li>
      <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#pages"></use>
          </svg>
          <span value="b" onclick="showDivb()">Generate Papers</span>
        </a>
      </li>
      <li>
      <a href="#100" style="color: #dde9f8; text-decoration: none;">
	  <svg viewBox="0 0 29.75 22.87" width="29.75" height="22.87" xmlns="http://www.w3.org/2000/svg"><path d="M29.05 1.57L28.19.7a2.43 2.43 0 0 0-3.43 0L10.17 15.29 5 10.12a2.43 2.43 0 0 0-3.43 0l-.86.86a2.44 2.44 0 0 0 0 3.43l7.74 7.75c.95.95 2.49.95 3.43 0L29.05 5c.94-.95.94-2.49 0-3.43z"/></svg>
        <!--<span style='font-size:20px;padding-left: -5px;'>&#10002; </span>-->
        <span value="e" onclick="showDive()">View Questions</span>
      </a>
    </li>




        <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu" style="padding:8%;">
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
    <span style="font-weight: bold;">Hello, <?php echo $_SESSION['name']?>
    </span>
    
    <div class="admin-profile">
      <a href="../logout.php"><span class="greeting">Logout</span></a>
      <div class="notifications">

        <svg>
          <use xlink:href="#users"></use>
        </svg>
      </div>
    </div>
  </section>







<div id="e" style="display:none">
  <div>
  <div class="container">
    <h3 align="center">View And Delete Questions</h3>
    <br >
    <div class="panel panel-default">
      <div class="panel-heading"></div>
      <form action="viewQuestions.php" method="post">
        <div class="panel-body">


          <div class="form-group">
            <label for="standard">Subject</label>
              <select class="form-control" name="subject" required>
                <option value="" disabled selected>Choose Subject</option>
                <?php
                $a = $_SESSION['teacher_id'];
                    $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                    }
                }else{
                echo "<option value=''>Standard not available</option>";
                    }
                ?>
              </select>
          </div>
          <div class="form-group">
            <label for="standard">Type</label>
              <select class="form-control" name="type" required>
                <option value="" disabled selected>Choose Type</option>
                <option value="objective">Objective</option>
                <option value="subjective">Subjective</option>
              </select>
          </div>

        </div>
        <button type="submit" name="getQuestion" class="btn btn-primary">Get Questions</button>
      </form>
    </div>
  </div>
</div>
</div>












  <div id="a">


  <div class="row">

      <div class="col-md-6">
        <div  style=" margin-top:15px;width: 50%; " class="answer_list" >
            <div class="card" style="width:190%;padding-bottom:10%;">
              <div class="card-body" >
                <h5 class="card-title">5th subject name</h5>
                <p class="card-text"> <br><br></p>
                <a href="#" class="btn btn-primary btn-sm" >Button</a>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div  style=" margin-top:15px;width: 50%;" class="answer_list" >
            <div class="card" style="width:190%;padding-bottom:10%;">
              <div class="card-body" >
                <h5 class="card-title">5th subject name</h5>
                <p class="card-text"> <br><br></p>
                <a href="#" class="btn btn-primary btn-sm" >Button</a>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div  style=" margin-top:15px;width: 50%;" class="answer_list" >
            <div class="card" style="width:190%;padding-bottom:10%;">
              <div class="card-body" >
                <h5 class="card-title">5th subject name</h5>
                <p class="card-text"> <br><br></p>
                <a href="#" class="btn btn-primary btn-sm" >Button</a>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div  style=" margin-top:15px;width: 50%;" class="answer_list" >
            <div class="card" style="width:190%;padding-bottom:10%;">
              <div class="card-body" >
                <h5 class="card-title">5th subject name</h5>
                <p class="card-text"> <br><br></p>
                <a href="#" class="btn btn-primary btn-sm" >Button</a>
              </div>
            </div>
        </div>
      </div>


    </div>


</div>
<div id="d" style="display:none;">
student
</div>

<div id="c" style="display:none;">

  <div id="aq">
    <div class="row">
    <div class="col-md-6" style="position: relative;">
		<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          
          <h5 class="card-title">ADD MCQ's QUESTION BY UPLOADING CSV FILE.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="csv" onclick="showDivcsv()">Add CSV File</a>

		</div>
      </div>
      </div>
    </div>

    </div>
    <div class="col-md-6" style="position: relative;">
	<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          <h5 class="card-title">ADD SELECTED QUESTION WITH TEXT OR IMAGE.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="img" onclick="showDivimg()">Add Img Question</a>
        </div>
      </div>
      </div>
    </div>

    </div>
    <div class="col-md-6" style="position: relative;">
	<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          <h5 class="card-title">ADD CSV FILE OF SUBJECTIVE QUESTION AND ANSWERS.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="sub" onclick="showDivsub()">Add Subjective Question</a>
        </div>
      </div>
      </div>
    </div>

    </div>
    </div>
  </div>

  <div id="csv" style="display:none;">
    <div>
    <div class="container">
      <h3 align="center">Add CSV file</h3>
      <br >
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <form action="addQuestionBank.php" method="post" enctype='multipart/form-data'>
          <div class="panel-body">
            <div class="form-group">
              <label for="standard">Class</label>
              <select class="form-control"  name="standard" required>
                <option value="" disabled selected>Choose Class</option>
                    <?php
                    $a = $_SESSION['teacher_id'];
                        $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                        }
                    }else{
                    echo "<option value=''>Standard not available</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
              <label for="standard">Subject</label>
                <select class="form-control" name="subject" required>
                  <option value="" disabled selected>Choose Subject</option>
                  <?php
                  $a = $_SESSION['teacher_id'];
                      $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                      $result = $conn->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                      }
                  }else{
                  echo "<option value=''>Standard not available</option>";
                      }
                  ?>
                </select>
            </div>
            <br>
            <h5>NOTE : Upload Only CSV File in given format.
            (chapter_no, question, option1, option2, option3, option4, correctoption)</h5>
            <br>
            <div class="form-group">
              <label>Upload File:</label>
              <input type='file' accept=".csv" name='csv_info' />
            </div>
          </div>
          <button type="submit" name="submit" value='Upload File' class="btn btn-primary">Add Question Bank</button>
        </form>
      </div>
    </div>
  </div>

  </div>






  <div id="img" style="display:none;">
	  <div>
    <div class="container">
      <h3 align="center">Add Image Questions</h3>
      <br >
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <form action="addImageQuestions.php" method="post" enctype="multipart/form-data">
          <div class="panel-body">
            <div class="form-group">
              <label for="standard">Class</label>
              <select class="form-control"  name="standard" required>
                <option value="" disabled selected>Choose Class</option>
                    <?php
                    $a = $_SESSION['teacher_id'];
                        $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                        }
                    }else{
                    echo "<option value=''>Standard not available</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
              <label for="standard">Subject</label>
                <select class="form-control" name="subject" required>
                  <option value="" disabled selected>Choose Subject</option>
                  <?php
                  $a = $_SESSION['teacher_id'];
                      $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                      $result = $conn->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                      }
                  }else{
                  echo "<option value=''>Standard not available</option>";
                      }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label>Chapters</label>
                <input name="chapters" type="text" class="form-control input-sm" required></input>
            </div>


            <div class="form-row">
              <div class="form-group col-md-5">
                <label>Question</label>
                <input name="question" type="text" class="form-control input-sm" required></input>
              </div>
              &nbsp&nbsp&nbsp
              <div class="form-group">
                <br>
                <br>
                  <label>OR</label>
              </div>
              &nbsp&nbsp&nbsp
                <div class="form-group col-md-5">
                  <label>Upload Image</label>
                  <input name='questionimg' type='file' class="form-control input-sm" required/></input>
                </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-5">
                <label>Option1</label>
                <input name="option1" type="text" class="form-control input-sm" required></input>
              </div>
              &nbsp&nbsp&nbsp
              <div class="form-group">
                <br>
                <br>
                  <label>OR</label>
              </div>
              &nbsp&nbsp&nbsp
                <div class="form-group col-md-5">
                  <label>Upload Image</label>
                  <input type='file' class="form-control input-sm" name='option1img' required/></input>
                </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-5">
                <label>Option2</label>
                <input name="option2" type="text" class="form-control input-sm" required></input>
              </div>
              &nbsp&nbsp&nbsp
              <div class="form-group">
                <br>
                <br>
                  <label>OR</label>
              </div>
              &nbsp&nbsp&nbsp
                <div class="form-group col-md-5">
                  <label>Upload Image</label>
                  <input type='file' class="form-control input-sm" name='option2img' required/></input>
                </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-5">
                <label>Option3</label>
                <input name="option3" type="text" class="form-control input-sm" required></input>
              </div>
              &nbsp&nbsp&nbsp
              <div class="form-group">
                <br>
                <br>
                  <label>OR</label>
              </div>
              &nbsp&nbsp&nbsp
                <div class="form-group col-md-5">
                  <label>Upload Image</label>
                  <input type='file' class="form-control input-sm" name='option3img' required/></input>
                </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-5">
                <label>Option4</label>
                <input name="option4" type="text" class="form-control input-sm" required></input>
              </div>
              &nbsp&nbsp&nbsp
              <div class="form-group">
                <br>
                <br>
                  <label>OR</label>
              </div>
              &nbsp&nbsp&nbsp
                <div class="form-group col-md-5">
                  <label>Upload Image</label>
                  <input type='file' class="form-control input-sm" name='option4img' required/></input>
                </div>
            </div>




            <div class="form-row">
              <div class="form-group col-md-5">
                <label>CorrectOption</label>
                  <select name="correctoption" class="form-control" required>
                    <option value="" disabled selected>Choose</option>
                    <option value="1" >Option1</option>
                    <option value="2" >Option2</option>
                    <option value="3" >Option3</option>
                    <option value="4" >Option4</option>
                  </select>
              </div>
            </div>
            <br>







          </div>
          <button type="submit" name="submit" value='Upload File' class="btn btn-primary">Add Question To Question Bank</button>
        </form>
      </div>
    </div>
  </div>

  </div>






  <div id="sub" style="display:none;">

	  <div>
    <div class="container">
      <h3 align="center">Add Subjective Questions</h3>
      <br >
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <form action="addSubQuesBank.php" method="post" enctype='multipart/form-data'>
          <div class="panel-body">
            <div class="form-group">
              <label for="standard">Class</label>
              <select class="form-control"  name="standard" required>
                <option value="" disabled selected>Choose Class</option>
                    <?php
                        $a = $_SESSION['teacher_id'];
                        $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                        }
                    }else{
                    echo "<option value=''>Standard not available</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
              <label for="standard">Subject</label>
                <select class="form-control" name="subject" required>
                  <option value="" disabled selected>Choose Subject</option>
                  <?php
                  $a = $_SESSION['teacher_id'];
                      $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                      $result = $conn->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                      }
                  }else{
                  echo "<option value=''>Standard not available</option>";
                      }
                  ?>
                </select>
            </div>
            <br>
            <h5>NOTE : Upload Only CSV File in given format.
            (chapter_no, question, answer)</h5>
            <br>
            <div class="form-group">
              <label>Upload File:</label>
              <input type='file' accept=".csv" name='csv_info' />
            </div>
          </div>
          <button type="submit" name="submit" value='Upload File' class="btn btn-primary">Add Question Bank</button>
        </form>
      </div>
    </div>
  </div>

  </div>

  </div>
</div>
</div>
</div>


<div id="b" style="display:none;">
  <div id="ps">
  <div class="row" >
    <div class="col-md-6" style="position: relative;">
	<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          <h5 class="card-title">Generate fully custom MCQ test by selecting chapters and corresponding questions.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="gcop" onclick="showDivgcop()">Generate Customized Objective Paper</a>
        </div>
      </div>
      </div>
    </div>

    </div>
    <div class="col-md-6" style="position: relative;">
	<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          <h5 class="card-title">Generate random MCQ test where questions will be selected randomly from selected chapters.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="grop" onclick="showDivgrop()">Generate Random Objective Paper</a>
        </div>
      </div>
      </div>
    </div>

    </div>
    <div class="col-md-6" style="position: relative;">
	<div class="col-md-6">
  <div  style=" margin-top:15px;width: 45%; " class="answer_list" >
      <div class="card" style="width:490%;padding-bottom:40%;">
        <div class="card-body" >
          <h5 class="card-title">Generate random SUBJECTIVE test where questions will be selected randomly from selected chapters.</h5>
          <p class="card-text"> <br></p>
          <br>
          <br>
          <a href="#" class="btn btn-sm btn-colour-1" value="gcsp" onclick="showDivgcsp()">Generate Random subjective Paper</a>
        </div>
      </div>
      </div>
    </div>

    </div>
  </div>
</div>


<!-- Generate customized objective paper -->
<div id="gcop" style="display:none;">

  <div>
    <div class="container">
      <h3 align="center">Customized Objective Paper Test Generation</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading"></div>




        <form action="php_checkbox.php" method="post">
            <div class="panel-body">
                <div class="form-group">
                    <label>Test Name</label>
                    <input name="testName" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Negative Mark per Wrong Answer</label>
                    <input name="neg_mark" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Chapters</label>
                    <input name="chapters" type="text" class="form-control input-sm" placeholder="Enter comma separated chapter nos." required></input>
                </div>
                <div class="form-group">
                    <label>Duration in mins</label>
                    <input name="duration" type="text" class="form-control input-sm" required></input>
                </div><div class="form-group">
                    <label>Start Date</label>
                    <input name="startDate" type="date" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Start time</label>
                    <input name="startTime" type="time" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                  <label for="standard">Class</label>
                  <select class="form-control"  name="standard" required>
                    <option value="" disabled selected>Choose Class</option>
                        <?php
                        $a = $_SESSION['teacher_id'];
                            $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                            }
                        }else{
                        echo "<option value=''>Standard not available</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                  <label for="standard">Subject</label>
                    <select class="form-control" name="subject" required>
                      <option value="" disabled selected>Choose Subject</option>
                      <?php
                      $a = $_SESSION['teacher_id'];
                          $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                          }
                      }else{
                      echo "<option value=''>Standard not available</option>";
                          }
                      ?>
                    </select>
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




                <div class="form-group">
                    <label>Do you want to display result immediately?</label>
                    <select name="result_type" class="form-control input-sm" title="Choose" required>
                      <option value="true">Yes</option>
                      <option value="false">No</option>
                    </select>
                </div>
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Select Questions</button>
        </form>



      </div>
    </div>
  </div>

</div>










<!-- Generate Random objective paper -->
<div id="grop" style="display:none;">

  <div>
    <div class="container">
      <h3 align="center">Random Objective Paper Test Generation</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <form action="generatePaper.php" method="post">
            <div class="panel-body">
                <div class="form-group">
                    <label>Test Name</label>
                    <input name="testName" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>No of Questions</label>
                    <input name="noQuestions" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Marks Per Question</label>
                    <input name="mark_per_question" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Negative Mark per Wrong Answer</label>
                    <input name="neg_mark" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Chapters</label>
                    <input name="chapters" type="text" class="form-control input-sm" placeholder="Enter comma separated chapter nos." required></input>
                </div>
                <div class="form-group">
                    <label>Number of questions per chapter</label>
                    <input name="questionCount" type="text" class="form-control input-sm" placeholder="Enter comma separated no. of questions for corresponding chapter" required></input>
                </div>
                <div class="form-group">
                    <label>Duration in mins</label>
                    <input name="duration" type="text" class="form-control input-sm" required></input>
                </div><div class="form-group">
                    <label>Start Date</label>
                    <input name="startDate" type="date" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Start time</label>
                    <input name="startTime" type="time" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                  <label for="standard">Class</label>
                  <select class="form-control"  name="standard" required>
                    <option value="" disabled selected>Choose Class</option>
                        <?php
                        $a = $_SESSION['teacher_id'];
                            $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                            }
                        }else{
                        echo "<option value=''>Standard not available</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                  <label for="standard">Subject</label>
                    <select class="form-control" name="subject" required>
                      <option value="" disabled selected>Choose Subject</option>
                      <?php
                      $a = $_SESSION['teacher_id'];
                          $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                          }
                      }else{
                      echo "<option value=''>Standard not available</option>";
                          }
                      ?>
                    </select>
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



                <div class="form-group">
                    <label>Do you want to display result immediately?</label>
                    <select name="result_type" class="form-control input-sm" title="Choose" required>
                      <option value="true">Yes</option>
                      <option value="false">No</option>
                    </select>
                </div>
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Question Paper</button>
        </form>
      </div>
    </div>
  </div>

</div>






<!-- Generate customized subjective paper -->
<div id="gcsp" style="display:none;">

  <div>
    <div class="container">
      <h3 align="center">Random subjective Paper Test Generation</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <form action="generateSubjectivePaper.php" method="post">
            <div class="panel-body">
                <div class="form-group">
                    <label>Test Name</label>
                    <input name="testName" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>No of Questions</label>
                    <input name="noQuestions" type="text" class="form-control input-sm" required></input>
                </div>
                <div class="form-group">
                    <label>Chapters</label>
                    <input name="chapters" type="text" class="form-control input-sm" placeholder="Enter comma separated chapter nos." required></input>
                </div>
                <div class="form-group">
                    <label>Number of questions per chapter</label>
                    <input name="questionCount" type="text" class="form-control input-sm" placeholder="Enter comma separated no. of questions for corresponding chapter" required></input>
                </div>
                <div class="form-group">
                  <label for="standard">Class</label>
                  <select class="form-control"  name="standard" required>
                    <option value="" disabled selected>Choose Class</option>
                        <?php
                        $a = $_SESSION['teacher_id'];
                            $query = "SELECT DISTINCT standard FROM teacher_teaches WHERE teacher_id=$a";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row["standard"]}'>{$row['standard']}</option>";
                            }
                        }else{
                        echo "<option value=''>Standard not available</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                  <label for="standard">Subject</label>
                    <select class="form-control" name="subject" required>
                      <option value="" disabled selected>Choose Subject</option>
                      <?php
                      $a = $_SESSION['teacher_id'];
                          $query = "SELECT DISTINCT subject_id FROM teacher_teaches WHERE teacher_id=$a";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option value='{$row["subject_id"]}'>{$row['subject_id']}</option>";
                          }
                      }else{
                      echo "<option value=''>Standard not available</option>";
                          }
                      ?>
                    </select>
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
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Question Paper</button>
        </form>
      </div>
    </div>
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
function showDivc() {
  document.getElementById('c').style.display = "block";
  document.getElementById('aq').style.display = "block";
  document.getElementById('a').style.display = "none";
  document.getElementById('b').style.display = "none";
    document.getElementById('d').style.display = "none";
  document.getElementById('csv').style.display = "none";
  document.getElementById('img').style.display = "none";
  document.getElementById('sub').style.display = "none";
  document.getElementById('e').style.display = "none";
}
function showDivcsv() {
  document.getElementById('csv').style.display = "block";
  document.getElementById('aq').style.display = "none";
}
function showDivimg() {
  document.getElementById('img').style.display = "block";
  document.getElementById('aq').style.display = "none";
}
function showDivsub() {
  document.getElementById('sub').style.display = "block";
  document.getElementById('aq').style.display = "none";
}


function showDivb() {
  document.getElementById('b').style.display = "block";
  document.getElementById('ps').style.display = "block";
  document.getElementById('a').style.display = "none";
    document.getElementById('d').style.display = "none";
  document.getElementById('c').style.display = "none";
  document.getElementById('gcop').style.display = "none";
  document.getElementById('grop').style.display = "none";
  document.getElementById('gcsp').style.display = "none";
  document.getElementById('e').style.display = "none";
}
function showDiva() {
  document.getElementById('a').style.display = "block";
  document.getElementById('b').style.display = "none";
  document.getElementById('c').style.display = "none";
    document.getElementById('d').style.display = "none";
    document.getElementById('e').style.display = "none";
}
function showDivd() {
  document.getElementById('d').style.display = "block";
  document.getElementById('b').style.display = "none";
  document.getElementById('c').style.display = "none";
    document.getElementById('a').style.display = "none";
    document.getElementById('e').style.display = "none";
}
function showDive() {
  document.getElementById('e').style.display = "block";
  document.getElementById('b').style.display = "none";
  document.getElementById('c').style.display = "none";
    document.getElementById('a').style.display = "none";
    document.getElementById('d').style.display = "none";
}
function showDivgcop() {
  document.getElementById('gcop').style.display = "block";
  document.getElementById('ps').style.display = "none";
}
function showDivgrop() {
  document.getElementById('grop').style.display = "block";
  document.getElementById('ps').style.display = "none";
}
function showDivgcsp() {
  document.getElementById('gcsp').style.display = "block";
  document.getElementById('ps').style.display = "none";
}
</script>


<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard1").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject1").html(data);
	}
    });
   }else{
	$('#subject1').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject1").on("change", function(){
   var subjectId = $(this).val();
	if (subjectId) {
      	   $.ajax({
		url :"action.php",
		type:"POST",
		cache:false,
		data:{subjectId:subjectId},
	        success:function(data){
		   $("#city").html(data);
	       }
	   });
	}
     });
 });
</script>

<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard5").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject5").html(data);
	}
    });
   }else{
	$('#subject5').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject5").on("change", function(){
   var subjectId = $(this).val();
	if (subjectId) {
      	   $.ajax({
		url :"action.php",
		type:"POST",
		cache:false,
		data:{subjectId:subjectId},
	        success:function(data){
		   $("#city").html(data);
	       }
	   });
	}
     });
 });
</script>


<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard2").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject2").html(data);
	}
    });
   }else{
	$('#subject2').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject2").on("change", function(){
   var subjectId = $(this).val();
	if (subjectId) {
      	   $.ajax({
		url :"action.php",
		type:"POST",
		cache:false,
		data:{subjectId:subjectId},
	        success:function(data){
		   $("#city").html(data);
	       }
	   });
	}
     });
 });
</script>


<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard3").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject3").html(data);
	}
    });
   }else{
	$('#subject3').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject3").on("change", function(){
   var subjectId = $(this).val();
	if (subjectId) {
      	   $.ajax({
		url :"action.php",
		type:"POST",
		cache:false,
		data:{subjectId:subjectId},
	        success:function(data){
		   $("#city").html(data);
	       }
	   });
	}
     });
 });
</script>

<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard4").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject4").html(data);
	}
    });
   }else{
	$('#subject4').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject4").on("change", function(){
   var subjectId = $(this).val();
	if (subjectId) {
      	   $.ajax({
		url :"action.php",
		type:"POST",
		cache:false,
		data:{subjectId:subjectId},
	        success:function(data){
		   $("#city").html(data);
	       }
	   });
	}
     });
 });
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
