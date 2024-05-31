<?php
include "../backend/index.php";

?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penman</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="../assets/css/index.css">
    <!-- Slick Js -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <!-- Navigation menu -->
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <!-- Blog link -->
                    <li>
                        <a href="view.index.php" id="Blog"
                            class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 bg-blue-700 dark:bg-blue-600 md:dark:bg-transparent transition-opacity duration-500 ease-in-out"
                            aria-current="page">Blog</a>
                    </li>
                    <!-- Posts link -->
                    <li>
                        <a href="view.all_posts.php" id="About"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Posts</a>
                    </li>
                    <!-- Conditional display for Profile, Login, and Sign up links -->
                    <?php if (isset($_SESSION['user'])): ?>
                    <!-- Profile link if user is logged in -->
                    <li>
                        <a href="view.profile.php" id="Profile"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Profile</a>
                    </li>
                    <?php else : ?>
                    <!-- Login link if user is not logged in -->
                    <li>
                        <a href="view.login.php" id="login"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Login</a>
                    </li>
                    <!-- Sign up link if user is not logged in -->
                    <li>
                        <a href="view.register.php" id="signup"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Sign
                            up</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <!-- /Navbar -->

    <!-- Trending Posts -->
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-center py-5">
            <h1 class="text-blue-600 font-black text-xl md:text-3xl">Trending Posts</h1>
        </div>
        <div class="conatiner mx-auto px-4">
            <div class="autoplay cursor-pointer min-h-fit">
                <!-- Loop through each post in the $posts array -->
                <?php foreach ($posts as $post): ?>
                <div class="mr-2 md:mr-4 hover:scale-105 duration-500">
                    <!-- Link to view the single post, with post ID passed as a parameter -->
                    <a href="./view.single_post.php?id=<?= $post['id'] ?>">
                        <!-- Post image -->
                        <img src="../assets/uploads/posts_images/<?php echo $post['post_image']; ?>" alt="Post Image"
                            class="rounded-t w-full h-40">
                    </a>
                    <!-- Post details container -->
                    <div
                        class="border-solid rounded-b border-l border-b border-r px-2 py-3 dark:border-none dark:bg-gray-800">
                        <!-- Post title -->
                        <h1
                            class="font-black w-full h-6 text-black text-base md:text-2xl pt-1 pb-20 dark:text-blue-600">
                            <!-- Link to view the single post, with post ID passed as a parameter -->
                            <a
                                href="./view.single_post.php?id=<?= $post['id'] ?>"><?php echo $post['post_title']; ?></a>
                        </h1>
                        <!-- Post excerpt -->
                        <p class="text-xs w-full md:text-sm text-neutral-500 dark:text-white h-20 md:h-14">
                            <a href="#">
                                <?php 
                        // Extract an excerpt from the post body (first 100 characters)
                        $excerpt = substr($post['post_body'], 0, 100); 
                        echo $excerpt; 
                    ?>
                            </a>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <!-- /Trending Posts -->

    <!-- Recent Posts -->
    <div class="container mx-auto px-4 mt-10" id="recent-posts">
        <h1 class="text-2xl font-bold text-blue-600 mb-3">Recent Posts</h1>
        <div class="md:grid md:grid-cols-3 md:gap-10">

            <!-- Recent Posts -->
            <div class="md:col-span-2" id="recent-post" >
                <!-- Loop through each recent post -->
                <?php foreach ($recent_posts as $post): ?>
                <div class="border-2 shadow-lg h-fit mb-8" >
                    <!-- Grid layout for post content -->
                    <div class="md:grid md:grid-cols-3 md:gap-10 dark:bg-gray-800" >
                        <!-- Post image column -->
                        <div class="md:col-span-1">
                            <!-- Link to view the single post -->
                            <a href="./view.single_post.php?id=<?= $post['id'] ?>">
                                <!-- Post image -->
                                <img src="../assets/uploads/posts_images/<?= $post['post_image'] ?>" alt=""
                                    class="h-56 w-56">
                            </a>
                        </div>
                        <!-- Post details column -->
                        <div class="md:col-span-2 px-2 md:px-0">
                            <!-- Post title -->
                            <h1 class="text-2xl font-bold text-blue-600 py-3">
                                <?= $post['post_title'] ?>
                            </h1>
                            <!-- Post excerpt -->
                            <p class="py-2 dark:text-white">
                                <?php 
                                    $excerpt = substr($post['post_body'], 0, 100); 
                                    echo $excerpt; 
                                ?>
                            </p>
                            <!-- "Read more" link -->
                            <a href="./view.single_post.php?id=<?= $post['id'] ?>" class="text-blue-800">
                                Read more
                            </a>
                            <!-- Author and date information -->
                            <div class="flex items-center gap-5 py-2">
                                <p class="text-slate-400">
                                    <?= $post['author_name'] ?>
                                </p>
                                <p class="text-slate-400">
                                    <?= $post['created_at'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- /Recent Posts -->


            <!-- Search & Topics-->
            <div>
                <div class="w-full p-6 bg-gray-50 dark:bg-white rounded">
                    <h1 class="text-xl text-gray-800 pb-3 font-bold">Search</h1>
                    <input type="search" placeholder="Search..." name="search" id="search"
                        class="w-full p-3 outline-none border-b-4 dark:bg-gray-100 rounded">
                </div>
                <div class="w-full p-6 bg-gray-50 dark:bg-white rounded mt-3">
                    <h1 class="text-xl text-gray-800 pb-3 border-b-2 font-bold">Topics</h1>
                    <ul>
                        <li
                            class="border-b-2 py-2 text-gray-500 hover:ps-4 hover:transition-all duration-500 hover:text-blue-600 text-lg cursor-pointer">
                            <a href="./view.all_posts.php?topic=Sport">
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
                            <a href="./view.all_posts.php?topic=Motivation ">
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
                            <a href="./view.all_posts.php?topic=Life%20Lessons">
                                Life Lessons
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Search & Topics -->
        </div>




    </div>
    <!-- /Recent Posts -->

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
</script>
<!-- jquery -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Slick js -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Custom js -->
<script src="../assets/js/slick.js"></script>

<!-- Index js -->
<script src="../assets/js/index.js"></script>
</html>