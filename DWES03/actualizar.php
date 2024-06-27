<?php
// Conexión a la base de datos 
	$e="";//mensaje 
	try{
		//estructura de la sentencia de conexión host+port nombre de la base de datos  usuario y contraseña
		$dwes = new PDO("mysql:host=localhost; dbname=dwes", "dwes", "abc123.");
		//Mensaje de confirmación de la conxeión con la base de datos
		if($dwes){
			$e ="Base de Datos conectada";
		}
	}catch(PDOException $e){
		//Error al fallar la conexión con la base de datos. Se motrará en el pie
		$e->getMessage();//la variable e recoje el error que se produce
	}// conexion con la bbdd

//variable
	$message="";
//comprobamos que se ha pulsado cancelar
	if(isset($_POST['cancelar'])){
		//mensaje de aviso
		$message="Ha cancelado los cambios, para volver a la página de 
		Listado de Productos por favor pulse continuar.";
		//deconectamos la base de datos
		unset($dwes);
	}//if

	//comprobamos que se ha pulsado actualizar
	if(isset($_POST['actualizar'])){
		//damos valor a las varibales con los4_POST de los campos de la tabla producots que vienen de editar
		$nombrecorto = $_POST['nombre_corto'];
		$nombre = $_POST['nombre'];
		$descripcion =  $_POST['descripcion'];
		$pvp = $_POST['pvp'];
		$cod = $_POST['codigo_producto'];

	//ACTUALIZARCION DE LOS CAMPOS DE LA TABLA PRODUCTOS
		try{
			//sentencia SQL para modificar los registros
			$sql = "UPDATE producto SET nombre='$nombre', nombre_corto='$nombrecorto', descripcion='$descripcion', pvp='$pvp' WHERE cod='$cod'";
			//preparamos la modificacion
			$consulta=$dwes->prepare($sql);
			//y la ejecutamos
			$consulta->execute();
			if($consulta){
				$message="Se han actualizado los datos <br> Pulse continuar para volver a la página de 
				Listado de Productos";
			}//if
		}catch(Exception $e){
			//Error al fallar la conexión con la base de datos. Se motrará en el pie
			$e->getMessage();//la variable e recoje el error que se produce
			$message="No se han podido realizar los cambios";
		}

	}//if
?>

<!--  HTML -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Actualizar</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- ENCABEZADO -->
<div id="encabezado">
	<h1>Tarea: Actualización de los datos del producto</h1>
</div>
<!-- FIN ENCABEZADO -->

<!-- CONTENIDO -->
	<div id="contenido">
		<h2>Estado Actualización</h2>
<!-- FORMULARIO -->
		<form id="form_seleccion" action="listado.php" method="post">
		<!-- MENSAJE DE AVISO -->
			<p><?php echo $message;?></p>
		<!-- BTOTÓN DE CONTINUAR -->
			<button type="submit" name="continuar">Continuar</button>
		</form>
<!--FIN FORMULARIO -->
	</div>
<!--FIN CONTENIDO -->

<!-- PIE -->
<div id="pie">
	<!--MESAJES DE ERROR -->
		<p><?php echo $e;?></p>
	<!--desconexión de la base de datos -->
		<?php
			unset($dwes);
		?>
	</div>
<!--FIN PIE -->
</body>
</html>
<!--  FIN HTML -->