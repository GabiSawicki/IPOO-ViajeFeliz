<?php

class ResponsableV{

    //atributos
    private $nombre;
    private $apellido;
    private $numeroEmpleado;
    private $numeroLicencia;

    //construct
    public function __construct($name,$lastname,$numE,$numL){
        $this->nombre=$name;
        $this->apellido=$lastname;
        $this->numeroEmpleado=$numE;
        $this->numeroLicencia=$numL;
    }


    //getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    //setters
    public function setNombre($name){
        $this->nombre=$name;
    }
    public function setApellido($lastname){
        $this->apellido=$lastname;
    }
    public function setNumeroEmpleado($numE){
        $this->numeroEmpleado=$numE;
    }
    public function setNumeroLicencia($numL){
        $this->numeroLicencia=$numL;;
    }

    //toString
    public function __toString(){
        return $this->getNombre ."\n". $this->getApellido. "\n" . $this->getNumeroEmpleado . "\n" . $this->getNumeroLicencia;

    }
}