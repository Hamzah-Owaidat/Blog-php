let recentPosts = document.getElementById("recent-posts");
let recentPost = document.querySelectorAll("#recent-post > div");

window.onscroll = () => {
    recentPost.forEach((post) => {
        let postOffset = post.offsetTop - 300;
        if (window.scrollY >= postOffset) {
            post.style.transform = "translateX(0)";
        }
    });
}