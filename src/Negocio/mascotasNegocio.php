<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Infraestructura/mascotasAccesoDatos.php");


class MascotasNegocio{
    
    private $ID;
    private $pasaporte;
    private $nombre;
    private $titular;
    private $especie;
    private $raza;
    private $sexo;
    private $color;
    private $codigoChip;
    private $fechaNacimiento;
    private $operado;
    private $fechaAlta;

	function __construct(){
    
    }

    function init($id, $pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado, $fechaAlta){
        $this->ID = $id;
        $this->pasaporte = $pasaporte;
        $this->nombre = $nombre;
        $this->titular = $titular;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->sexo = $sexo;
        $this->color = $color;
        $this->codigoChip = $codigoChip;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->operado = $operado;
        $this->fechaAlta = $fechaAlta;
    }

    function getID(){
        
        return $this->ID;
    }

    function getPasaporte(){
        
        return $this->pasaporte;
    }

    function getNombre(){
        
        return $this->nombre;
    }

    function getTitular(){
        
        return $this->titular;
    }

    function getEspecie() {

        return $this->especie;
    }

    function getRaza(){

        return $this->raza;
    }

    function getSexo() {

        return $this->sexo;
    }

    function getColor(){

        return $this->color;
    }

    function getCodigoChip(){

        return $this->codigoChip;
    }

    function getFechaNacimiento() {

        return $this->fechaNacimiento;
    }

    function getOperado(){

        return $this->operado;
    }

    function getFechaAlta(){

        return $this->fechaAlta;
    }

    function obtener($filtro, $textoFiltro){
        $mascotas = new mascotasAccesoDatos();
        $arrayMascotas = $mascotas->obtener($filtro, $textoFiltro);

		$listaMascotas =  array();

        foreach ($arrayMascotas as $mascota){
           
            $mascotasNegocio = new MascotasNegocio();
            $mascotasNegocio->Init($mascota['ID'], $mascota['pasaporte'], $mascota['nombre'], $mascota['id_titular'], $mascota['especie'], $mascota['raza'], $mascota['sexo'], $mascota['color'], $mascota['codigo_chip'], $mascota['fecha_nacimiento'], $mascota['operado'], $mascota['fecha_alta']);
            
            array_push($listaMascotas, $mascotasNegocio);
        }
                
        return $listaMascotas;
    }
    
}