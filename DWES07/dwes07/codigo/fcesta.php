<?php 
require_once('include/CestaCompra.php');
require_once('productos.php');
 /* ---------- Añadir Producto a la Cesta ---------- */
function nuevoProducto($codigo) {
  //session_start();
  $cesta = CestaCompra::carga_cesta();
  //objeto de respuesta xajax
  $respuesta = new xajaxResponse();
  //métodos de la CestaCompra
  $cesta->nuevo_articulo($codigo);
  $cesta->guarda_cesta();
//asignamos los valores a las variblaes con xajax
  $id_btn = "btn-".$codigo;
  $respuesta->assign($id_btn ,"value","Añadir");
  $respuesta->assign($id_btn,"disabled",false);
//pasamos la informacion para que sea mostrada en la cesta de la compra
  $html = html_Cesta($cesta);
  $respuesta->assign("cesta", "innerHTML", $html);
//devolvemos el objeto respuesta
  return $respuesta;
}
 /* ---------- Vaciar Cesta ---------- */
function vaciarCesta() {
  //session_start();
  $cesta = CestaCompra::carga_cesta();
 //objeto de respuesta xajax
  $respuesta = new xajaxResponse();
  //session de la cesta
  unset($_SESSION['cesta']);
  $cesta = new CestaCompra();
  //pasamos la informacion para que sea mostrada en la cesta de la compra
  $html = html_Cesta($cesta);
  $respuesta->assign("cesta", "innerHTML", $html);
  $respuesta->assign("btn-vaciarCesta" ,"value","Vaciar Cesta");
  //devolvemos el objeto respuesta
  return $respuesta;
}
 /* ---------- HTML Cesta ---------- */
function html_Cesta($cesta) {
  //metemos todo el html en una variable y lo usamos
  $html = "<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>" . "<hr />";
  $html .= $cesta->html();
  $html .= "<form id='vaciar' action='productos.php' method='post'>";
  $html .= "<input type='submit' name='vaciar' value='Vaciar Cesta' id='btn-vaciarCesta' "; 
  if ($cesta->vacia()) {$html .= "disabled='true'";}
  $html .= " onclick='vaciarCesta()'></form>";
  $html .= "<form id='comprar' action='cesta.php' method='post'>";
  $html .= "<input type='submit' name='comprar' value='Comprar' ";
  if ($cesta->vacia()) {$html .= "disabled='true'";}
  $html .= "/></form>";  
  return $html;
}
 ?>

