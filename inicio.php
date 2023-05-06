<?php 

//CONECTAMOS CON LA DDBB
require_once "conexion.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2 Fase Restaurante | El Viso | Menus de calidad</title>
        <!-- LINK ICONO WEB -->
        <link rel="shortcut icon" href="img/logo_blanco.ico" type="image/x-icon">
        <!-- LINK CSS -->
        <link rel="stylesheet" href="css/inicio.css">

        <!-- LINK FUENTE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- LINK FONTAWESOME -->
        <script src="https://kit.fontawesome.com/9922a444e5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- LINK JS -->
        <script src="js/inicio.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <script>
                $(document).ready(function(){
                        // ABRIR RESEÑA PARA VERLA GRANDE
                        $('.resena').click(function(){
                        var userid = $(this).data('id');
                        $.ajax({
                                url: 'popups/obtenerDatosResena.php',
                                type: 'post',
                                data: {userid: userid},
                                success: function(response){ 
                                        $('.popupresenavis').css({
                                                'display': 'flex',
                                                'justify-content': 'center',
                                                'align-items': 'center'
                                        });
                                        $('.popupresenavis').html(response); 

                                }
                                });
                        });
                        //     ABRIR IMG PARA VERLA EN GRANDE

                        $('.imgGaleria').click(function(){
                                var idIMG = $(this).data('id');
                                var navbar = document.querySelector('.nav_container');
                                var imgLogo = document.querySelector('.img_nav');
                                $.ajax({
                                url: 'popups/VisualizarIMG.php',
                                type: 'post',
                                data: {idIMG: idIMG},
                                success: function(response){ 
                                        $('.popup_galeria').css('display', 'block');
                                        $('.popup_galeria').html(response); 
                                        $.getScript('js/inicio.js', function() {
                                                imgLogo.classList.remove('sticky');
                                                navbar.classList.remove('sticky');

                                        });
                                        
                                }
                            });
                        });
                        // VER TODAS LAS RESEÑAS
                        $('.verAllResenas').click(function(){
                        $.ajax({
                                url: 'popups/verAllResenas.php',
                                type: 'post',
                                data: '',
                                success: function(response){ 
                                        $('.verAllResenas_Container').css({
                                                'display': 'block'
                                                // 'justify-content': 'center',
                                                // 'align-items': 'center'
                                        });
                                        $('.verAllResenas_Container').html(response); 

                                }
                                });
                        });
                        
                });

        </script>

</head>
<body>
        <div class="contenedor_info">
                <a class="tlf" href="tel:+34630592491"><i class="fa-solid fa-phone fa-rotate-270"></i> +34 630 59 24 91</a>
                <a href="https://goo.gl/maps/9AN17zVW53kVEZMC6"><i class="fa-solid fa-location-dot"></i> Av. de los Vegas, 6, 29006 Malaga</a>
        </div>

        <div class="nav_container">
                <div class="nav_content">
                        <div class="imgNavContainer">
                                <i onclick="mostrarNAV()" id="menuICON" class="fa-solid fa-bars"></i>

                                <div class="img_nav">
                                        <a href="inicio.php"><img src="img/logo.png" alt=""></a>
                                </div>
                        </div>
                        <nav class="nav">
                                <div class="options_nav">
                                        <a class="navA" href="inicio.php">INICIO</a>
                                        <a class="navA" href="galeria.php">GALERIA</a>
                                        <a class="navA" href="about.html">ABOUT US</a>
                                </div>
                        </nav>
                </div>
        </div>
        <div class="contenedor_Principal">
                <!-- MENU DIA -->
                <?php
                
                $sql = "SELECT * FROM menudia ORDER BY id DESC LIMIT 1";
                $resultado = mysqli_query($conexion, $sql);

                while($mostrar=mysqli_fetch_array($resultado)){

                ?>
                <div id="menuDia"class="menuDia_container">
                        <div class="titleMenuDia">
                                <h1><span>MENU DEL DIA</span></h1>
                        </div>
                        <div class="fechaMenuDia">
                                <h4>(<?php echo $mostrar['fecha']?>)</h4>
                        </div>
                        <div class="preciosMenu_container">
                                <h4>MENU NORMAL: 12€</h4>
                                <h4>PLATO UNICO: 9€</h4>
                                <h4>MENU EJECUTIVO: 18€</h4>
                                <h4>PLATO EJECUTIVO: 15€</h4>
                        </div>
                        <div class="categ_container">
                                <div class="categ1">
                                        <div class="categ_cont">
                                                <h2>PRIMEROS</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['primeros'])?></h4>
                                        </div>
                                        <div class="categ_cont">
                                                <h2>SEGUNDOS</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['segundos'])?></h4>
                                        </div>
                                        <div class="categ_cont">
                                                <h2>PARRILLA</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['parrilla'])?></h4>
                                        </div>
                                </div>
                                <div class="categ1">
                                        <div class="categ_cont">
                                                <h2>MENU EJECUTIVO</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['menuejecutivo'])?></h4>
                                        </div>
                                        <div class="categ_cont">
                                                <h2>GUARNICIONES</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['guarniciones'])?></h4>
                                        </div>
                                        <div class="categ_cont">
                                                <h2>POSTRES</h2>
                                                <h4 class="contenido_categ"><?php echo nl2br($mostrar['postres'])?></h4>
                                        </div>
                                </div>
                        </div>                     
                </div>
                <?php }?>
                <!-- FIN MENUDIA -->

                <!-- GALERIA -->
                <div class="galeria_containter">
                        <div class="title_gal">
                                <h1><span>GALERIA</span></h1>
                        </div>

                        <div class="galeria">
                                <!-- PHP PARA GALERIA -->
                                <?php  
                                $sqlGaleria = "SELECT * FROM galeria ORDER BY id DESC LIMIT 6";
                                $resultadoGaleria = mysqli_query($conexion, $sqlGaleria);

                                while($mostrarRuta=mysqli_fetch_array($resultadoGaleria)){
                                ?>
                                <div class="contIMGgal">
                                        <img data-id="<?php echo $mostrarRuta['id'] ?>" class="imgGaleria" src="../img/galeriaComidas/<?php echo $mostrarRuta['ruta']; ?>" alt="">
                                </div>
                                <?php } ?>
                                <!-- FIN PHP GALERIA -->
                        </div>
                        <div class="btn_verGal">
                                <button><a href="galeria.php">VER TODA LA GALERIA</a></button>
                        </div>
                </div>

                <div id="popup_galeria" class="popup_galeria">

                </div>
        
                <!-- FIN GALERIA -->

                <hr class="galeriaResena">

                <!-- RESEnAS CONTAINER -->
                <div class="resenasContainer" >
                        <div class="titleResena">
                                <h1>¿Que dicen nuestros clientes sobre nosotros?</h1>
                                <!-- <h3>Todos coinciden en lo mismo</h3> -->
                                <button id="botonPopup" onclick="mostrarPopupPublicarResena()">DEJANOS TU OPINION</button>
                        </div>
                        <div class="carrusel">
                                <?php
                                $sqlResenas="SELECT * FROM resenas ORDER BY id DESC LIMIT 3";
                                $resultadoResena=mysqli_query($conexion, $sqlResenas);

                                while($Resena=mysqli_fetch_array($resultadoResena)){
                                        $calificacion=$Resena['calificacion'];
                                        switch($calificacion){
                                                case 0:
                                                        $calificacion="★★★★★";
                                                        break;
                                                case 1:
                                                        $calificacion="<span style='color:yellow'>★</span>★★★★";
                                                        break;
                                                case 2:
                                                        $calificacion="<span style='color:yellow'>★★</span>★★★";
                                                        break;
                                                case 3:
                                                        $calificacion="<span style='color:yellow'>★★★</span>★★";
                                                        break;
                                                case 4:
                                                        $calificacion="<span style='color:yellow'>★★★★</span>★";
                                                        break;
                                                case 5:
                                                        $calificacion="<span style='color:yellow'>★★★★★</span>";
                                                        break;
                                        }
                                            

                                ?>
                                <div data-id="<?php echo $Resena['id'] ?>" id="<?php echo $Resena['id'] ?>" class="resena">
                                        <div class="nombreResena">
                                                <h2><?php echo $Resena['nombre'] ?></h2>
                                                <p><?php echo $Resena['fecha'];?> | <?php echo $Resena['hora'] ?></p>
                                        </div>
                                        <div class="starsResena">
                                                <h2><?php echo $calificacion ?></h2>
                                        </div>
                                        <hr class="hrResena">
                                        <div class="textoResena">
                                                <p><?php echo $Resena['comentario'] ?></p>
                                        </div>
                                </div>

                                <?php } ?>

                                <!-- POPUP VISUALIZAR RESEÑAS -->
                                <div id="popupresenavis" class="popupresenavis">
                                        
                                </div>
                                <!-- FIN POPUP VISUALIZAR RESEÑAS -->

                        </div>
                        <div class="btnPublicarResena">
                                <button class="verAllResenas" id="verAllResenas">VER TODAS LAS RESEÑAS</button>
                        </div>

                        <!-- POP UP DE PUBLICAR RESEÑA -->
                        <div id="popup" class="publicarResenaContainer">
                                <div class="contenidoPublicarResena">
                                        <div class="logoResena">
                                                <img src="img/logo.png" alt="">
                                        </div>
                                        <hr class="hrPublicarResena">
                                        <form id="resenaForm" action="" onsubmit="return validarFormulario()">
                                                <div>
                                                        <label for="nombreInpResena">Nombre <span class="seraPublico">(Sera publicado)</span></label>
                                                        <input required type="text" name="nombreInpResena" id="">
                                                </div>
                                                <div>
                                                        <label for="correoInpResena">Correo/Numero de contacto</label><br>
                                                        <input required type="text"><br>
                                                </div>
                                                <div>
                                                        <label for="textoInpResena">Comentario <span class="seraPublico">(Sera publicado)</span></label><br>
                                                        <textarea required id="textareapopup" name="textoInpResena" cols="30" rows="10"></textarea><br>
                                                </div>
                                                <div>
                                                        <label for="nogustoInpResena">¿Algo que no te gusto?</label><br>
                                                        <textarea required id="textareapopup" name="nogustoInpResena" cols="30" rows="10"></textarea><br>
                                                </div>
                                                <div class="uploadIMG">
                                                        <input type="file" name="file" id="file" class="inputfile" />
                                                        <label for="file"><i class="fa-solid fa-camera"></i> Añade algunas fotillos</label>
                                                </div>
                                                <div class="stars">
                                                        <h1>¿Que nota nos pones?</h1>
                                                        <div>
                                                                <input type="radio" id="star5" name="rate" value="5" />
                                                                <label for="star5" title="text">★</label>
                                                                <input type="radio" id="star4" name="rate" value="4" />
                                                                <label for="star4" title="text">★</label>
                                                                <input type="radio" id="star3" name="rate" value="3" />
                                                                <label for="star3" title="text">★</label>
                                                                <input type="radio" id="star2" name="rate" value="2" />
                                                                <label for="star2" title="text">★</label>
                                                                <input type="radio" id="star1" name="rate" value="1" />
                                                                <label for="star1" title="text">★</label>
                                                        </div>
                                                </div>
                                                <div class="enviar">
                                                        <button id="cerrarPopup" onclick="ocultarPopupPublicarResena()">Cancelar</button>
                                                        <input type="submit" name="enviar" value="Publicar reseña">
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <!-- FIN POP UP DE PUBLICAR RESEÑA-->
                        <!-- POPUP DE VER TODAS LAS RESEÑAS -->
                        <div id="verAllResenas_Container" class="verAllResenas_Container">

                        </div>
                        <!-- FIN POPUP DE VER TODAS LAS RESEÑAS -->


                </div>
                <!-- FIN RESEnAS -->
        </div>
        <!-- FOOTER -->
        <footer class="footer">
                <div class="contentFooter">
                        <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6397.19430843952!2d-4.484757138604272!3d36.70821722091744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f752632c0039%3A0xf96725393a1ac640!2sCafeter%C3%ADa%20Restaurante%20Segunda%20Fase!5e0!3m2!1ses!2ses!4v1682186618393!5m2!1ses!2ses" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="info">
                                <div class="title">
                                        <h1>2ª Fase Restaurante</h1>
                                </div>
                                <div class="address">
                                        <h3><i class="fa-solid fa-location-dot"></i> Av. de los Vegas, 6, 29006 Málaga</h3>
                                </div>
                                <div class="tlf">
                                        <h3><i class="fa-solid fa-phone fa-rotate-270"></i> <a href="tel:+34952325671">952325671</a></h3>
                                </div>
                                <div class="horario">
                                        <h2>HORARIO</h2>
                                        <h3>LUNES: <span class="abierto">7:00 - 19:00</span> <br>MARTES: <span class="abierto">7:00 - 19:00</span> <br>MIERCOLES: <span class="abierto">7:00 - 19:00</span> <br>JUEVES: <span class="abierto">7:00 - 19:00</span> <br>VIERNES: <span class="abierto">7:00 - 19:00</span> <br>SABADO: <span class="cerrado">Cerrado</span> <br>DOMINGO: <span class="cerrado">Cerrado</span></h3>
                                </div>
                        </div>
                        <div class="logoFooter">
                                <img src="img/logo_blanco.png" alt="">
                        </div>
                </div>
                <!-- <div class="copyright">
                        <p>© 2023. 2ªFase Cafeteria Restaurante. Todos los derechos reservados.</p>
                </div> -->
        </footer>

        <!-- FIN FOOTER -->

        
        <!-- MARCA -->
        <div class="marcaContainer">
                <p>Esta web ha sido disenada y desarrollada por <a href="">Paginizate.com</a></p>
        </div>
        <!-- MARCA -->

        <!-- BOTONES ESTATICOS -->
        <div class="btnGPS">
                <a href="https://goo.gl/maps/9AN17zVW53kVEZMC6" class="iconGPS"><img src="img/gpsicon.png" alt=""></a>
        </div>
        <!-- FIN BOTONES ESTATICOS -->



</body>
<script src="js/inicio.js"></script>
</html>