//perfil_session_metodo: 16082428385fdbd6969179f
//perfil_footer_metodo: 16082428975fdbd6d1916f2
//perfil_Menu_metodo: 16082441715fdbdbcb9fcd8
$(document).ready(function () {
    //crear menu segun los parametros Api Php
    $.ajax({
        type: "POST",
        url: "../Api.php",
        headers : {
            "Token-Metodo" :"16082441715fdbdbcb9fcd8",
            "Class" : "26e237aa8c43fa41e572589c84e34ba6c621fd6f",
        },
        data : {datos: null},
        success: function (response) {
            // console.log(response);
            let json = JSON.parse(response);
            console.log(json);
            for(id in json["Datos"]){
                if(id!="Logo"){
                    $(".navbar-nav").append('<li class="nav-item">\
                                             <a class="nav-link text-light" href="'+json["Datos"][id]["URL"]+'">'+json["Datos"][id]["Nombre"]+'</a>\
                                             </li>');
                    if(json["Datos"][id]["movil"]!=null){
                        $(".list-unstyled").append('<li class="mb-5">\
                                                <a href="'+json["Datos"][id]["movil"]["URL"]+'" class="display-4 text-light">'+json["Datos"][id]["movil"]["Nombre"]+'</a>\
                                                </li>');
                    }
                }else{
                    $(".navbar-brand").html(json["Datos"][id]["Nombre"]);
                    $(".modal-title").html(json["Datos"]["movil"][id]["Nombre"]);
                }
            };
        }
    });
    //crear footer sgun los parametros el Api Php
    $.ajax({
        type: "POST",
        url: "../Api.php",
        headers : {
            "Token-Metodo" :"16081768015fdad4a1c41f9",
            "Class" : "48943a9d4870736302748d798808b01b5e267e94",
        },
        data : {datos: null},
        success: function (response) {
            // console.log(response);
            let json = JSON.parse(response);
            // console.log(json);
            for(id in json["Datos"]){
                    $('.footer').append(json["Datos"][id]);
            }
        }
    });
    //crear session sgun los parametros el Api Php
      let URL = ['<a href="http://localhost/Proyecto_Final_Curso_PHP_10_12_2020/Vistas/hobbies.html" class="btn btn-primary">Ver mis Hobbies</a>'];
    $.ajax({
        type: "POST",
        url: "../Api.php",
        headers : {
            "Token-Metodo" :"16082428385fdbd6969179f",
            "Class" : "052f5197efab7b4281ea6a54f8e9b8a24b6b2b56",
        },
        data: {URL},
        success: function (response) {
            let json = JSON.parse(response);
                $('.hero-content').append(json["Datos"]["Titulo"]);
                $('.hero-content').append(json["Datos"]["Texto"]);
                $('.hero-content').append(json["Datos"]["Texto2"]);
                $('.hero-content').append(json["Datos"]["Texto3"]);
                $('.hero-content').append(json["Datos"]["Texto4"]);
                $('.hero-content').append(json["Datos"]["Texto5"]);
                
        }
    });
    
});