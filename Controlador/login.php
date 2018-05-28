<?php
    session_start();
    include '../acceso_datos/configServer.php';
    include '../acceso_datos/consulSQL.php';
    sleep(2);
    $nombre=$_POST['nombre-login'];
    //md5 Devuelve el hash como un número hexadecimal de 32 caracteres.
    $clave=($_POST['clave-login']);
    $radio=$_POST['optionsRadios'];
    if(!$nombre==""&&!$clave==""){
        $verUser=ejecutarSQL::ConUser("'$nombre'","'$clave'");
        $verAdmin=ejecutarSQL::ConAdmin("'$nombre'","'$clave'");
        if($radio=="option2"){
            $AdminC=mysql_num_rows($verAdmin);
            if($AdminC>0){
                $_SESSION['nombreAdmin']=$nombre;
                $_SESSION['claveAdmin']=$clave;
                echo '<script> location.href="index.php"; </script>';
            }else{
              echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error nombre o contraseña invalido';
            }
        }
        if($radio=="option1"){
            $UserC=mysql_num_rows($verUser);
            if($UserC>0){
                $_SESSION['nombreUser']=$nombre;
                $_SESSION['claveUser']=$clave;
                echo '<script> location.href="index.php"; </script>';
            }else{
                echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error nombre o contraseña invalido';
            }
        }

    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error campo vacío<br>Intente nuevamente';
    }
