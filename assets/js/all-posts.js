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



    // Wait for the document to be fully loaded
    $(document).ready(function () {
        // Check if there's a 'topic' parameter in the URL on page load
        var urlParams = new URLSearchParams(window.location.search);
        var topicParam = urlParams.get('topic');

        // If 'topic' parameter exists, set the value of the dropdown menu to it
        if (topicParam) {
            $('#post-topic').val(topicParam);
        }

        // Listen for changes in the dropdown menu
        $('#post-topic').change(function () {
            // Get the selected topic from the dropdown menu
            var selectedTopic = $(this).val();

            // If 'All' is selected, redirect to the page displaying all posts
            if (selectedTopic === 'All') {
                window.location.href = 'view.all_posts.php';
            } else {
                // Redirect to the posts page with the selected topic as a query parameter
                window.location.href = 'view.all_posts.php?topic=' + selectedTopic;
            }
        });
    });


   
