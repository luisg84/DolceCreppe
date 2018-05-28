





<?php
include './acceso_datos/configServer.php';
include './acceso_datos/consulSQL.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Actualizar Imagen</title>
    <?php include './inc/link.php'; ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php include './inc/navbar.php'; ?>
<?php
$CodigoProducto=$_GET['CodigoProd'];
$prod=mysql_fetch_array(ejecutarSQL::consultar("select * from producto where CodigoProd='".$CodigoProducto."'"));
$urlimg= "assets/img-products/".$prod['Imagen'];

echo'<div  style="margin-top:7%;"></div><center><img class="img-responsive" src="'.$urlimg.'" height="250" width="250">

  <form role="form" action="Controlador/updateImg.php" method="post" enctype="multipart/form-data">



  <div class="form-group">
    <input type="hidden" class="form-control" name="prod-codigo"  value="'.$CodigoProducto.'">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" name="prod-url" value="'.$prod['Imagen'].'">
  </div>



  <div class="form-group">
    <label>Imagen de producto '.$prod['NombreProd'].'</label>
    <input type="file" name="img">
    <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
  </div>



<p class="text-center"><button type="submit" class="btn btn-primary">Actualizar  imagen</button></p>
<div style="margin-bottom:25px;"><a href="configAdmin.php" class="btn  btn-primary text-center">  <i class="fa fa-mail-reply"></i>  &nbsp;&nbsp;Regresar a Administracion</a> &nbsp;&nbsp;&nbsp;</div>
</center>
</form>

';

     ?>
  <?php include './inc/footer.php'; ?>
  </body>
</html>
