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
?>

<!--  HTML -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Listado de Productos</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- ENCABEZADO -->
	<div id="encabezado">
		<h1>Tarea: Listado de productos de una familia</h1>
<!-- FORMULARIO -->
		<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label for="familia">Familia: </label>
<!-- INPUT SELECT DE FAMILIA -->		
		<select name="familia" id="familia">
		<?php
			try{
			//Igualamos el valor de la variable familia con el valor de la variable post del formulario
				if (isset($_POST['familia'])) $familia = $_POST['familia'];
				//sentencia SQL que recoje el codigo familia y el nombre de la familia
				$sql="SELECT cod, nombre from familia";
				$result = $dwes->query($sql);//ejecución de la sentencia SQL
				//si hay resultados de la sentencia
				if($result) {
					//mientras haya resultados se mostrarán en las etiquetas option del select
					while ($row = $row = $result->fetch()) {
						//el value del option será el código de la familia que se corresponde con el valor de la columna familia de la tabla productos, así podremos relacionarlos. Y mostramos el nombre de la familia
						echo "<option value='${row['cod']}'>${row['nombre']}</option>";
						if (isset($familia) && $familia == $row['cod']){
							//dejamos seleccionada la familia
							echo "<option value='${row['cod']}' selected='true'>${row['nombre']}</option>";
						}//if 
						
					}//while 
				}//if

			}catch(Exception $e){
				//Error al fallar la conexión con la base de datos. Se motrará en el pie
				$e->getMessage();//la variable e recoje el error que se produce
			}//try cath
		?>
		</select>
<!-- FIN INPUT SELECT DE FAMILIA -->
	<!-- BOTÓN MOSTRAR -->	
		<button type="submit" name="enviar">Mostrar productos</button>
		</form>
<!--FIN FORMULARIO -->
	</div>
<!--FIN ENCABEZADO -->

<!-- CONTENIDO -->
	<div id="contenido">
		<h2>Productos de la familia</h2>
	<?php
		try{
		//si existe la variable familia
			if(isset($familia)){
			//Sentencia sql para mostrar los productos con el código de familia seleccionado
				$sql="SELECT producto.cod, nombre_corto, pvp, familia from producto INNER JOIN familia ON producto.familia=familia.cod WHERE familia.cod='$familia'";
				//ejecución de la sentencia
				$result = $dwes->query($sql);
				//si hay resultados del select
				if($result) {
					//mientras haya registros de la busqueda
					while ($row =$row = $result->fetch()) {
						echo'<form id="form_seleccion" action="editar.php" method="post">';
						//se muestran los productos encontrados
						echo"<p>";
						echo "<span name='nombre_corto'>Producto ${row['nombre_corto']}: </span>";
						echo "<span name='pvp'> ${row['pvp']} euros.</span>";
						//guardamos el valor del código del producto para pasarlo a través del formulario
						echo "<input type='hidden' name='codigo_producto' value='${row['cod']}'/>";
						//boton editar
						echo"<button type='submit' name='editar'>Editar</button>";
						echo"</p>";
						echo "</form>";
					}//while
				}//if
			}//if
		}catch(Exception $e){
			//Error al fallar la conexión con la base de datos. Se motrará en el pie
			$e->getMessage();//la variable e recoje el error que se produce
		}//try cath
	?>
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