<?php 

session_start(); // Start the session
include('db_conn.php'); // Include the database connection file
require("../define.php"); // Include the constants file

// TRENDING POSTS
$query = "SELECT posts.*, COUNT(posts_like.post_id) AS like_count
            FROM posts
            INNER JOIN posts_like ON posts.id = posts_like.post_id
            GROUP BY posts.id
            ORDER BY like_count DESC
            LIMIT 6";
$result = mysqli_query($conn, $query); // Execute the query

if($result){
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all trending posts
}

// RECENT POSTS
$query =   "SELECT posts.*, users.username AS author_name 
            FROM posts 
            INNER JOIN users ON posts.author_id = users.id 
            WHERE posts.created_at <= NOW() 
            ORDER BY posts.created_at DESC 
            LIMIT 4";


$result = mysqli_query($conn, $query); // Execute the query
if ($result) {
    $recent_posts = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all recent posts
}

?>
