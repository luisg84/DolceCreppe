<?php
session_start();
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

//sleep(5);
$codeCateg= $_POST['categ-code'];
$nameCateg= $_POST['categ-name'];
$descripCateg= $_POST['categ-descrip'];

if(!$codeCateg=="" && !$nameCateg=="" && !$descripCateg==""){
    $verificar= ejecutarSQL::ConCat("'$codeCateg'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::RegCat("'$codeCateg','$nameCateg','$descripCateg'")){
            echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">La categoria se agrego exitosamente</p>
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
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El codigo que ha ingresado ya existe.<br>Por favor ingrese otro codigo</p>';
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
