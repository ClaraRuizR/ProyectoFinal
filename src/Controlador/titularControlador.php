<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Modelo/titularModelo.php");

class TitularControlador{
    
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
        $this->fechaAlta = $fechaAlta;
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

    function getCodigoPostal(){

        return $this->codigoPostal;
    }

    function getNumContacto() {

        return $this->numContacto;
    }

    function getFechaAlta(){

        return $this->fechaAlta;
    }

    function obtener(){
        $titulares = new TitularModelo();
        $arrayTitulares = $titulares->obtener();

		$listaTitulares =  array();

        foreach ($arrayTitulares as $titular){
           
            $titularesControlador = new TitularControlador();
            $titularesControlador->Init($titular['ID'], $titular['nombre'], $titular['DNI'], $titular['domicilio'], $titular['codigo_postal'], $titular['num_contacto'], $titular['fecha_alta']);
            
            array_push($listaTitulares, $titularesControlador);
        }
                
        return $listaTitulares;
    }

    function buscarTitularPorId($idTitular){

        $titularesControlador = new TitularControlador();
        $listaTitulares = $titularesControlador->obtener();

        foreach($listaTitulares as $titular){

            if($titular->getID() == $idTitular){

                return $titular;
            }
        }
    }

    function obtenerIdUltimoTitularRegistrado(){

		$titulares = new TitularModelo();
        $arrayTitulares = $titulares->obtener();

        $ultimaEntrada = end($arrayTitulares);

        return $ultimaEntrada['ID'];
	}

    function crearFicha($nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular){

        $titularModelo = new TitularModelo();
        $respuesta = $titularModelo->crearFicha($nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular);
        
        return $respuesta;
    }

    function editarFicha($idTitular, $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular){

        $titularModelo = new TitularModelo();
        $respuesta = $titularModelo->editarFicha($idTitular, $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular);
        
        return $respuesta;
    }
    
}