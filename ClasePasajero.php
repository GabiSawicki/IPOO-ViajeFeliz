<?php

class Pasajero{

    //atributos
    private $nombre;
    private $apellido;
    private $numDoc;
    private $tel;

    //construct
    public function __construct($name,$lastname,$doc,$tel){
        $this->nombre=$name;
        $this->apellido=$lastname;
        $this->numDoc=$doc;
        $this->tel=$tel;
    }
    
    //getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }
    public function getTel(){
        return $this->tel;
    }

    //setters
    public function setNombre($name){
        $this->nombre=$name;
    }
    public function setApellido($lastname){
        $this->apellido=$lastname;
    }
    public function setNumDoc($doc){
        $this->numDoc=$doc;
    }
    public function setTel($tel){
        $this->tel=$tel;
    }


    //toString
    public function __toString(){
        return $this->getNombre ."\n". $this->getApellido. "\n" . $this->getNumDoc . "\n" . $this->getTel;

    }

 

    
}