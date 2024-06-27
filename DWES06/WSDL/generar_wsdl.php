<?php
require_once('../Funciones.php');//archivo que contiene las clases
require_once('src/WSDLDocument.php');

 /* ----------- URL ----------- */
$uri="http://localhost/DWES06/WSDL/";
/* ----------- SERVIDOR SOAP ----------- */
//creamos una clase server desde la que podremos comunicar las páginas
$server = new SoapServer(null,array('uri'=>$uri));
/* ----------- CLASES SOAP ----------- */
//creamos la clase Servicios
$server->setClass('Servicio_F'); 
$server->handle();

$wsdl = new WSDLDocument( "Servicio_F","http://localhost/DWES06/Servicio.php",$uri ); echo $wsdl->saveXml();

?>