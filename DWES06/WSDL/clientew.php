<?php
require_once('src/WSDLDocument.php');

require_once('wsdl2php/src/Servicio_F.php');

/* ----------- URL necesarias para el funcionamiento del SOAP ----------- */

//C:\xampp\htdocs\DWES06\WSDL\wsdl2php\src\Servicio_F.php
$url="http://localhost/DWES06/WSDL/wsdl2php/src/Servicio_F.php";
$uri="http://localhost/DWES06/WSDL";

$uri_xml="http://localhost/DWES06/WSDL/serviciow.wsdl";


//VARIABLES QUE VAMOS A UTILIZAR COMO EJEMPLO
$codigo="3DSNG";
$codigo_tienda="1";
$codigo_familia= "MEMFLA";

/* ----------- Cliente SOAP ----------- */
$cliente = new Servicio_F();
//$cliente = new SoapClient($uri_xml);
//$cliente = new SoapClient(null,array('location'=>$url,'uri'=>$uri));

/* ----------- LLAMADAS A LAS FUNCIONES ----------- */
//getPVP
$pvp = $cliente->getPVP($codigo);
//getStock
$unidades = $cliente->getStock($codigo, $codigo_tienda);
//getFamilias
$familias = $cliente->getFamilias();
//getProductosFamlia
$productos=$cliente->getProductosFamilia($codigo_familia);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <!--Muestra los resultados de GETPVP  -->
    <p>El precio del producto <?php echo $codigo;?> es: <?php echo $pvp;?> </p>
    <hr>
    <!--Muestra los resultados de GETSTOCK  -->
    <p>En la tienda <?php echo $codigo_tienda;?> hay: <?php echo $unidades;?> del producto <?php echo $codigo;?> </p>
    <hr>
    <!--Muestra los resultados de GETFAMILIAS  -->
    <p>La lsita de familias es : <?php var_dump($familias); ?></p>
    <hr>
    <!--Muestra los resultados de GETPRODUCTOSFAMILIAS  -->
    <p>La lsita de los codigo de producto de la famlia <?php echo $codigo_familia ?>  es : <?php var_dump($productos); ?></p>
    <hr>

</body>
</html>