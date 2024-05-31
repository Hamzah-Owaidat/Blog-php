<?php 

include('db_conn.php'); // Include the database connection file
require("../define.php"); // Include the constants file

session_start(); // Start the session

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_btn'])){
    // Check if the form is submitted via POST and the register button is clicked
    
    $username = $_POST['username']; // Get the username from the form
    $email = $_POST['email']; // Get the email from the form
    $password = $_POST['password']; // Get the password from the form
    $confirmPassword = $_POST['confirm-password']; // Get the confirm password from the form
    
    // Check if the terms checkbox is checked
    if (isset($_POST['terms'])) {
        // Checkbox was checked
        $check_terms = 1;
    } else {
        // Checkbox was not checked
        $check_terms = 0; // or any default value you want to assign
    }

    $errors = []; // Initialize an empty array to store errors

    // Validate username, email, password, and confirm password
    if(empty(trim($username))){
        $errors['username'] = "Username is required";
    }

    if(empty(trim($email))){
        $errors['email'] = "Email is required";
    }
    // Check if email matches pattern
    elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $email)) {
        $errors['email'] = "Email must be a valid format";
    }

    if(empty(trim($password))){
        $errors['password'] = "Password is required";
    }
    // Check if password length is between 8 and 12 characters
    elseif(strlen($password) < 8 || strlen($password) > 12){
        $errors['password'] = "Password must be between 8 and 12 characters";
    }

    if(empty(trim($confirmPassword))){
        $errors['confirm-password'] = "Confirm Password is required";
    }

    // Check if password matches confirm password
    if($password !== $confirmPassword){
        $errors['confirm-password'] = "Passwords do not match";
    }

    if (empty($errors)){
        // Check if email already exists in the database
        $check_email = "SELECT 1 FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $check_email);
        
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already exists";
        } else {
            // If email does not exist, hash the password
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            
            // Insert user data into the database
            $sql = "INSERT INTO users(username, email, password, check_terms) VALUES('$username', '$email', '$hashed', '$check_terms')";
            mysqli_query($conn,$sql);
            
            // Get the user's ID
            
            // Redirect to the home page after successful registration
            header("Location:" . APPURL . "/frontend/view.login.php");
            exit();
        }
        $user_id = mysqli_insert_id($conn);

        // Save user info in session
        $_SESSION['user'] = [
            'id' => $user_id,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'profile-image' => "default.jpg",
            'bg-image' => "default.jpg",
        ];
    }
}
