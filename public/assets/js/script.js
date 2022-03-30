$(document).ready(function(){

    $("#image").on("change", function(event){  
        loadFile(event);
    });

    $('.makeContact').on("click",function(e){
        var texto = 'Olá Lab, gostaria de solicitar um orçamento.';
        window.open("https://api.whatsapp.com/send?phone=+554192872712" + "&text=" + texto, "_blank");
        e.preventDefault();
    });
})

function loadFile(event){
    const img = document.getElementById("show-image");
    img.src = URL.createObjectURL(event.target.files[0]);
};