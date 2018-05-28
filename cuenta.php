<?php
include './acceso_datos/configServer.php';
include './acceso_datos/consulSQL.php';
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>

<?php

$usuario=  ejecutarSQL::consultar("select * from cliente where Clave='".$_SESSION['claveUser']."'");
$user=mysql_fetch_array($usuario);

echo '
<section id="form-registration">
    <div class="container">
        <div class="row">

    <div class="col-xs-12 col-sm-6 text-center" id="actua">
              <h1 class="white-color">Actualiza tus datos</h1>
               <br><br><br><br><br><br><br><br><br><br><br>
                <p><i class="fa fa-users fa-5x white-color"></i></p>
                <p class="lead white-color">
                  Puedes actualizar tus datos en el formulario de la derecha
                  Apareceran todos tus datos
                </p>


            </div>
            <div class="col-xs-12 col-sm-6" id="actua">
               <br><br>
<div id="container-form">
   <p style="color:#fff;" class="text-center lead">Ingrese la Nueva informacion</p>
   <br><br>
   <form class="form-horizontal FormCatElec" action="Controlador/updateClien.php" role="form" method="post" data-form="save">
       <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
            <input class="form-control all-elements-tooltip" type="hidden" required name="clien-nit" data-toggle="tooltip" data-placement="top" value="'.$user['ID_usu'].'">
            <input class="form-control all-elements-toolti" type="text"  data-toggle="tooltip" data-placement="top" title="Este es su ID" value="'.$user['ID_usu'].'" disabled>
          </div>

        </div>
        <br>
        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control all-elements-tooltip" type="text" required name="clien-name" data-toggle="tooltip" data-placement="top" title="Actualice su nombre. Máximo 9 caracteres (solamente letras)" pattern="[a-zA-Z]{1,9}" maxlength="9" value="'.$user['Nombre'].'">
          </div>

        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control all-elements-tooltip" type="text"  required name="clien-fullname" data-toggle="tooltip" data-placement="top" title="Ingrese sus nombres.(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50" value="'.$user['NombreCompleto'].'">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user" ></i></div>
            <input class="form-control all-elements-tooltip" type="text"  required name="clien-lastname" data-toggle="tooltip" data-placement="top" title="Ingrese sus apellido(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50" value="'.$user['Apellido'].'">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
            <input class="form-control all-elements-tooltip" type="password" required name="clien-pass" data-toggle="tooltip" data-placement="top" title="Cambia tu contraseña" value="'.$user['Clave'].'">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-home"></i></div>
            <input class="form-control all-elements-tooltip" type="text" required name="clien-dir" data-toggle="tooltip" data-placement="top" title="Ingrese la direción en la reside actualmente" maxlength="100" value="'.$user['Direccion'].'">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
            <input class="form-control all-elements-tooltip" type="tel" required name="clien-phone" maxlength="11" pattern="[0-9]{8,11}" data-toggle="tooltip" data-placement="top" title="Ingrese su número telefónico. Mínimo 8 digitos máximo 11" value="'.$user['Telefono'].'">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-at"></i></div>
            <input class="form-control all-elements-tooltip" type="email"  required name="clien-email" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección de su Email" maxlength="50" value="'.$user['Email'].'">
          </div>
        </div>
        <br>
        <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Actualizar Datos</button></p>
        <div class="ResForm" style="width: 100%; color: #fff; text-align: center; margin: 0;"></div>
    </form>
</div>
</div>
</div>
</div>
</section>
';


 ?>


    <?php include './inc/footer.php'; ?>
</body>
</html>
