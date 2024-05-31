
<?php

include "../backend/single_post.php";


?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penman</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Slick Js -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="dark:bg-gray-200">
    <!-- Navbar -->
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="container flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="view.index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Penman Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Penman</span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button" id="hamburger"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-transform duration-500 ease-in-out"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5 transition-transform duration-300 ease-in-out transform" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="w-full md:block md:w-auto overflow-hidden transition-max-height duration-500 ease-in-out max-h-0 md:max-h-screen"
                id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="view.index.php" id="Blog"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">
                            Blog</a>
                    </li>
                    <li>
                        <a href="view.all_posts.php" id="About"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Posts</a>
                    </li>

                    <li>
                        <a href="view.profile.php" id="Profile"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Profile</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- /Navbar -->


    <!-- POPUP FOR POST -->

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

    <!-- Hidden div with transition -->
    <div id="popupDiv"
        class="fixed w-96 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 dark:bg-gray-800 dark:text-white rounded opacity-0 invisible transition-opacity duration-300">
        <ul class="text-center">

            <!--  for admins only -->
            <?php if($_SESSION['user']['id'] == 1): ?>
            <li class="border-b border-gray-300 py-2 cursor-pointer text-red-600">Edit</li>
            <li class="border-b border-gray-300 py-2 cursor-pointer text-red-600">Delete</li>
            <?php endif ?>

            <li class="border-b border-gray-100 py-2 cursor-pointer text-red-600">Report</li>
            <li class="border-b border-gray-100 py-2 cursor-pointer" id="copy">Copy</li>
            <li class="py-2 cursor-pointer">Share</li>
        </ul>

    </div>
    <!-- /POPUP FOR POST -->
    <div id="alert"
        class="flex items-center w-60 p-4 my-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert" style="display: none;">

        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success alert!</span> Link copied
        </div>
    </div>

    <!-- Main -->
    <div class="container mx-auto md:px-3 mt-10">
        <div class="md:grid grid-cols-3 gap-5">

            <div class="col-span-2 h-fit bg-gray-100 dark:bg-white py-5 px-3 md:px-10 rounded mb-3 md:mb-0">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="text-3xl mb-5 font-black">
                        <?php echo $posts[0]['post_title'] ?>
                    </h1>
                    <i class="fa-solid fa-ellipsis-vertical text-2xl cursor-pointer" id="ellipsis"></i>
                </div>

                <p class="text-justify">
                    <?php echo $posts[0]['post_body'] ?>
                </p>
                <form action="" method="post">
                    <div class="flex items-center gap-5 mt-3 text-xl">

                        <!-- bas yekbs 3l like btt7wl mn  -->
                        <div class="flex flex-col mt-5 items-center">
                            <button type="submit" name="like" id="like" class="btn-like">
                            <i class="bi bi-heart <?php echo $isLiked ? 'hidden' : ''; ?>" id="notLiked"></i>
                            <i class="bi bi-heart-fill text-red-600 <?php echo $isLiked ? '' : 'hidden'; ?>" id="liked"></i>
                            </button>
                            <p class="text-gray-400 text-sm"><?= empty($count)? 0 : $count ?></p>
                        </div>
                       

                        <i class="fa-regular fa-comment cursor-pointer" name="comment" id="comment-btn"></i>

                        <i class="fa-regular fa-paper-plane cursor-pointer" name="share"></i>
                </form>
            </div>
            <div class="mt-3 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0"
                id="comment-section">
                <div class="flex items-center gap-3">
                    <input type="text" name="comment" id="comment" placeholder="Your comment..."
                        class="outline-none dark:bg-gray-100 px-3 py-2 w-4/5 border-b-4">
                    <button
                        class="flex items-center justify-center gap-3 w-1/5 bg-black dark:bg-blue-600 rounded text-white text-sm text-center self-center px-2 py-3">
                        <i class="fa-solid fa-paper-plane"></i>
                        Send
                    </button>
                </div>
            </div>
        </div>


        <div class="col-span-1">

            <!-- Popular -->

            <div class="w-full mb-3 p-6 bg-gray-50 dark:bg-white rounded">
                <h1 class="text-xl text-gray-800 pb-3 border-b-2 font-bold">Popular</h1>

                <?php foreach($popularPosts as $popularPost): ?>
                <div class="flex justify-between items-center py-3 gap-3 border-b-2 ">
                    <div class="w-20 h-20">
                        <a href="./view.single_post.php?id=<?= $popularPost['id'] ?>" class="w-20 h-20">
                            <img src="../assets/uploads/posts_images/<?= $popularPost['post_image'] ?>">
                        </a>
                    </div>
                    <a href="./view.single_post.php?id=<?= $popularPost['id'] ?>"
                        class="w-full max-h-20 font-black text-lg">
                        <?= $popularPost['post_title'] ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Topics -->
            <div class="w-full p-6 bg-gray-50 dark:bg-white rounded">
                <h1 class="text-xl text-gray-800 pb-3 border-b-2 font-bold">Topics</h1>
                <ul>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=sport">
                            Sport
                        </a>
                    </li>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=Music">
                            Music
                        </a>
                    </li>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=Motivation">
                            Motivation
                        </a>
                    </li>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=Quotes">
                            Quotes
                        </a>
                    </li>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=Inspiration">
                            Inspiration
                        </a>
                    </li>
                    <li
                        class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                        <a href="./view.all_posts.php?topic=Life Lessons">
                            Life Lessons
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Comment section -->

        </div>
    </div>
    </div>
    <!-- /Main -->


    <!-- Footer -->
    <footer class=" border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 mt-5 ">
        <div class="container mx-auto px-4">
            <div class="md:grid md:grid-cols-3 gap-20 pt-5">
                <!-- Fisrt coloumn -->
                <div class="col-span-1  ">
                    <a href="view.index.php" class="flex items-center space-x-3 rtl:space-x-reverse py-3">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Penman Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Penman</span>
                    </a>
                    <p class="py-3 text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est debitis dolores odio
                        cupiditate molestiae sapiente, dignissimos dolorum incidunt, consequatur impedit nesciunt.
                    </p>
                    <p class="flex items-center gap-2 text-gray-400 pb-3">
                        <i class="fa-solid fa-phone"></i>
                        +961/78 918 772
                    </p>
                    <p class="flex items-center gap-2 text-gray-400 pb-3">
                        <i class="fa-solid fa-envelope"></i>
                        hamzahowaidat2003@gmail.com
                    </p>

                    <div class="grid grid-cols-4 w-fit gap-2">
                        <!-- Facebook link -->
                        <div
                            class="col-span-1 border border-zinc-400 rounded text-gray-300 flex justify-center items-center hover:scale-110 duration-500">
                            <a href=" https://www.facebook.com/profile.php?id=100008652000170"
                                class="px-3 py-1 text-2xl text-blue-600">
                                <i class="fa-brands fa-square-facebook"></i>
                            </a>
                        </div>

                        <!-- Instagram link -->
                        <div
                            class="col-span-1 border border-zinc-400 rounded text-gray-300 flex justify-center items-center  hover:scale-110 duration-500">
                            <a href="https://www.instagram.com/hamzah_owaidat/"
                                class=" px-3 py-1 text-2xl text-rose-600">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>

                        <!-- LinkedIn link-->
                        <div
                            class="col-span-1 border border-zinc-400 rounded text-gray-300 flex justify-center items-center hover:scale-110 duration-500">
                            <a href="https://www.linkedin.com/in/hamzah-owaidat/"
                                class=" px-3 py-1 text-2xl text-sky-700">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>

                        <!-- Github link-->
                        <div
                            class="col-span-1 border border-zinc-400 rounded text-gray-300 flex justify-center items-center hover:scale-110 duration-500">
                            <a href="https://github.com/Hamzah-Owaidat" class=" px-3 py-1 text-2xl text-black">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Second coloumn -->
                <div class="col-span-1  ">
                    <h1 class="py-3 text-2xl font-semibold dark:text-white">Quick Links</h1>
                    <ul class="ps-12">
                        <li class="list-disc dark:text-white text-gray-800 py-1">
                            <a href="#" class="text-gray-400">
                                Events
                            </a>
                        </li>
                        <li class="list-disc dark:text-white text-gray-800 py-1">
                            <a href="#" class="text-gray-400">
                                Events
                            </a>
                        </li>
                        <li class="list-disc dark:text-white text-gray-800 py-1">
                            <a href="#" class="text-gray-400">
                                Events
                            </a>
                        </li>
                        <li class="list-disc dark:text-white text-gray-800 py-1">
                            <a href="#" class="text-gray-400">
                                Events
                            </a>
                        </li>
                        <li class="list-disc dark:text-white text-gray-800 py-1">
                            <a href="#" class="text-gray-400">
                                Events
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Third coloumn -->
                <div class="colspan-1  ">
                    <h1 class="py-3 text-2xl font-semibold dark:text-white">Contact Us</h1>
                    <input type="email" placeholder="@gmail.com" name="email" id="email"
                        class="w-full px-3 py-2 outline-none rounded mb-2">

                    <textarea placeholder="Your message..." rows="4" name="text" id="text"
                        class="w-full px-3 py-2 outline-none rounded "></textarea>
                    <button
                        class="float-end bg-black dark:bg-blue-600 rounded-lg text-white text-xs text-center self-center px-3 py-2 ">
                        <i class="fa-solid fa-envelope"></i>
                        Send
                    </button>

                </div>
            </div>
            <p class="md:text-xl text-xs text-gray-700 pt-10 pb-5 text-center">
                &#169; Penman.com | Designed by Hamzah Owaidat
            </p>
        </div>

    </footer>
    <!-- /Footer -->


</body>
<script>
    // Adding an event listener to the hamburger icon for click event
    document.getElementById("hamburger").addEventListener('click', () => {
        // Getting the navbar element by its ID
        const navbar = document.getElementById("navbar-solid-bg");
        // Getting the hamburger icon inside the navbar
        const hamburgerIcon = document.querySelector("#hamburger svg");

        // Toggling the 'max-h-0' class to show/hide the navbar
        navbar.classList.toggle('max-h-0');
        // Toggling the 'max-h-screen' class to expand/collapse the navbar
        navbar.classList.toggle('max-h-screen'); // You can adjust this value based on your content height
        // Toggling the 'rotate-180' class to rotate the hamburger icon
        hamburgerIcon.classList.toggle('rotate-180');
    });

    var cmtBtn = document.getElementById('comment-btn');
    var cmntSec = document.getElementById('comment-section');

    cmtBtn.addEventListener('click', () => {
        cmntSec.classList.toggle('max-h-0');
        cmntSec.classList.toggle('max-h-screen');
    });

    document.addEventListener('click', function (event) {
        const overlay = document.getElementById('overlay');
        const popupDiv = document.getElementById('popupDiv');

        if (event.target.id === 'ellipsis') {
            // Toggle the visibility and opacity of the overlay and popup
            overlay.classList.toggle('hidden');
            popupDiv.classList.toggle('invisible');
            popupDiv.classList.toggle('opacity-100');
        } else {
            // Close the popup by hiding both overlay and popupDiv
            overlay.classList.add('hidden');
            popupDiv.classList.add('invisible');
            popupDiv.classList.remove('opacity-100');
        }
    });

    // Copy Link
    function showHideAlert() {
        var alertDiv = document.getElementById('alert');
        alertDiv.style.display = 'block';
        setTimeout(function () {
            alertDiv.style.display = 'none';
        }, 2000);
    }
    document.getElementById('copy').addEventListener('click', () => {
        navigator.clipboard.writeText(window.location.href)
            .then(() => {
                showHideAlert();
            })
            .catch((error) => {
                console.error('Failed to copy URL to clipboard:', error);
            });
    })

    // Function to toggle the appearance of the like button based on the like status
    function toggleLikeButtonColor(isLiked) {
        var notLikedIcon = document.getElementById("notLiked");
        var likedIcon = document.getElementById("liked");

        if (isLiked) {
            notLikedIcon.classList.add("hidden");
            likedIcon.classList.remove("hidden");
        } else {
            notLikedIcon.classList.remove("hidden");
            likedIcon.classList.add("hidden");
        }
    }

    // Call the function to set the initial appearance
    toggleLikeButtonColor(<?php echo $isLiked ? 'true' : 'false'; ?>);
</script>
<!-- jquery -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

</html>