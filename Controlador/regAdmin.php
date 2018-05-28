<?php
session_start();
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

sleep(2);
$nameAdmin= $_POST['admin-name'];
$passAdmin= ($_POST['admin-pass']);

if(!$nameAdmin=="" && !$passAdmin==""){
    $verificar=  ejecutarSQL::consultar("select * from administrador where Nombre='".$nameAdmin."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("administrador", "Nombre, Clave", "'$nameAdmin','$passAdmin'")){
            echo '<img src="./assets/img/correctofull.png" class="center-all-contens">
            <br>
            <h4>El Administrador se agrego con exito</h4>
            
                La pagina se recargara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                <a href="./configAdmin.php" class="btn btn-primary btn-lg">Recargar Pagina</a>
            </h4>
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
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre que ha ingresado ya existe.<br>Por favor ingrese otro nombre</p>';
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
