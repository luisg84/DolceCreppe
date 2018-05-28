<?php
session_start();
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

sleep(2);
$nameAd= $_POST['name-admin'];
$consA=  ejecutarSQL::consultar("select * from administrador where Nombre='$nameAd'");
$totalA = mysql_num_rows($consA);

if($totalA>0){
    if(consultasSQL::DeleteSQL('administrador', "Nombre='".$nameAd."'")){
      echo '<img src="./assets/img/correctofull.png" class="center-all-contens">
      <br>
      <h4>El Administrador se Elimino con exito</h4>
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
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre del administrador no existe</p>';
}
