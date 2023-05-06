<?php
include "../conexion.php";
 
$userid = $_POST['userid'];
 
$sqlVerResena = "SELECT * FROM resenas WHERE id=".$userid;
$resultVerResena = mysqli_query($conexion,$sqlVerResena);
while($ResenaPopup = mysqli_fetch_array($resultVerResena)){

        $calificacionPopup=$ResenaPopup['calificacion'];
        switch($calificacionPopup){
        case 0:
                $calificacionPopup="★★★★★";
                break;
        case 1:
                $calificacionPopup="<span style='color:yellow'>★</span>★★★★";
                break;
        case 2:
                $calificacionPopup="<span style='color:yellow'>★★</span>★★★";
                break;
        case 3:
                $calificacionPopup="<span style='color:yellow'>★★★</span>★★";
                break;
        case 4:
                $calificacionPopup="<span style='color:yellow'>★★★★</span>★";
                break;
        case 5:
                $calificacionPopup="<span style='color:yellow'>★★★★★</span>";
                break;
        }
?>

<div class="popupresenavisContent">
        <i onclick="ocultarPopupVerResena()" id="closePopupResenaVis" class="fa-solid fa-xmark"></i>       
        <div class="nombreResenaPopup">
                <h2><?php echo $ResenaPopup['nombre'] ?></h2>
                <p><?php echo $ResenaPopup['fecha'] ?></p>
        </div>
        <div class="starsResena">
                <h2 id="starsPopup"><?php echo $calificacionPopup ?></h2>
        </div>
        <hr class="hrResenaPopup">
        <div class="comentarioPopupResena">
                <!-- <h3>Comentario</h3> -->
                <div class="textoResenaPopup">
                        <p><?php echo $ResenaPopup['comentario'] ?></p>
                </div>
        </div>
        <div style="display:none"  class="nogustoPopupResena">
                <h3>¿Algo que no te gusto?</h3>
                <div class="nogustaPopup">
                        <p><?php echo $ResenaPopup['nogusto'] ?></p>
                </div>
        </div>
        <div class="galeriaPopupResena">
                <!-- <h3>Fotillos</h3> -->
                <div class="imgResenaPopup">
                        <?php 
                                $sqlResenaImg = "SELECT ruta FROM galeria WHERE id_resena=". $userid;
                                $resultadoResenaImg = mysqli_query($conexion,$sqlResenaImg);
                                while($imgResenaPopup = mysqli_fetch_array($resultadoResenaImg)){
                        ?>
                        <div class="imgsPopup">
                                <img class="imgResena" data-id="<?php echo $ResenaPopup['id'] ?>" id="imgResena" src="../img/galeriaComidas/<?php echo $imgResenaPopup['ruta']; ?>" alt="">
                        </div>
                        <?php } ?>
                </div>
        </div>
</div>


 
<?php
} 
?>