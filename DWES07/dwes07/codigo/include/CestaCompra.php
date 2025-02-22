<?php
require_once('DB.php');

class CestaCompra {
    protected $productos = array();
    
    // Introduce un nuevo artículo en la cesta de la compra
    public function nuevo_articulo($codigo) {
        $producto = DB::obtieneProducto($codigo);
        $this->productos[] = $producto;
    }
    
    // Obtiene los artículos en la cesta
    public function get_productos() { return $this->productos; }
    
    // Obtiene el coste total de los artículos en la cesta
    public function get_coste() {
        $coste = 0;
        foreach($this->productos as $p) $coste += $p->getPVP();
        return $coste;
    }
    
    // Devuelve true si la cesta está vacía
    public function vacia() {
        if(count($this->productos) == 0) return true;
        return false;
    }
    
    // Guarda la cesta de la compra en la sesión del usuario
    public function guarda_cesta() { $_SESSION['cesta'] = $this; }
    
    // Recupera la cesta de la compra almacenada en la sesión del usuario
    public static function carga_cesta() {
        if (!isset($_SESSION['cesta'])) return new CestaCompra();
        else return ($_SESSION['cesta']);
    }
    
    // Muestra el HTML de la cesta de la compra, con todos los productos
    public function muestra() {
        // Si la cesta está vacía, mostramos un mensaje
        if (count($this->productos)==0)  print "<p>Cesta vacía</p>";
        //  y si no está vacía, mostramos su contenido
        else foreach ($this->productos as $producto) $producto->muestra();
    }
    
    /* ---------- html de la cesta de la compra ---------- */
    public function html() {
        $html = "";
        // Si la cesta está vacía, mostramos un mensaje
        if (count($this->productos)==0) {
            $html .= "<p>Cesta vacía</p>";
            return $html;
        } else { 
            //  y si no está vacía, mostramos su contenido
            foreach ($this->productos as $producto) {
                $html .= '<p>'.$producto->getcodigo().'</p>';
            }
        }
        return $html;
    }
    
}

?>
