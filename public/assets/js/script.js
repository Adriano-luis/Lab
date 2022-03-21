$(document).ready(function(){

    $("#image-profile").on("change", function(event){  
        loadFile(event);
    });
})

function loadFile(event){
    const img = document.getElementById("show-image");
    img.src = URL.createObjectURL(event.target.files[0]);
};