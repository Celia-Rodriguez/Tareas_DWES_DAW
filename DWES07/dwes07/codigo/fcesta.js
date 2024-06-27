 /* ---------- Añadir Producto a la Cesta ---------- */
function addProducto(codigo) {
    //recogemos el id con el código del producto
	var boton_codigo = document.getElementById("btn-"+codigo)
	boton_codigo.disabled = true
	//y se lo pasamos a xajax para enviarselo al php
	xajax_addProducto(codigo)
}
 /* ---------- Vaciar Cesta ---------- */
function vaciarCesta() {
	//recoge el id del boton de vaciar cesta 
	var boton_vaciar = document.getElementById("btn-vaciarCesta")
	boton_vaciar.disabled = true	
	//llamamos al php para vaciar la cesta
	xajax_vaciarCesta();
}