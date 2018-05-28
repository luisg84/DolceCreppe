<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/logo.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jbootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/autohidingnavbar.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/carrito.js"></script>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>

<div id="wrapper">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
          <li class="sidebar-brand">
              <a href="#">
                  Dolce Crepe
              </a>
          </li>
          <li>
              <a href="https://www.facebook.com/pg/DolceCreppe/photos">  <i class="fa fa-facebook-square"></i>&nbsp;Fotos</a>
          </li>
          <li>
              <a href="#"></a>
          </li>

          <li>
              <a href="https://www.google.com.mx/maps/place/Dolce+Crepe/@18.5380528,-96.6057615,15z/data=!4m2!3m1!1s0x0:0x365c229a431777ca?sa=X&ved=0ahUKEwj7yILv_p_bAhUyjK0KHbnbDEsQ_BIIdzAQ"> <i class="fa fa-map-marker"></i> &nbsp;Ubicacion</a>
          </li>
      </ul>
  </div>
  <!-- /#sidebar-wrapper -->



<div id="page-content-wrapper">

    <div class="jumbotron" id="jumbotron-index">
    <h4> <a href="#" class="white-color" id="menu-toggle"><span class="glyphicon glyphicon-th-list"></span>&nbsp;Mas</a></h4>
    </div>
    <section id="new-prod-index">

         <div class="container">
            <div class="page-header">

                <h1>Nuevos <small>productos</small></h1>
            </div>
            <div class="row">
              <?php
                  include 'acceso_datos/configServer.php';
                  include 'acceso_datos/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("select * from producto where CodigoProd > 0 order by CodigoProd desc limit 4");
                  $totalproductos = mysql_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysql_fetch_array($consulta)){
                         echo '
                        <div class="col-xs-12 col-sm-6 col-md-3">
                             <div class="thumbnail">
                               <img src="assets/img-products/'.$fila['Imagen'].'"height="200" width="200">
                               <div class="caption">
                                 <h3>'.$fila['NombreProd'].'</h3>
                                 <p>$'.$fila['Precio'].'</p>
                                 <p class="text-center">
                                     <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                     <button value="'.$fila['CodigoProd'].'" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Agregar</button>
                                 </p>

                               </div>
                             </div>
                         </div>
                         ';
                     }
                  }else{
                      echo '<h2>No hay productos registrados en la tienda</h2>';
                  }
              ?>
            </div>
         </div>
    </section>

    <section id="distribuidores-index" class="img-promo">
      <img src="assets/img/frappe.jpg" alt="logos-marcas" class="img-responsive">
      <img src="assets/img/alitas.jpg" alt="logos-marcas" class="img-responsive">


    </section>

    <section id="reg-info-index" class="reg-frap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                   <article style="margin-top:20%;" >
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>Registrate</h3>
                        <p>Registrese y disfruta del menu <span class="tittles-pages-logo">Solo en Dolce Crepe</span> Aqui podras recibir las mejores ofertas y descuentos especiales de nuestros productos.</p>
                        <p><a href="registration.php" class="btn btn-info btn-block">Registrarse</a></p>

                   </article>
                </div>
                <div class="col-xs-12 col-sm-6"  >
                    <img src="assets/img/Frappe.png" alt="Smart-TV" class="img-responsive">
                </div>
            </div>
        </div>
    </section>

</div>
</div>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
    <?php include './inc/footer.php'; ?>
</body>
</html>
