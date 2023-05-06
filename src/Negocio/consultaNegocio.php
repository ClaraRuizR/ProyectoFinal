<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Infraestructura/consultaAccesoDatos.php");


class ConsultaNegocio{
    
    private $ID;
    private $idMascota;
    private $idVeterinario;
    private $fecha;
    private $motivoConsulta;
    private $peso;
    private $temperatura;
    private $exploracionFisica;
    private $diagnostico;
    private $actuacion;
    private $procedimientos;
    private $anestesia;
    private $medicacionInyectada;
    private $medicamentosCedidos;
    private $dietas;
    private $tienda;
    private $otros;

	function __construct(){
    
    }

    function init($ID, $idMascota, $idVeterinario, $fecha, $motivoConsulta, $peso, $temperatura, $exploracionFisica, $diagnostico, $actuacion, $procedimientos, $anestesia, $medicacionInyectada, $medicamentosCedidos, $dietas, $tienda, $otros){

        $this->ID = $ID;
        $this->idMascota = $idMascota;
        $this->idVeterinario = $idVeterinario;
        $this->fecha = $fecha;
        $this->motivoConsulta = $motivoConsulta;
        $this->peso = $peso;
        $this->temperatura = $temperatura;
        $this->exploracionFisica = $exploracionFisica;
        $this->diagnostico = $diagnostico;
        $this->actuacion = $actuacion;
        $this->procedimientos = $procedimientos;
        $this->anestesia = $anestesia;
        $this->medicacionInyectada = $medicacionInyectada;
        $this->medicamentosCedidos = $medicamentosCedidos;
        $this->dietas = $dietas;
        $this->tienda = $tienda;
        $this->otros = $otros;
    }

    function getID(){
        
        return $this->ID;
    }

    function getIdMascota(){
        
        return $this->idMascota;
    }

    function getIdVeterinario(){
        
        return $this->idVeterinario;
    }

    function getFecha(){
        
        return $this->fecha;
    }

    function getMotivoConsulta() {

        return $this->motivoConsulta;
    }

    function getPeso(){

        return $this->peso;
    }

    function getTemperatura() {

        return $this->temperatura;
    }

    function getExploracionFisica(){

        return $this->exploracionFisica;
    }

    function getCodigoDiagnostico(){

        return $this->diagnostico;
    }

    function getActuacion() {

        return $this->actuacion;
    }

    function getProcedimientos(){

        return $this->procedimientos;
    }

    function getAnestesia(){

        return $this->anestesia;
    }

    function getMedicacionInyectada(){

        return $this->medicacionInyectada;
    }

    function getMedicamentosCedidos(){

        return $this->medicamentosCedidos;
    }

    function getDietas() {

        return $this->dietas;
    }

    function getTienda(){

        return $this->tienda;
    }

    function getOtros(){

        return $this->otros;
    }

    function obtener(){
        $consultas = new ConsultaAccesoDatos();
        $arrayConsultas = $consultas->obtener();

		$listaConsultas =  array();

        foreach ($arrayConsultas as $consulta){
           
            $consultasNegocio = new ConsultaNegocio();
            $consultasNegocio->Init($consulta['ID'], $consulta['id_mascota'], $consulta['id_veterinario'], $consulta['fecha'], $consulta['motivo_consulta'], $consulta['peso'], $consulta['temperatura'], $consulta['exploracion_fisica'], $consulta['diagnostico'], $consulta['actuacion'], $consulta['procedimientos'], $consulta['anestesia'], $consulta['medicacion_inyectada'], $consulta['medicamentos_cedidos'], $consulta['dietas'], $consulta['tienda'], $consulta['otros']);
            
            array_push($listaConsultas, $consultasNegocio);
        }
                
        return $listaConsultas;
    }

    function buscarConsultasporMascota($idMascota){

        $consultasNegocio = new ConsultaNegocio();
        $listaConsultas = $consultasNegocio->obtener();

        $arrayConsultas =  array();

        foreach($listaConsultas as $consulta){

            if($consulta->getIdMascota() == $idMascota){

                array_push($arrayConsultas, $consulta);
            }
        }

        return $arrayConsultas;
    }

    function buscarConsultasporId($idConsulta){

        $consultasNegocio = new ConsultaNegocio();
        $listaConsultas = $consultasNegocio->obtener();

        foreach($listaConsultas as $consulta){

            if($consulta->getID() == $idConsulta){

                return $consulta;
            }
        }
    }
    
}