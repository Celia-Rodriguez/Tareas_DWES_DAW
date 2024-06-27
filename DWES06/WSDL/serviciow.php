<?php
    /* ----------- URL ----------- */
    //$uri="http://localhost/DWES06/WSDL/";
    $uri_xml="http://localhost/DWES06/WSDL/serviciow.wsdl";

    class Servicio_Fw{

      /*------------------ CONEXION A LA BBDD ------------------*/
          /**
           * Ejecutar consultas sql
           * @param string $sql
           * @return string[] $resultado
           */
          public static function ejecutaConsulta($sql) {
              $db  = new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.');
              $resultado = null;
              if (isset($db)) $resultado = $db->query($sql);
              return $resultado;
          }//funcion ejecutar consulta
      /*------------------ FIN CONEXION A LA BBDD ------------------*/
      
      /*------------------ GETPVP sacar el pvp por el código de producto ------------------*/
          /** 
          *  GET PVP Obtiene el PVP con el código de producto
          * @param string $codigo
          * @return float $pvp
          */
          public function getPVP($codigo){
              $pvp="";
              $sql = "SELECT cod, pvp from producto where cod = '".$codigo."' ";
              $result = self::ejecutaConsulta($sql);
              if(isset($result)) {
                  $row = $result->fetch();
                  $pvp = $row['pvp'];
              }
              return $pvp;
          }//funcion getPVP
      /*------------------ FIN GETPVP ------------------*/
      
      /*------------------ GETSTOCK ------------------*/
         /** 
          *  GET STOCK  Obtiene el numero de unidades por producto en una tienda determinada
          * @param string $codigo_producto
          * @param int $codigo_tienda
          * @return int $stock
          * 
          */
          public function getStock($codigo_producto,$codigo_tienda){
              $stock="";
              $sql = "SELECT producto, tienda, unidades from stock where producto = '".$codigo_producto."'AND tienda = '".$codigo_tienda."' ";
              $result = self::ejecutaConsulta($sql);
              if(isset($result)) {
                  $row = $result->fetch();
                  $stock = $row['unidades'];
              }
              return $stock;
          }//function getStock
      /*------------------ FIN GETSTOCK ------------------*/
      
      /*------------------ GETFAMILIAS ------------------*/
         /** 
          * GET FAMILIAS  Obtiene la lista de los códigos de las Familias de productos
          * @return string[] $familias
          */
          public function getFamilias(){
              $familias = [];
              $sql = "SELECT cod from familia";
              $result = self::ejecutaConsulta($sql);
              $row = $result->fetch();
             while($row != null){  
                  array_push($familias,$row['cod']);
                  $row = $result->fetch();
              }
              return $familias;
          }//function getFamilias
      /*------------------ FIN GETFAMILIAS ------------------*/
      
      /*------------------ GETPRODUCTOSFAMILIA ------------------*/
          /** 
          * GET PRODUCTOS FAMILIA  Obtiene una lista de codigos de prpducto según el codigo de familia
          * @param string $codigo_familia
          * @return string[] $productos_familia
          * 
          */
          public function getProductosFamilia($codigo_familia){
              $lista_productos=[];
              $sql="SELECT cod, familia FROM producto WHERE familia ='".$codigo_familia."' ";
              $result=self::ejecutaConsulta($sql);
              $row = $result->fetch();
              while($row != null){  
                   array_push($lista_productos,$row['cod']);
                   $row = $result->fetch();
               }
               return $lista_productos;
          }//function getProductosFamilia
      /*------------------ FIN GETPRODUCTOSFAMILIA ------------------*/
      
      }//clase SERVICIOS



    /* ----------- SERVIDOR SOAP ----------- */
    //creamos una clase server desde la que podremos comunicar las páginas
    //$server = new SoapServer(null,array('uri'=>$uri));
    $server = new SoapServer($uri_xml);
    /* ----------- CLASES SOAP ----------- */
    //creamos la clase Servicios
    $server->setClass('Servicio_Fw'); 
    $server->handle();

?>