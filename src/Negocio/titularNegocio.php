<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Infraestructura/titularAccesoDatos.php");

class TitularNegocio{
    
    private $ID;
    private $nombre;
    private $DNI;
    private $domicilio;
    private $codigo_postal;
    private $num_contacto;
    private $fecha_alta;

	function __construct(){
    
    }

    function init($id, $nombre, $DNI, $domicilio, $codigoPostal, $numContacto,  $fechaAlta){
        $this->ID = $id;
        $this->nombre = $nombre;
        $this->DNI = $DNI;
        $this->domicilio = $domicilio;
        $this->codigoPostal = $codigoPostal;
        $this->numContacto = $numContacto;
        $this->color = $fechaAlta;
    }

    function getID(){
        
        return $this->ID;
    }

    function getNombre(){
        
        return $this->nombre;
    }

    function getDNI(){
        
        return $this->DNI;
    }

    function getDomicilio() {

        return $this->domicilio;
    }

    function getCodigo_postal(){

        return $this->codigoPostal;
    }

    function getNumContacto() {

        return $this->numContacto;
    }

    function getFechaAlta(){

        return $this->fechaAlta;
    }

    function obtener(){
        $titulares = new TitularAccesoDatos();
        $arrayTitulares = $titulares->obtener();

		$listaTitulares =  array();

        foreach ($arrayTitulares as $titular){
           
            $titularesNegocio = new TitularNegocio();
            $titularesNegocio->Init($titular['ID'], $titular['nombre'], $titular['DNI'], $titular['domicilio'], $titular['codigo_postal'], $titular['num_contacto'], $titular['fecha_alta']);
            
            array_push($listaTitulares, $titularesNegocio);
        }
                
        return $listaTitulares;
    }

    function buscarTitularPorId($idTitular){

        $titularesNegocio = new TitularNegocio();
        $listaTitulares = $titularesNegocio->obtener();

        foreach($listaTitulares as $titular){

            if($titular->getID() == $idTitular){

                return $titular;
            }
        }
    }
    
}