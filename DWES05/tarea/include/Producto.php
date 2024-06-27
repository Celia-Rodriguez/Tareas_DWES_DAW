<?php

class Producto {
    protected $codigo;
    protected $nombre;
    protected $nombre_corto;
    protected $PVP;
    //propiedad familia, os ayudará a separar los ordenadores de los que no lo son
    protected $familia;
    
    public function getcodigo() {return $this->codigo; }
    public function getnombre() {return $this->nombre; }
    public function getnombrecorto() {return $this->nombre_corto; }
    public function getPVP() {return $this->PVP; }
    //método get para la propiedad familia
    public function getfamilia() {return $this->familia; }
    
    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->PVP = $row['PVP'];
        //asignación del valor sacado de la array $row a la propiedad familia
        $this->familia = $row['familia'];
    }//constuctor
    
}//clase Producto

?>
