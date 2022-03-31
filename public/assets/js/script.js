$(document).ready(function(){

    $("#image").on("change", function(event){  
        loadFile(event);
    });

    $('.makeContact').on("click",function(e){
        var texto = 'Olá Lab, gostaria de solicitar um orçamento.';
        window.open("https://api.whatsapp.com/send?phone=+554192872712" + "&text=" + texto, "_blank");
        e.preventDefault();
    });
    
    const title = document.title;
    
    $('.pageScroll').on("click",function(e){
        const links = [
            'about',
            'blog',
            'services'
        ];
        if(title == 'Lab - Artigo' || title == 'Lab - Contato'){
            const link = $(this).attr('aria-label');
            const uri = $('meta[name=URL_BASE]').attr('content');
            links.forEach(key => {
                if(key == link){
                    window.location.href = uri+'#'+key;
                }
            });
            
        }
    });
    
    

    
})

function loadFile(event){
    const img = document.getElementById("show-image");
    img.src = URL.createObjectURL(event.target.files[0]);
};