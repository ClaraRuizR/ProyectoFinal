<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Modelo/trabajadorModelo.php");

class TrabajadorControlador{
    
    private $ID;
    private $nombre;
    private $apellidos;
    private $trabajo;
    private $numColegiado;
    private $fechaAlta;
    private $numContacto;
    private $idUsuario;

	function __construct(){
    
    }

    function init($id, $nombre, $apellidos, $trabajo, $numColegiado, $fechaAlta, $numContacto, $idUsuario){
        $this->ID = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->trabajo = $trabajo;
        $this->numColegiado = $numColegiado;
        $this->fechaAlta = $fechaAlta;
        $this->numContacto = $numContacto;
        $this->idUsuario = $idUsuario;
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

    function getIdUsuario(){

        return $this->idUsuario;
    }

    function obtener(){
        $trabajadores = new TrabajadorModelo();
        $arrayTrabajadores = $trabajadores->obtener();

		$listaTrabajadores =  array();

        foreach ($arrayTrabajadores as $trabajador){
           
            $trabajadoresControlador = new TrabajadorControlador();
            $trabajadoresControlador->Init($trabajador['ID'], $trabajador['nombre'], $trabajador['apellidos'], $trabajador['trabajo'], $trabajador['n_colegiado'], $trabajador['fecha_alta'], $trabajador['num_contacto'], $trabajador['id_usuario']);
            
            array_push($listaTrabajadores, $trabajadoresControlador);
        }
                
        return $listaTrabajadores;
    }

    function buscarTrabajadorPorId($idTrabajador){

        $trabajadoresControlador = new TrabajadorControlador();
        $listaTrabajadores = $trabajadoresControlador->obtener();

        foreach($listaTrabajadores as $trabajador){

            if($trabajador->getID() == $idTrabajador){

                return $trabajador;
            }
        }
    }
    
}