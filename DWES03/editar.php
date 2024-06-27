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

//variables
	$cod_producto="";
//si existe la variable post del formulario editar de listado.php
	if(isset($_POST['editar'])){
		//damos el valor del input hidden del formulario anterior a la variable
		$cod_producto = $_POST['codigo_producto'];
	}//if
?>

<!--  HTML -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Editar Producto</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- ENCABEZADO -->
	<div id="encabezado">
		<h1>Tarea: Edición de un producto</h1>
	</div>
<!--FIN ENCABEZADO -->

<!-- CONTENIDO -->
	<div id="contenido">
		<h2>Producto:</h2>	
<!-- FORMULARIO -->	
		<form id="form_seleccion" action="actualizar.php" method="post">
		<?php
			try{
			//si existe la variable codigo de producto
				if(isset($cod_producto)){
					//sentencia SQL para buscar todos los datos necesario con el código de producto traido de la página listado.php
					$sql = <<<SQL
					SELECT cod, nombre, nombre_corto, descripcion, pvp
					FROM producto WHERE cod='$cod_producto'
					SQL;
					//ejecutamos la sentencia
					$result = $dwes->query($sql);
					//si hay resultados
					if($result) {
						//mientras haya registros en la busqueda
						while ($row =$row = $result->fetch()){			
							//guardamos el valor del código del producto para pasarlo a través del formulario
							echo "<input type='hidden' name='codigo_producto' value='${row['cod']}'/>";
					//nombre corto
							echo"<label for='nombre_corto'>Nombre corto: </label>";
							//le damos el valor que le corresponde en el atributo value así luego lo podemos mandar a otra página
							echo"<input type='text' name='nombre_corto' value='${row['nombre_corto']}'>";
							echo"<br><br>";
					//Nombre
							echo"<label for='nombre'>Nombre: </label><br>";
							//le damos el valor que le corresponde en el atributo value así luego lo podemos mandar a otra página
							echo"<textarea name='nombre' id='nombre' cols='30' rows='3' value='${row['nombre']}'>${row['nombre']}</textarea>";
							echo"<br><br>";
					//Descripción
							echo"<label for='descripcion'>Descripción:</label><br>";
							//le damos el valor que le corresponde en el atributo value así luego lo podemos mandar a otra página
							echo"<textarea name='descripcion' cols='30' rows='10' value='${row['descripcion']}'>${row['descripcion']}</textarea>";
							echo"<br><br>";
					//pvp
							echo"<label for='pvp'>PVP: </label>";
							//le damos el valor que le corresponde en el atributo value así luego lo podemos mandar a otra página
							echo"<input type='text' name='pvp' id='pvp'value='${row['pvp']}'>";
							echo"<br><br>";
						}//while
					}//if
				}//if
			}catch(Exception $e){
				//Error al fallar la conexión con la base de datos. Se motrará en el pie
				$e->getMessage();//la variable e recoje el error que se produce
			}//try cath
		?>
		<!-- botones -->	
			<button type="submit" name="actualizar">Actualizar</button>
			<button type="cancelar" name="cancelar">Cancelar</button>
		</form>
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