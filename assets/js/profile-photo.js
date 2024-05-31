const imgDiv = document.querySelector('.user-img');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');
const submit = document.getElementById('submit');

file.addEventListener('change', ()=>{
    const chooseFile = file.files[0];
    if(chooseFile){
        const reader = new FileReader();
        reader.addEventListener('load', ()=>{
            img.setAttribute('src', reader.result);
            submit.click();
        })
        reader.readAsDataURL(chooseFile);
    }
})
