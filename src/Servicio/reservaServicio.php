<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Modelo/reservaModelo.php");

class ReservaServicio {
    
    private $ID;
    private $idMascota;
    private $tipoReserva;
    private $sala;
    private $fecha;
    private $horaInicio;
    private $numContacto;

	function __construct(){
    
    }

    function init($ID, $idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto){

        $this->ID = $ID;
        $this->idMascota = $idMascota;
        $this->tipoReserva = $tipoReserva;
        $this->sala = $sala;
        $this->fecha = $fecha;
        $this->horaInicio = $horaInicio;
        $this->numContacto = $numContacto;
    }

    function getID(){
        
        return $this->ID;
    }

    function getIdMascota(){
        
        return $this->idMascota;
    }

    function getTipoReserva(){
        
        return $this->tipoReserva;
    }

    function getSala(){
        
        return $this->sala;
    }

    function getFecha(){
        
        return $this->fecha;
    }

    function getHoraInicio(){
        
        return $this->horaInicio;
    }

    function getNumContacto(){
        
        return $this->numContacto;
    }

    function obtener(){
        $reservasModelo = new ReservaModelo();
        $arrayReservas = $reservasModelo->obtener();

		$listaReservas =  array();

        foreach ($arrayReservas as $reserva){

            $reservasServicio = new ReservaServicio();
            $reservasServicio->Init($reserva['ID'], $reserva['id_mascota'], $reserva['tipo_reserva'], $reserva['sala'], $reserva['fecha'], $reserva['hora_inicio'], $reserva['num_contacto']);
            
            array_push($listaReservas, $reservasServicio);
        }
                
        return $listaReservas;
    }

    function buscarReservas($fechaInicioSemena, $fechaFinSemana, $sala){
        $reservasServicio = new ReservaServicio();
        $todasLasReservas = $reservasServicio->obtener();

        $arrayReservas= array();

        foreach ($todasLasReservas as $reserva){

            if($reserva->getFecha() >= $fechaInicioSemena && $reserva->getFecha() <= $fechaFinSemana && $reserva->getSala() == $sala){

                array_push($arrayReservas, $reserva);
            }
        }

        return $arrayReservas;
    }


    function colocarReserva($arrayReservas, $dia, $hora){
        foreach($arrayReservas as $reserva){

            if($reserva->getHoraInicio() == $hora && $reserva->getFecha() == $dia){
                
                return $reserva;
            }
        }

        return "-";
    }

    function crearReserva($idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto){

        $reservaModelo = new ReservaModelo();
        $respuesta = $reservaModelo->crearReserva($idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto);
        
        return $respuesta;
    }

    function validarReserva(){
        
    }
    
}