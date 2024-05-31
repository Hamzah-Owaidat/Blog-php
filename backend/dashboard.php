<?php

// Start session and include database connection
session_start();
include "db_conn.php";
require("../define.php"); // Assuming define.php contains constants used in the application

// Check if form is submitted
if (isset($_POST['submit'])) {
    
    // Validate post title, body, and topic
    $postTitle = $_POST['post-title'];
    $postBody = $_POST['post-body'];
    $postTopic = $_POST['post-topic'];

    $errors = [];

    // Validate post title
    if (empty($postTitle)) {
        $errors['title-error'] = "Post title is required";
    }
    if (strlen($postTitle) > 50) {
        $errors['title-error'] = "Post title must be less than 50 characters";
    }

    // Validate post body
    if (empty($postBody)) {
        $errors['body-error'] = "Post body is required";
    }

    // Validate post topic
    if (empty($postTopic)) {
        $errors['topic-error'] = "Topic is required";
    }

    // File upload handling
    if (isset($_FILES['post-image'])) {
        $file = $_FILES['post-image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Validate file type
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "avif");

        if (!in_array($fileExt, $allowedExtensions)) {
            $errors['image-error'] = "Only JPG, JPEG, PNG, and AVIF files are allowed";
        }

        // Validate file size (1MB limit)
        $maxFileSize = 1 * 1024 * 1024; // 1MB in bytes
        if ($fileSize > $maxFileSize) {
            $errors['image-error'] = "File size exceeds the limit (1MB)";
        }

        // If no errors, proceed with file upload and database insertion
        if (empty($errors)) {
            $uniqid = uniqid();
            $newFileName = $uniqid . "." . $fileExt;
            move_uploaded_file($fileTmpName, "../assets/uploads/posts_images/" . $newFileName);

            // Insert data into the database
            $stmt = $conn->prepare("INSERT INTO posts (author_id, post_title, post_body, topic, post_image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $_SESSION['user']['id'], $postTitle, $postBody, $postTopic, $newFileName);
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();

            // Redirect to homepage after successful insertion
            header("Location:" . APPURL . "/frontend/view.index.php");
            exit();
        }
    }
}
?>
