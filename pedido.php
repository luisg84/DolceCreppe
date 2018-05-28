<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pedido</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>

    <section id="container-pedido">

        <div class="container">
            <div class="page-header">
              <h1>Confirmar pedido</h1>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <img class="img-responsive center-all-contens" src="assets/img/logo-dolce.png" style="opacity: .4">

                </div>
                <div class="col-xs-12 col-sm-6">
                    <div id="form-compra">
                        <form action="Controlador/confirmcompra.php" method="post" role="form" class="FormCatElec" data-form="save">
                            <?php
                                if(!$_SESSION['nombreUser']=="" &&!$_SESSION['claveUser']==""){

                                    echo '
                                        <h2 class="text-center">¿Confirmar pedido?</h2>
                                        <p class="text-center">Para confirmar tu pedido presiona el boton confirmar</p>
                                          <input type="hidden" name="clien-name" value="'.$_SESSION['nombreUser'].'">
                                          <input type="hidden" name="clien-pass" value="'.$_SESSION['claveUser'].'">
                                          <input type="hidden"  name="clien-number" value="log">';


                                          include './acceso_datos/configServer.php';
                                          include './acceso_datos/consulSQL.php';
                                          session_start();
                                          $suma = 0;
                                          if(isset($_GET['precio'])){
                                              $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
                                              $_SESSION['contador']++;
                                          }

                                          echo '<table class="table table-bordered">';
                                          for($i = 0;$i< $_SESSION['contador'];$i++){
                                              $consulta=ejecutarSQL::consultar("select * from producto where CodigoProd='".$_SESSION['producto'][$i]."'");
                                              while($fila = mysql_fetch_array($consulta)) {
                                                      echo "<tr><td>".$fila['NombreProd']."</td><td> ".$fila['Precio']."</td></tr>";
                                              $suma += $fila['Precio'];
                                              }
                                          }
                                          echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td></tr>";
                                          echo "</table>";


                                    echo'
                                        <p class="text-center"><button class="btn btn-success" type="submit">Confirmar</button></p>

                                    ';

                                }else{

                                  include './acceso_datos/configServer.php';
                                  include './acceso_datos/consulSQL.php';
                                  session_start();
                                  $suma = 0;
                                  if(isset($_GET['precio'])){
                                      $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
                                      $_SESSION['contador']++;
                                  }

                                  echo '<table class="table table-bordered">';
                                  for($i = 0;$i< $_SESSION['contador'];$i++){
                                      $consulta=ejecutarSQL::consultar("select * from producto where CodigoProd='".$_SESSION['producto'][$i]."'");
                                      while($fila = mysql_fetch_array($consulta)) {
                                              echo "<tr><td>".$fila['NombreProd']."</td><td> ".$fila['Precio']."</td></tr>";
                                      $suma += $fila['Precio'];
                                      }
                                  }
                                  echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td></tr>";
                                  echo "</table>";


                                    echo '
                                        <h3 class="text-center">No has iniciado sesion</h3>
                                      <center>  <p>
                                            Si ya tienes cuenta puedes confirmar tu compra ingresando
                                            tu nombre de usuario y contraseña o registrarte en el link de abajo
                                        </p></center>

                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre" required name="clien-name" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre" pattern="[a-zA-Z]{1,9}" maxlength="9">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                          <input class="form-control all-elements-tooltip" type="password" placeholder="Introdusca su contraseña" required name="clien-pass" data-toggle="tooltip" data-placement="top" title="Introdusca su contraseña">
                                        </div>
                                      </div>
                                      
                                      <input type="hidden"  name="clien-number" value="notlog">
                                      <center><a href="registration.php">Aun no tienes cuenta? Puedes registrarte dando click aqui</a></center><br>
                                      <p class="text-center"><button class="btn btn-success" type="submit">Confirmar</button></p>

                                    ';
                                }
                            ?>
                            <div class="ResForm" style="width: 100%; text-align: center; margin: 0;"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>
</body>
</html>
