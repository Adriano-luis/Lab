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
            'services'
        ];
        if(title == 'Lab. Digital Marketing - Artigo' || title == 'Lab. Digital Marketing - Contato'){
            const link = $(this).attr('aria-label');
            const uri = $('meta[name=URL_BASE]').attr('content');
            links.forEach(key => {
                if(key == link){
                    window.location.href = uri+'#'+key;
                }
            });
            
        }
    });
    const pagina = document.getElementById("blogs").offsetWidth;
    
    if(pagina <= 473){
        tamanho = document.getElementById("blogs-main").offsetHeight;
        altura = tamanho + 800;

        document.getElementById("blogs-main").style.marginBottom = altura+'px';
    }
    
})

function loadFile(event){
    const img = document.getElementById("show-image");
    img.src = URL.createObjectURL(event.target.files[0]);
};

function toggleMenu() {

    const submenu = document.getElementById("submenu");

    if (submenu.style.display == 'none' || submenu.style.display == '') {
        submenu.style.display = "flex";
    } else {
        submenu.style.display = "none";
    }

}