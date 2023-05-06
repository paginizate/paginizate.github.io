<?php
include "../conexion.php";
?>

<div class="popup_galeriaContent">
        <div class="closePopupIMG">
                <span onclick="minimizarIMG()" id="closePopupIMG"class="material-symbols-outlined">close</span>
        </div>
        <div id="centrarVerticalPopupImg" class="centrarVerticalPopupImg">
                <?php 
                $idIMG = $_POST['idIMG'];
                $sqlPopupIMG="SELECT * FROM galeria WHERE id=". $idIMG;
                $resultadoPopupIMG=mysqli_query($conexion,$sqlPopupIMG);
                while($mostrarIMGPopUp=mysqli_fetch_array($resultadoPopupIMG)){
                ?>
                <div class="popupIMG">
                        <img src="../img/galeriaComidas/<?php echo $mostrarIMGPopUp['ruta'] ?>" alt="">
                </div>
                <?php
                } ?>
        </div>
        <!-- <div class="pasarizquierdaIMG">
                <span class="material-symbols-outlined">chevron_left</span>
        </div>
        <div class="pasarderechaIMG">
                <span class="material-symbols-outlined">chevron_right</span>
        </div> -->
</div>