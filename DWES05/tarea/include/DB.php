<?php
//creamos la base de datos con el archivo DR_Create.php
require_once('DB_Create.php');
require_once('Producto.php');
//incluimos el archiuvo que contiene la clas Ordenador
require_once('Ordenador.php');

class DB {
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea5";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }//funcion ejecutar consulta
/*--Modificación frente al orginal--*/
    public static function obtieneProductos() {
        //se ha añadido familia a la busqueda para así separar los de tipo ordenador del resto
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $productos = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $productos[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}
        
        return $productos;
    }//funcion obtiene Productos

    public static function obtieneProducto($codigo) {
        //se ha añadido familia a la busqueda para así separar los de tipo ordenador del resto
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $producto = null;

	if(isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
	}
        return $producto;    
    }// funcion obtiene producot por CODIGO

//Funcion para obtener los datos de los ordenadores
    public static function obtieneOrdenador($codigo){
        //sentencia SQL para sacar los datos del ordenador
        $sql="SELECT ordenador.cod, nombre_corto, PVP, descripcion, procesador, RAM, grafica, unidadoptica, otros FROM ordenador INNER JOIN producto ON producto.cod = ordenador.cod where ordenador.cod='".$codigo."'";
        //llamamos a la funcion ejecutarConsulta que se encuentra más arriba en este mismo archivo
        $result=self::ejecutaConsulta($sql);
        //declaramos una varibale ordenador que nos servirá para crear posteriormente un objeto de la clase Ordenador.
        $ordenador = null;
        //sacamos los datos de la consulta SQL y los pasamos con la array que nos crea el fetch al constructor de la clase Ordenador
        if(isset($result)){
            //guardamos el array resultante con los datos sacados por la sentencia SQL
            $row = $result->fetch();
                //Se los pasamos al constructor de la clase para crear un objeto con estas características
                $ordenador = new Ordenador($row);
        }
        //devolvemos el objeto ordenador
        return $ordenador;
    }//function obtener datos de ordenador
/*-- FIN Modificación frente al orginal--*/

    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='" . md5($contrasena) . "';";
        $resultado = self::ejecutaConsulta ($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    }// funcion verificar CLIENTE
    
}//clas DB

?>
