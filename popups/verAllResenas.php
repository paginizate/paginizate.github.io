<?php
include "../conexion.php";
 
 

?>

<div class="verAllResenas_content">
        <i onclick="ocultarVerAllResena()" id="closePopupResenaVis" class="fa-solid fa-xmark"></i>            
        <header>
                <div class="logoVerAllResena">
                        <img src="img/logo.png" alt="">
                </div>
        </header>
        <hr class="header">
        <div class="contenidoVerAllResena">
                <?php 
                
                $sqlVerAllResenas = "SELECT * FROM resenas ORDER BY id DESC";
                $resultVerAllResenas = mysqli_query($conexion,$sqlVerAllResenas);
                while($VerAllResenas = mysqli_fetch_array($resultVerAllResenas)){
                
                        $calificacionVerAllResenas=$VerAllResenas['calificacion'];
                        switch($calificacionVerAllResenas){
                        case 0:
                                $calificacionVerAllResenas="★★★★★";
                                break;
                        case 1:
                                $calificacionVerAllResenas="<span style='color:yellow'>★</span>★★★★";
                                break;
                        case 2:
                                $calificacionVerAllResenas="<span style='color:yellow'>★★</span>★★★";
                                break;
                        case 3:
                                $calificacionVerAllResenas="<span style='color:yellow'>★★★</span>★★";
                                break;
                        case 4:
                                $calificacionVerAllResenas="<span style='color:yellow'>★★★★</span>★";
                                break;
                        case 5:
                                $calificacionVerAllResenas="<span style='color:yellow'>★★★★★</span>";
                                break;
                        }
                
                ?>
                <div class="resenaContent">
                        <div class="nombreVerAllResena">
                                <h1><?php echo $VerAllResenas['nombre'] ?></h1>
                                <p><?php echo $VerAllResenas['fecha'] ?> | <?php echo $VerAllResenas['hora'] ?></p>
                        </div>
                        <div class="starsResena">
                                <h3 class="starsPopup"><?php echo $calificacionVerAllResenas ?></h3>
                        </div>
                        <hr class="contenidoResena">
                        <div class="resenaContainer">
                                <p><?php echo $VerAllResenas['comentario'] ?></p>
                        </div>
                </div>
                <?php
                } 
                ?>
                <div class="nohaymas">
                        <h2>HAS LLEGADO AL FINAL, A PARTIR DE AQUI NO HAY MAS RESEÑAS</h2>
                        <div class="imgFinalResena">
                                <img src="img/caratriste.png" alt="">
                        </div>
                </div>
        </div>
</div>


 
