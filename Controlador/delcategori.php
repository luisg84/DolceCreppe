<?php
session_start();
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

sleep(2);
$codeCateg= $_POST['categ-code'];
$cons=  ejecutarSQL::ConCat("'$codeCateg'");
$totalcateg = mysql_num_rows($cons);

if($totalcateg>0){
    if(consultasSQL::EliCat("CodigoCat='".$codeCateg."'")){
        echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Categoria eliminada exitosamente</p>
        <p class="text-center">
            Recargando<br>
            en 2 segundos
        </p>
        <script>
            setTimeout(function(){
            url ="configAdmin.php";
            $(location).attr("href",url);
          },2000);
        </script>
        ';
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de la categoria no existe</p>';
}
