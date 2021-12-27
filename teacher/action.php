<?php 
    // Include the database config file 
    session_start();
    include '../partials/config.php';

	// Get country id through state name

    $standardId = $_POST['standardId'];

    if (!empty($standardId)) {
        // Fetch state name base on standard id
        $query = "SELECT * FROM subjects WHERE standard = {$standardId}";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>'; 
            }
        }else{
            echo '<option value="">Subject not available</option>'; 
        }
	}

?>