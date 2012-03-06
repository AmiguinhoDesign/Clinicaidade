
jQuery(document).ready(function($){ 
    $(".header_menu_names").hover(
        function () {
             var class_name = $(this).attr('class');
            class_name = class_name.split(' ');
            if(class_name[1] != "header_big_menu_link"){
                $(".header_big_menu").slideUp();
                $(".header_menu_names").parent('li').children('.header_menu_barra').css("visibility","hidden");
            }
            $(this).parent('li').children('.header_menu_barra').css("visibility","visible");
        },
        function () {
            var class_name = $(this).attr('class');
            class_name = class_name.split(' ');
            if(class_name[1] != "header_big_menu_link"){
                 $(this).parent('li').children('.header_menu_barra').css("visibility","hidden");
            }
           
        }
        );
    $(".header_menu_names").click(
        function () {
            $('.header_menu_barra').css('visibility','hidden');
            $(this).parent('li').children('.header_menu_barra').css("visibility","visible");
        }
    
        );
    $('.slider_news').bxSlider({
        prevImage: "http://amiguinhodesign.com/clinicaidade/img/green_next.png",
        nextImage: "http://amiguinhodesign.com/clinicaidade/img/green_next.png"
    });
    $(".icon_field_icon").click(
        function () {

            $('.icon_field_contacto').removeClass('icon_field_contacto_active');
            $('.icon_field_medico').removeClass('icon_field_medico_active');
            $('.icon_field_consulta').removeClass('icon_field_consulta_active');
            $('.icon_field_especialidades').removeClass('icon_field_especialidades_active');
            $('.icon_field_acordos').removeClass('icon_field_acordos_active');
            
            var class_name = $(this).attr('class');
            class_name = class_name.split(' ');
            var teste = class_name[1].split('_');
       
            if(teste[3] != "active"){
               
                var my_newclass = class_name[1] + "_active";
                //$(this).removeClass(class_name[1]);
                $(this).addClass(my_newclass);
            }
        }
      
        );

    $(".header_big_menu_link").hover(
        function () {
            $(".header_big_menu").slideDown();
        },
        function () {
           
        }
        );
    $(".header_big_menu").hover(
        function () {
           
        },
        function () {
            $(".header_big_menu").slideUp();
             $(".header_menu_names").parent('li').children('.header_menu_barra').css("visibility","hidden");
        }
        );  
    
            
});