<?php
    function fun(&$path, $value) {
        // File upload path
        $targetDir = "../uploads/";
        $fileName = basename($_FILES[$value]["name"]);


        if(strlen($fileName)) {
            //Reading count file
            $filename = "../uploads/count.txt";
            $file = fopen( $filename, "r" );

            if( $file == false ) {
                echo ( "Error in opening file" );
                exit();
            }
            $filesize = filesize( $filename );
            $filetext = fread( $file, $filesize);
            fclose( $file );
            $count = (int)$filetext;
            $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
            $rename = $count.'.'.$fileType;
            $targetFilePath = $targetDir . $rename;

            $statusMsg = '';
            if(isset($_POST["submit"]) && !empty($_FILES[$value]["name"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES[$value]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $path = "uploads/".$rename;

                    } else {
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }else{
                $statusMsg = 'Please select a file to upload.';
            }

            // Display status message
            echo $statusMsg;

            //Writing to count file
            $filename = "../uploads/count.txt";
            $file = fopen( $filename, "w" );

            if( $file == false ) {
                echo ( "Error in opening new file" );
                exit();
            }
            $count = $count+1;
            fwrite( $file,$count );
            fclose( $file );
            return $path;
        }
    }
    session_start();
	
    // Include the database configuration file
    include '../partials/config.php';
    if(isset($_POST["submit"])) {
        $table = $_POST['subject'];
		$_SESSION ['subject']=$_POST['subject'];
        $chapter = $_POST["chapters"];
        $ques = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $correctoption = $_POST['correctoption'];

        $ques = fun($ques, "questionimg");
        if(strlen($ques)==0){
          $ques=$_POST['question'];
        }
        $option1 = fun($option1, "option1img");
        if(strlen($option1)==0){
          $option1=$_POST['option1'];
        }
        $option2 = fun($option2, "option2img");
        if(strlen($option2)==0){
          $option2=$_POST['option2'];
        }
        $option3 = fun($option3, "option3img");
        if(strlen($option3)==0){
          $option3=$_POST['option3'];
        }
        $option4 = fun($option4, "option4img");
        if(strlen($option4)==0){
          $option4=$_POST['option4'];
        }
        if($correctoption == "1") {
            $correctoption = $option1;
        }else if($correctoption == "2") {
            $correctoption = $option2;
        }else if($correctoption == "3") {
            $correctoption = $option3;
        }else {
            $correctoption = $option4;
        }

        $sql = "INSERT INTO $table VALUES (NULL,'$chapter','$ques','$option1','$option2','$option3','$option4','$correctoption')";

        if(mysqli_query($conn2, $sql)){

            echo '<script>alert("Question Added Successfully")</script>';
			
            echo "<script>
                    window.location='vq.php';
                </script>";
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn2);
        }
    }
?>


