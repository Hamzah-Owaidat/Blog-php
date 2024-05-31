<?php 
include "../backend/dashboard.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="flex justify-center items-center my-6">
        <form action="" method="post" enctype="multipart/form-data" class="bg-gray-200 p-6 rounded-lg w-96">
            <div class="space-y-3">
                <!-- IMAGE POST -->
                <div class="flex justify-center items-center">
                    <div class="max-w-full">
                        <img id="preview-image" src="" alt="Image post" class="w-80 h-64">
                    </div>
                </div>

                <input type="file" id="post-image-input" name="post-image" hidden>
                <button id="post-image-btn" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Select Image</button>
                <!-- HANDLE IMAGE ERROR -->

                <!-- TITLE POST -->
                <label for="post-title" class="block">Post Title</label>
                <input type="text" name="post-title" class="w-full border border-gray-300 rounded-lg py-1 px-3">
                <!-- HANDLE TITLE ERROR -->
                <p class="text-red-500 py-1">
                    <?php echo $errors['title-error'] ?? '' ?>
                </p>

                <!-- BODY POST -->
                <label for="post-body" class="block">Post Body</label>
                <textarea name="post-body" cols="30" rows="10"
                    class="w-full border border-gray-300 rounded-lg py-1 px-3"></textarea>
                <!-- HANDLE BODY ERROR -->
                <p class="text-red-500 py-1">
                    <?php echo $errors['body-error'] ?? '' ?>
                </p>

                <!-- Topic -->
                <label for="post-topic" class="block">Post Topic</label>
                <select name="post-topic" class="w-full border border-gray-300 rounded-lg py-1 px-3">
                    <option value="Sport">Sport</option>
                    <option value="Music">Music</option>
                    <option value="Motivation">Motivation</option>
                    <option value="Quotes">Quotes</option>
                    <option value="Inspiration">Inspiration</option>
                    <option value="Life Lessons">Life Lessons</option>
                </select>
            </div>

            <div class="flex justify-between mt-2">
                <button class="bg-blue-500 text-white py-2 px-4 rounded-lg">
                    <a href="./view.profile.php">
                        Back
                    </a>
                </button>
                <button class="bg-blue-500 text-white py-2 px-4 rounded-lg" name="submit">
                    Post
                </button>
            </div>

        </form>
    </div>

</body>
<!-- TAILWIND  -->
<script src="https://cdn.tailwindcss.com"></script>

<script src="../assets/js/dashboard.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</html>