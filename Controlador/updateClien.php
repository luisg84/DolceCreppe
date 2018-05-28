<?php
include '../acceso_datos/configServer.php';
include '../acceso_datos/consulSQL.php';

sleep(3);
$nitCliente= $_POST['clien-nit'];
$nameCliente= $_POST['clien-name'];
$fullnameCliente= $_POST['clien-fullname'];
$apeCliente= $_POST['clien-lastname'];
//md5 Devuelve el hash como un número hexadecimal de 32 caracteres.
$passCliente=($_POST['clien-pass']);
$dirCliente= $_POST['clien-dir'];
$phoneCliente= $_POST['clien-phone'];
$emailCliente= $_POST['clien-email'];

if(!$nitCliente=="" && !$nameCliente=="" && !$apeCliente=="" && !$dirCliente=="" && !$phoneCliente=="" && !$emailCliente=="" && !$fullnameCliente==""){
    $verificar=  ejecutarSQL::consultar("select * from cliente where ID_usu='".$nitCliente."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=1){


        if(consultasSQL::UpdateSQL("cliente", "Nombre='$nameCliente',NombreCompleto='$fullnameCliente',Apellido='$apeCliente',Clave='$passCliente',Direccion='$dirCliente',Telefono='$phoneCliente',Email='$emailCliente'" ,"ID_usu='$nitCliente'")){
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
        }else{
           echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente';
        }
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>El ID de usuario que ha ingresado ya esta registrado.<br>Por favor recarge para generar uno nuevo';
    }
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error los campos no deben de estar vacíos';
}
