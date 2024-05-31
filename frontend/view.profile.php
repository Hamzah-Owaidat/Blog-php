<?php 
include("../backend/profile.php")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penman</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="../assets/css/profile-photo.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

</head>

<body>

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
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Blog</a>
                    </li>
                    <li>
                        <a href="view.all_posts.php" id="About"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-opacity duration-500 ease-in-out">Posts</a>
                    </li>
                    <li>
                        <a href="view.profile.php" id="Profile"
                            class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 bg-blue-700 dark:bg-blue-600 md:dark:bg-transparent transition-opacity duration-500 ease-in-out">Profile
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- /Navbar -->

    <main class="profile-page">
        <section class="relative block h-500-px">
            <div class="absolute top-0 w-full h-full" style="
                background-image: url(<?= $_SESSION['user']['profile-image'] === "default.jpg" ? '../assets/uploads/profile_images/default.jpg' : '../assets/uploads/profile_images/'.$_SESSION['user']['profile-image'] ?>);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
              ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- Profile image display -->
                                        <div class="relative user-img">
                                            <div id="photo" style=" background-image: url(<?= $_SESSION['user']['profile-image'] === "default.jpg" ? '../assets/uploads/profile_images/default.jpg' : '../assets/uploads/profile_images/'.$_SESSION['user']['profile-image'] ?>);
                                                                    background-size: cover;
                                                                    background-repeat: no-repeat;
                                                                    background-position: center;
                                                                    height: 150px;
                                                                    width: 150px;
                                                                    border-radius: 50%;"
                                                                    class="shadow-xl  align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"></div>
                                            <input type="file" name="image" id="file">
                                            <label for="file" id="uploadBtn" class="bg-blue-600">
                                                <i class="fa-solid fa-camera text-white"></i>
                                            </label>
                                        </div>
                                        <input type="submit" id="submit" name="submit" class="hidden">
                                    </form>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <button
                                        class="bg-blue-600 active:bg-blue-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none  sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                        type="button">
                                        <a href="../backend/logout.php">
                                            Log out
                                        </a>
                                    </button>

                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <button
                                            class="bg-blue-600 active:bg-blue-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none  sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            <a href="view.edit_profile.php">
                                                Edit Profile
                                            </a>
                                        </button>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <?php if ($_SESSION['user']['id'] == 1):?>
                                        <button
                                            class="bg-blue-600 active:bg-blue-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            <a href="view.dashboard.php">
                                                Dashboard
                                            </a>
                                        </button>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                <?= $_SESSION['user']['username'] ?>
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                <?=
                                $address;
                                ?>
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                <?=
                                $job;
                                ?>
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                                <?=
                                $study_category;
                                ?>
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                        <?=
                                        $bio;
                                        ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <!-- Footer -->
    <footer class=" border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
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

<script src="../assets/js/profile-photo.js"></script>

</html>