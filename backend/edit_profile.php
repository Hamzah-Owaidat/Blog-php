<?php

session_start();
include('../define.php'); // Include the constants file

// Check if the form is submitted
if(isset($_POST['submit'])){

    include("../backend/db_conn.php"); // Include the database connection file

    // Retrieve form data
    $address = $_POST['address'];
    $job = $_POST['job'];
    $study_category = $_POST['study_category'];
    $bio = $_POST['bio'];

    // Prepare and execute the update statement
    $stmt = $conn->prepare("UPDATE users SET address = ?, job = ?, study_category = ?, bio = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $address, $job, $study_category, $bio, $_SESSION['user']['id']);
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    
    // Merge the updated user information with the existing session data
     $_SESSION['user'] = array_merge($_SESSION['user'], array(
     'address' => $address,
     'job' => $job,
     'study_category' => $study_category,
     'bio' => $bio
     ));

   header("Location:" . APPURL . "/frontend/view.profile.php"); // Redirect to profile page
}
?>
