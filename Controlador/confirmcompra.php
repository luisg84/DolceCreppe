<?php
session_start();
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

$nume=$_POST['clien-number'];

if($nume=='notlog'){
   $nameClien=$_POST['clien-name'];
   $passClien=$_POST['clien-pass'];
}
if($nume=='log'){
   $nameClien=$_POST['clien-name'];
   $passClien=$_POST['clien-pass'];
}


$verdata=  ejecutarSQL::consultar("select * from cliente where Clave='".$passClien."' and Nombre='".$nameClien."'");
$num=  mysql_num_rows($verdata);
if($num>0){
  if($_SESSION['sumaTotal']>0){


  $data= mysql_fetch_array($verdata);
  $nitC=$data['ID_usu'];
  $StatusV="Pendiente";

  /*Insertando datos en tabla venta*/
  consultasSQL::InsertSQL("venta", "Fecha, NIT, Descuento, TotalPagar, Estado", "'".date('d-m-Y')."','".$nitC."','0','".$_SESSION['sumaTotal']."','".$StatusV."'");

  /*recuperando el número del pedido actual*/
  $verId=ejecutarSQL::consultar("select * from venta where NIT='$nitC' order by NumPedido desc limit 1");
  while($fila=mysql_fetch_array($verId)){
     $Numpedido=$fila['NumPedido'];
  }

  /*Insertando datos en detalle de la venta*/
  for($i = 0;$i< $_SESSION['contador'];$i++){
      consultasSQL::InsertSQL("detalle", "NumPedido, CodigoProd, CantidadProductos", "'$Numpedido', '".$_SESSION['producto'][$i]."', '1'");


  }

    /*Vaciando el carrito*/
    unset($_SESSION['producto']);
    unset($_SESSION['contador']);

    Sleep(2);


echo'<img src="assets/img/ok.png" class="center-all-contens"><br><p>Compra Efectuada</p>';

echo'  <script>
      setTimeout(function(){
      url ="pedido.php";
      $(location).attr("href",url);
    },1000);
  </script>
  ';

  }else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>No has seleccionado ningún producto, revisa el carrito de compras';
  }

}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre o contraseña invalidos';
}
