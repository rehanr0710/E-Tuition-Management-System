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
    if($_SESSION['role']!='student'){
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
  <symbol id="comments" viewBox="0 0 16 16">
          <path d="M0,16.13V2H15V13H5.24ZM1,3V14.37L5,12h9V3Z"/><rect x="3" y="5" width="9" height="1"/><rect x="3" y="7" width="7" height="1"/><rect x="3" y="9" width="5" height="1"/>
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
    <img class="logo" src="logo.png" alt="logo" style="height:60px;width:90px;"></img>
    <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu" style="height: 35px">
      <svg width="20" height="20" aria-hidden="true">
        <use xlink:href="#down"></use>
      </svg>
    </button>
    <ul class="admin-menu">
      <li class="menu-heading">
        <h3 style="color:#fff;font-weight:bold; font-size:14px;">Student Panel</h3>
      </li>
	  <li>
		<a href="#class" style="color: #dde9f8; text-decoration: none;">
		<svg>
            <use xlink:href="#comments"></use>
          </svg>
          <span value="h" onclick="home()">Courses</span>
		  </a>
		</li>
	  <li>
        <a href="#0" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#pages"></use>
          </svg>
          <span value="b" onclick="showDivb()" >Exam</span>
        </a>
      </li>
      <li>
        <a href="#class" style="color: #dde9f8; text-decoration: none;">
          <svg>
            <use xlink:href="#collection"></use>
          </svg>
          <span value="c" onclick="showDivc()">Result</span>
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

  </div>
</div>

<div id="c" style="display:none;">
<h4>View Previous Scores</h4>
<br>
<table>
  <tr>
    <td><strong>Test Name</strong></td>
    <td><strong>Marks Obtained</strong></td>
    <td><strong>Maximum Marks</strong></td>
    <td><strong>Test Date</strong></td>

  </tr>

<?php

$class = $_SESSION['class'];
$medium = $_SESSION['medium'];
$Enrollment_ID = $_SESSION['enrollID'];
$sql = "SELECT testid,test_name,start_date,type,mark_per_question,no_of_ques,corres_mark_per_question FROM testdata WHERE standard = '$class' and medium = '$medium'";
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) >0){
  while($row = mysqli_fetch_assoc($results)){
    $a = 'test'.$row['testid'];
    $b='class'.$class.$medium.'result';
    $sql1="SELECT $a FROM $b WHERE Enrollment_ID='$Enrollment_ID'";
    $result = mysqli_query($conn1, $sql1);
    $rows = mysqli_fetch_assoc($result);
    if($row['type']==0){
      $total = $row['mark_per_question'] * $row['no_of_ques'];
    }else{
      $marks = $row['corres_mark_per_question'];
      $marks = explode(",",$marks);
      $total = 0;
      $i=0;
      while($i<count($marks)){
        $total = $total + $marks[$i];
        $i = $i+1;
      }
    }

    ?>

    <tr>
      <td><?php echo $row['test_name']; ?></td>
      <td><?php echo $rows[$a]; ?></td>
      <td><?php echo $total; ?></td>
      <td><?php echo $row['start_date'] ?></td>
    </tr>

    <?php
  }
}

 ?>
 </table>
  </div>
</div>
</div>
</div>
<div id="h">
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

<div id="b" style="display:none;">

  <div class="row">
    <?php
      $class = $_SESSION['class'];
      $medium = $_SESSION['medium'];
      $sql = "SELECT * FROM subjects WHERE standard='$class' and medium = '$medium'";
      $results = mysqli_query($conn, $sql);
      if (mysqli_num_rows($results) >0){
        while($row = mysqli_fetch_assoc($results)){?>
          <div class="col-md-6">
          <div  style=" margin-top:15px;width: 50%; " class="answer_list" >
          <div class="card" style="width:190%">
            <div class="card-body" >
              <h5 class="card-title"><?php echo $row['subject_name']; ?></h5>
              <p class="card-text"> <br></p>
              <a href="#" class="btn btn-primary btn-sm" >See Upcoming Exams.</a>
            </div>
          </div>
          </div>
          </div>

          <?php
        }
        }
    ?>


    </div>
    <br>
    <br>

	<div class="card">
	<h5 class="card-header">Exam name</h5>
	<div class="card-body">
    <h5 class="card-title">Instructions</h5>
    <p class="card-text">1. The examination does not require using any paper, pen, pencil and calculator.<br>
	2. Every student will take the examination on a Laptop/Desktop/Smart Phone<br>
	3. On computer screen every student will be given objective type type Multiple Choice
	Questions (MCQs).<br>
	4. Each student will get questions and answers in different order selected randomly
	from a fixed Question Databank.<br>
	5. The students just need to click on the Right Choice / Correct option from the
	multiple choices /options given with each question. For Multiple Choice Questions,
	each question has four options, and the candidate has to click the appropriate
	option.</p>
    <button><a href="test.php" class="btn btn-primary">Start Exam</a></button>
	</div>
	</div>

</div>
</section>
<script>
  window.history.forward();
  function noBack() {
    window.history.forward();
  }
  function preventBack() { window.history.forward(); }  
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
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
  document.getElementById('h').style.display = "none";
  document.getElementById('b').style.display = "none";

}

function showDivb() {
  document.getElementById('b').style.display = "block";
  document.getElementById('h').style.display = "none";
  document.getElementById('c').style.display = "none";
}
function home() {
  document.getElementById('c').style.display = "none";
  document.getElementById('h').style.display = "block";
  document.getElementById('b').style.display = "none";

}


</script>
<script type="text/javascript">
   $(document).ready(function(){
   //standard dependent ajax
   $("#standard").on("change",function(){
   var standardId = $(this).val();
   if (standardId) {
    $.ajax({
    	url :"action.php",
	type:"POST",
	cache:false,
	data:{standardId:standardId},
	success:function(data){
	    $("#subject").html(data);
	}
    });
   }else{
	$('#subject').html('<option value="">Select standard</option>');
   }
});

// subject dependent ajax
 $("#subject").on("change", function(){
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
