<?php 

include('db_conn.php'); // Include the database connection file
require("../define.php"); // Include the constants file

session_start(); // Start the session

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn'])){
    // Check if the form is submitted via POST and the login button is clicked
    
    $email = $_POST['email']; // Get the email from the form
    $password = $_POST['password']; // Get the password from the form
    
    // Check if the terms checkbox is checked
    if (isset($_POST['terms'])) {
        // Checkbox was checked
        $check_terms = 1;
    } else {
        // Checkbox was not checked
        $check_terms = 0; // or any default value you want to assign
    }
    
    $errors = []; // Initialize an empty array to store errors

    // Validate email and password
    if(empty(trim($email))){
        $errors['email'] = "Email is required";
    }
    if(empty(trim($password))){
        $errors['password'] = "Password is required";
    }

    if(!empty(trim($email)) && !empty((trim($password)))){
    // Query the database to check if the email exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if($result){
        // If the query is successful, fetch the user data
        $row = mysqli_fetch_assoc($result);
        
        if($row){
            // Data was fetched successfully
            $hashed = $row['password']; // Get the hashed password from the database
            $user_id = $row['id']; // Get the user ID from the database
            $username = $row['username']; // Get the username from the database
            
            // Verify the entered password with the hashed password
            if(password_verify($password, $hashed)){
                // If passwords match, create session data for the user
                $_SESSION['user'] = [
                    'id' => $user_id,
                    'username' => $username,
                    'email' => $email,
                    'profile-image' => "default.jpg",
                    'bg-image' => "default.jpg",
                ];
                // Redirect the user to the home page
                header("Location:" . APPURL . "/frontend/view.index.php");
                exit();
            } else {
                // Password verification failed
                $errors['password'] = "Wrong email or password";
            }
        } else {
            // Email not found in the database
            $errors['email'] = "Email not found";
        }
    } else {
        // If the query fails, set an error message
        $errors['query'] = "Somthing Wrong";
        }
}
}


