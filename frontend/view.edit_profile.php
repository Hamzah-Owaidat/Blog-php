<?php 

include("../backend/edit_profile.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-white dark:bg-gray-200 w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
        <aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
            <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 top-12">

                <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>

                <a href="#"
                    class="flex items-center px-3 py-2.5 font-bold bg-white  text-indigo-900 border rounded-full">
                    Pubic Profile
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2.5 font-semibold  hover:text-indigo-900 hover:border hover:rounded-full">
                    Account Settings
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full  ">
                    Notifications
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full  ">
                    PRO Account
                </a>
            </div>
        </aside>
        <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">
            <div class="p-2 md:p-4">
                <div class="w-full px-6 pb-6 mt-12 sm:max-w-xl sm:rounded-lg">
                    <h2 class="pl-6 text-2xl font-bold sm:text-xl">Public Profile</h2>

                    <form class="grid max-w-2xl mx-auto " method="post" action="">

                        <div class="items-center  sm:mt-14 text-[#202142]">

                            <!-- ADDRESS -->
                            <div class="mb-2 sm:mb-6">
                                <label for="address"
                                    class="block mb-2 text-lg font-medium text-indigo-900">Address</label>
                                <input type="text" id="address" name="address"
                                    class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg block w-full p-2.5 "
                                    placeholder="your address">
                            </div>

                            <!-- JOB -->
                            <div class="mb-2 sm:mb-6">
                                <label for="job" class="block mb-2 text-lg font-medium text-indigo-900">Job</label>
                                <input type="text" id="job" name="job"
                                    class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg block w-full p-2.5 "
                                    placeholder="your job">
                            </div>

                            <!-- STUDY CATEGORY -->
                            <div class="mb-2 sm:mb-6">
                                <label for="study_category" class="block mb-2 text-lg font-medium text-indigo-900">Study
                                    Category</label>
                                <input type="text" id="study_category" name="study_category"
                                    class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg block w-full p-2.5 "
                                    placeholder="your study category">
                            </div>

                            <!-- BIO -->
                            <div class="mb-6">
                                <label for="bio" class="block mb-2 text-lg font-medium text-indigo-900">Bio</label>
                                <textarea id="bio" rows="4" name="bio"
                                    class="block p-2.5 w-full text-sm text-indigo-900 bg-indigo-50 rounded-lg border border-indigo-300"
                                    placeholder="Write your bio here..."></textarea>
                            </div>

                            <!-- BACK WITHOUT SAVE -->
                            <div class="flex justify-between">
                                <button
                                    class="text-white bg-blue-600  hover:bg-indigo-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600">
                                    <a href="view.profile.php">
                                        Exit
                                    </a>
                                </button>

                                <!-- SUBMIT AND SAVE INFORMATION -->
                                <button type="submit" name="submit"
                                    class="text-white bg-blue-600  hover:bg-indigo-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600">
                                    Save
                                </button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<!-- tailwind -->
<script src="https://cdn.tailwindcss.com"></script>


<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>