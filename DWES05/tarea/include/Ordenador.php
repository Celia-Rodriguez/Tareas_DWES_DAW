<?php

class Ordenador{

//PROPIEDADES    
    private $nombre_corto;
    private $codigo;
    private $procesador;
    private $ram;
    private $grafica;
    private $unidadoptica;
    private $otros;
    private $PVP;
    private $descripcion;

    //GETTERS 
    public function getnombrecorto(){return $this->nombre_corto;}
    public function getcodigo(){return $this->codigo;}
    public function getprocesador(){return $this->procesador;}
    public function getram(){ return $this->ram;}
    public function getgrafica(){return $this->grafica;}
    public function getunidadoptica(){ return $this->unidadoptica;}
    public function getotros(){return $this->otros;}
    public function getPVP(){return $this->PVP;}
    public function getdescripcion(){return $this->descripcion;}

    //CONSTRUCTOR
    public function __construct($row){
        $this->nombre_corto = $row['nombre_corto'];
        $this->codigo = $row['cod'];
        $this->procesador = $row['procesador'];
        $this->ram = $row['RAM'];
        $this->grafica = $row['grafica'];
        $this->unidadoptica = $row['unidadoptica'];
        $this->otros = $row['otros'];
        $this->PVP = $row['PVP'];
        $this->descripcion = $row['descripcion'];
    }

}//clase ORdenador

?>