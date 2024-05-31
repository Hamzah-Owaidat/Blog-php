<?php 
session_start(); // Start a new session or resume the existing session.
include "db_conn.php"; // Include the file to establish a database connection.

// Check if the 'topic' parameter is set in the URL.
if(isset($_GET['topic'])){
    // Get the topic value from the URL.
    $topic = $_GET['topic'];

    // Prepare a SQL statement to select posts with the specified topic,
    // joining the 'posts' table with the 'users' table to get the username of the post author.
    $stmt = $conn->prepare("SELECT posts.*, users.username FROM posts 
                            INNER JOIN users ON posts.author_id = users.id
                            WHERE topic = ?");
    // Bind the topic parameter to the prepared statement.
    $stmt->bind_param('s', $topic);
    // Execute the prepared statement.
    $stmt->execute();
    // Get the result set from the executed statement.
    $result = $stmt->get_result();
    // Close the prepared statement.
    $stmt->close();

    // If the result set is obtained successfully.
    if($result){
        // Fetch all rows from the result set as an associative array and store them in $posts.
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
} else {
    // If no 'topic' parameter is set in the URL, retrieve all posts.
    
    // Construct a SQL query to select all posts, ordered by 'created_at' in descending order.
    $query = "SELECT posts.*, users.username FROM posts
                INNER JOIN users ON posts.author_id = users.id            
                ORDER BY posts.created_at DESC";
    // Execute the SQL query.
    $result = mysqli_query($conn, $query);

    // If the query is executed successfully.
    if($result){
        // Fetch all rows from the result set as an associative array and store them in $posts.
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

