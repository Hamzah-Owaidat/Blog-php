<?php 

include "../backend/all_posts.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penman</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
</head>

<body>
    <!-- Navbar -->
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
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
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Blog</a>
                    </li>
                    <li>
                        <a href="view.all_posts.php" id="About"
                            class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 bg-blue-700 dark:bg-blue-600 md:dark:bg-transparent transition-opacity duration-500 ease-in-out"
                            aria-current="page">Posts</a>
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


    <!-- All posts -->
    <div class="container mx-auto px-2">

        <div class="py-2 flex w-full">
            <h1 class="text-lg pe-4">Filter</h1>
            <select name="post-topic" id="post-topic"
                class="border border-gray-300 rounded-lg w-full sm:w-56 outline-none py-1 px-1 sm:px-3">
                <option value="All">All</option>
                <option value="Sport">Sport</option>
                <option value="Music">Music</option>
                <option value="Motivation">Motivation</option>
                <option value="Quotes">Quotes</option>
                <option value="Inspiration">Inspiration</option>
                <option value="Life Lessons">Life Lessons</option>
            </select>
        </div>


        
        <!-- Grid for displaying posts -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Loop through each post -->
            <?php foreach ($posts as $post): ?>
            <!-- Individual post item -->
            <div class="hover:scale-105 duration-500">
                <!-- Link to view single post -->
                <a href="./view.single_post.php?id=<?= $post['id'] ?>">
                    <!-- Post image -->
                    <img src="../assets/uploads/posts_images/<?php echo $post['post_image']; ?>" alt="Post Image"
                        class="rounded-t w-full h-64">
                </a>
                <!-- Post content -->
                <div
                    class="border-solid rounded-b border-l border-b border-r px-2 py-3 dark:border-none dark:bg-gray-800 ">
                    <!-- Post title -->
                    <h1 class="font-black w-full md:h-6  text-black text-base md:text-xl pt-1 pb-3 md:pb-16  dark:text-blue-600 ">
                        <a href="./view.single_post.php?id=<?= $post['id'] ?>"><?php echo $post['post_title']; ?></a>
                    </h1>
                    <!-- Post excerpt -->
                    <p class="text-xs w-full md:text-sm text-neutral-500 dark:text-white h-3 pb-12 md:pb-24 lg:h-0 lg:pb-16">
                        <a href="./view.single_post.php?id=<?= $post['id'] ?>">
                            <?php 
                    // Extracting an excerpt from the post body
                    $excerpt = substr($post['post_body'], 0, 100); 
                    echo $excerpt; 
                ?>
                        </a>
                    </p>
                    <!-- Post metadata -->
                    <p class="text-end text-gray-500 text-xs lg:text-sm">
                        <!-- Displaying username, creation date, and topic -->
                        <?= $post['username'] ?>
                        <?= $post['created_at'] ?>
                        <?= $post['topic'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- /All posts -->


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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script src="../assets/js/all-posts.js"></script>

<script src="https://cdn.tailwindcss.com"></script>

</html>