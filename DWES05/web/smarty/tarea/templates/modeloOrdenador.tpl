<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Mdoelo Ordenador</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">
  <div id="contenedor">
    <div id="encabezado">

{*NOMBRE CORTO DEL PRODUCTO*}
      <h1>{$ordenador->getnombrecorto()}</h1>

{*CÓDIGO DEL PRODUCTO*}
      <p><strong>Código: </strong> {$ordenador->getcodigo()}</p>  
    </div>

    <div id="productos">
{*MOSTRAR LOS DATOS DEL ORDENADOR*}
      <h2>Carasterísticas</h2>

{*PROCESADOR*}
      <p><strong>Procesador: </strong> <span>{$ordenador->getprocesador()}</span>   </p>

{*RAM*}
      <p><strong>RAM: </strong>  <span>{$ordenador->getram()}</span> </p>

{*TARJETA GRÁFICA*}
      <p><strong>Tarjeta gráfica: </strong>  <span>{$ordenador->getgrafica()}</span>   </p>

{*UNIDAD ÓPTICA*}
      <p><strong>Unidad óptica: </strong>  <span>{$ordenador->getunidadoptica()}</span>   </p>

{*OTROS*}
      <p><strong>Otros: </strong>  <span>{$ordenador->getotros()}</span>  </p>

{*PVP*}
      <p><strong>PVP: </strong>  <span>{$ordenador->getPVP()}</span>  </p>

{*DESCRIPCIÓN*}
      <h2 class="mOrdenador">Descripción</h2>
      <p>{$ordenador->getdescripcion()}</p> 

    </div>

    <div id="pie">
{*BOTON PARA VOLVER A productos.php*}
      <button><a href="productos.php">Volver a Producto</a></button>

    </div>

  </div>
</body>
</html>