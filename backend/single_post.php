<?php

session_start();
include "db_conn.php";
include "../define.php";

// Function to count the number of likes for a post and check if the user has liked it
function countLikesAndCheckIfLikedByUser($conn, $postId, $userId) {
    // Initialize variables
    $count = 0;
    $isLiked = false;

    // Count the number of likes for the post
    $stmt = $conn->prepare("SELECT COUNT(post_id) FROM posts_like WHERE post_id = ?");
    $stmt->bind_param('i', $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result) {
        $row = $result->fetch_row();
        if ($row) {
            $count = $row[0];
        }
    }

    // Check if the user has liked the post
    if ($userId) {
        $stmt = $conn->prepare("SELECT COUNT(post_id) FROM posts_like WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param('ii', $postId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result) {
            $row = $result->fetch_row();
            if ($row && $row[0] > 0) {
                $isLiked = true;
            }
        }
    }

    return array('count' => $count, 'isLiked' => $isLiked);
}

$isLiked = false;
$count = 0;

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch post details
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param('i', $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result) {
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fetch popular posts
    $query = "SELECT * FROM posts ORDER BY Rand() LIMIT 5";
    $popularResult = mysqli_query($conn, $query);
    if ($popularResult) {
        $popularPosts = mysqli_fetch_all($popularResult, MYSQLI_ASSOC);
    }

    // Check if the user is logged in
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

    // Get the count of likes for the post and check if the user has liked it
    $likesInfo = countLikesAndCheckIfLikedByUser($conn, $postId, $userId);
    $count = $likesInfo['count'];
    $isLiked = $likesInfo['isLiked'];
}
// Like 
if (isset($_POST['like'])) {
    if (isset($_SESSION['user']['id'])) {
        $userId = $_SESSION['user']['id'];
        $postId = $_GET['id'];

        // Check if the post is already liked by the user
        $isLiked = $likesInfo['isLiked'];

        if (!$isLiked) {
            // Insert a new like
            $stmt = $conn->prepare("INSERT INTO posts_like (user_id, post_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $userId, $postId);
            $stmt->execute();
            $stmt->close();
            $isLiked = true;
        } else {
            // Unlike the post
            $stmt = $conn->prepare("DELETE FROM posts_like WHERE user_id = ? AND post_id = ?");
            $stmt->bind_param('ii', $userId, $postId);
            $stmt->execute();
            $stmt->close();
            $isLiked = false;
        }

        // Update the like count
        $stmt = $conn->prepare("SELECT COUNT(post_id) FROM posts_like WHERE post_id = ?");
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result) {
            $row = $result->fetch_row();
            if ($row) {
                $count = $row[0];
            }
        }
    } else {
        // Redirect user to login page if they try to like a post without making account
        header("Location:" . APPURL . "/frontend/view.register.php");
        exit();
    }
}


