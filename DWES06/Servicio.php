<?php
    /* ----------- CLASE FUNMCIONES ----------- */
    require_once('Funciones.php');
    /* ----------- URL ----------- */
    $uri="http://localhost/DWES06/";

    /* ----------- SERVIDOR SOAP ----------- */
    //creamos una clase server desde la que podremos comunicar las páginas
    $server = new SoapServer(null,array('uri'=>$uri));
    /* ----------- CLASES SOAP ----------- */
    //creamos la clase Servicios
    $server->setClass('Servicio_F'); 
    $server->handle();
?>