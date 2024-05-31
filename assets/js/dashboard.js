let file = document.getElementById("post-image-input");
let selectImg = document.getElementById("post-image-btn");
let imgSlot = document.getElementById("preview-image");

// Add an event listener to the element with id 'post-image-btn' for the click event
selectImg.addEventListener('click', function (event) {
    // Prevent the default action of the click event (e.g., form submission or link redirection)
    event.preventDefault();

    // Simulate a click event on the element with id 'post-image-input'
    // This will trigger the file input dialog for selecting an image
    file.click();
});

// See image before submit
file.addEventListener('change', ()=>{
    const chooseFile = file.files[0];
    if(chooseFile){
        const reader = new FileReader();
        reader.addEventListener('load', ()=>{
            imgSlot.setAttribute('src', reader.result);
            submit.click();
        })
        reader.readAsDataURL(chooseFile);
    }
})