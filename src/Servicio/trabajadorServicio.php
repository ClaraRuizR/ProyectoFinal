<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Modelo/trabajadorModelo.php");

class TrabajadorServicio{
    
    private $ID;
    private $nombre;
    private $apellidos;
    private $trabajo;
    private $numColegiado;
    private $fechaAlta;
    private $numContacto;

	function __construct(){
    
    }

    function init($id, $nombre, $apellidos, $trabajo, $numColegiado, $fechaAlta, $numContacto){
        $this->ID = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->trabajo = $trabajo;
        $this->numColegiado = $numColegiado;
        $this->fechaAlta = $fechaAlta;
        $this->numContacto = $numContacto;
    }

    function getID(){
        
        return $this->ID;
    }

    function getNombre(){
        
        return $this->nombre;
    }

    function getApellidos(){
        
        return $this->apellidos;
    }

    function getTrabajo() {

        return $this->trabajo;
    }

    function getNumColegiado(){

        return $this->numColegiado;
    }

    function getFechaAlta() {

        return $this->fechaAlta;
    }

    function getNumContacto(){

        return $this->numContacto;
    }

    function obtener(){
        $trabajadores = new TrabajadorModelo();
        $arrayTrabajadores = $trabajadores->obtener();

		$listaTrabajadores =  array();

        foreach ($arrayTrabajadores as $trabajador){
           
            $trabajadoresServicio = new TrabajadorServicio();
            $trabajadoresServicio->Init($trabajador['ID'], $trabajador['nombre'], $trabajador['apellidos'], $trabajador['trabajo'], $trabajador['n_colegiado'], $trabajador['fecha_alta'], $trabajador['num_contacto']);
            
            array_push($listaTrabajadores, $trabajadoresServicio);
        }
                
        return $listaTrabajadores;
    }

    function buscarConFiltros($filtro, $textoFiltro){

        $trabajadores = new TrabajadorModelo();
        $arrayTrabajadores = $trabajadores->obtenerConFiltros($filtro, $textoFiltro);

        $listaTrabajadores =  array();

        foreach ($arrayTrabajadores as $trabajador){
           
            $trabajadoresServicio = new TrabajadorServicio();
            $trabajadoresServicio->Init($trabajador['ID'], $trabajador['nombre'], $trabajador['apellidos'], $trabajador['trabajo'], $trabajador['n_colegiado'], $trabajador['fecha_alta'], $trabajador['num_contacto']);
            
            array_push($listaTrabajadores, $trabajadoresServicio);
        }
                
        return $listaTrabajadores;
    }

    function buscarTrabajadorPorId($idTrabajador){

        $trabajadoresServicio = new TrabajadorServicio();
        $listaTrabajadores = $trabajadoresServicio->obtener();

        foreach($listaTrabajadores as $trabajador){

            if($trabajador->getID() == $idTrabajador){

                return $trabajador;
            }
        }
    }
    
}