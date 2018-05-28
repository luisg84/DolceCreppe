<?php
include './acceso_datos/configServer.php';
include './acceso_datos/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>TIENDA <small class="tittles-pages-logo"></small></h1>
                </div>
                <?php
                    $CodigoProducto=$_GET['CodigoProd'];
                    $productoinfo=  ejecutarSQL::consultar("select * from producto where CodigoProd='".$CodigoProducto."'");
                    while($fila=mysql_fetch_array($productoinfo)){
                        echo '
                            <div class="col-xs-12 col-sm-6">
                                <h3 class="text-center">Informacion de producto</h3>
                                <br><br>
                                <h4><strong>Nombre: </strong>'.$fila['NombreProd'].'</h4><br>
                                <h4><strong>Descripcion: </strong>'.$fila['Modelo'].'</h4><br>
                                <h4><strong>Precio: </strong>$'.$fila['Precio'].'</h4>

                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-responsive" src="assets/img-products/'.$fila['Imagen'].'">
                            </div>
                            <br><br><br>
                            <div class="col-xs-12 text-center">
                                <a href="product.php" class="btn btn-lg btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a> &nbsp;&nbsp;&nbsp;
                                <button value="'.$fila['CodigoProd'].'" class="btn btn-lg btn-success botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Agregar al carrito</button>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>
