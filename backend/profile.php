<?php 
session_start(); // Start the session
include('db_conn.php'); // Include the database connection file
require("../define.php"); // Include the constants file

$query = "SELECT * FROM users WHERE id = ?"; // SQL query to select user data by ID
$stmt = $conn->prepare($query); // Prepare the SQL statement
$stmt->bind_param("i", $_SESSION['user']['id']); // Bind the user ID parameter
$stmt->execute(); // Execute the prepared statement
$result = $stmt->get_result(); // Get the result of the query
$row = $result->fetch_assoc(); // Fetch the user data as an associative array

if(isset($_POST["submit"]) && isset($_FILES['image'])){
    // Check if the form is submitted and an image is uploaded
    
    $errors = array(); // Initialize an empty array to store errors

    $file_name = $_FILES['image']['name']; // Get the name of the uploaded image
    $file_size = $_FILES['image']['size']; // Get the size of the uploaded image
    $file_tmp = $_FILES['image']['tmp_name']; // Get the temporary file path of the uploaded image
    $file_type = $_FILES['image']['type']; // Get the MIME type of the uploaded image
    $arr_for_image = explode('.', $file_name); // Split the file name by dot to get the file extension
    $last_Element_from_image = strtolower( end($arr_for_image)); // Get the last element of the array (file extension)
    $extensions = array("jpeg", "jpg", "png"); // Allowed file extensions

    // Validate the image file
    if(!in_array($last_Element_from_image, $extensions)){
        $errors['image'] = "This file extension is not allowed, please choose a JPEG or PNG file.";
    }

    if(empty($file_name)){
        $errors['image'] = "Please choose an image file.";
    }
    
    // Check if there are any errors
    if(count($errors) === 0){
        // If no errors, proceed with the upload
        
        $unique = uniqid(); // Generate a unique ID for the image file
        $new_file_name = $unique . "." . $last_Element_from_image; // Generate the new file name
        move_uploaded_file($file_tmp, "../assets/uploads/profile_images/" . $new_file_name); // Move the uploaded file to the destination folder
        
        // Update the image file name in the database
        $query = "UPDATE users SET profile_image = ? WHERE id = ?";
        $stmt = $conn->prepare($query); // Prepare the SQL statement
        $stmt->bind_param("si", $new_file_name, $_SESSION['user']['id']); // Bind parameters
        $stmt->execute(); // Execute the prepared statement
        
        // Update the image file name in the session data
        $_SESSION['user']['profile-image'] = $new_file_name;
        
        // Remove the old image file
        unlink("../assets/uploads/profile_images/" . $row['profile_image']);

        // Redirect to the same page after successful upload
        header("Location: ".$_SERVER['PHP_SELF']);
        exit(); // Terminate the script
    }
}

// Assign user data to variables for use in the form
$address = $row['address'];
$job = $row['job'];
$study_category = $row['study_category'];
$bio = $row['bio'];


