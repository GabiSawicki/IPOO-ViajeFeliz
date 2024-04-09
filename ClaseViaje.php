<?php
include_once 'ClasePasajero.php';
include_once 'ClaseResponsable.php';


class Viaje{

    //atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $responsable;
    private $colPasajeros;


    //construct
    public function __construct($code,$des,$cantMax,$res){
        $this->codigo = $code;
        $this->destino = $des;
        $this->cantMaxPasajeros = $cantMax;
        $this->responsable = $res;
        $this->colPasajeros = array();
    }


    //getters
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function getColPasajeros(){
        return $this->colPasajeros;
    }

    //setters
    public function setCodigo($code){
        $this->codigo=$code;
    }
    public function setDestino($des){
        $this->destino=$des;
    }
    public function setCantMaxPasajeros($cantMax){
        $this->cantMaxPasajeros=$cantMax;
    }
    public function setResponsable($res){
        $this->responsable = $res;
    }
    public function setColPasajeros($cant){
        $this->colPasajeros=$cant;
    }


    //Agregar Pasajero
    public function agregarPasajero($name,$lastname,$doc,$tel){
        $completo=false;
        $repetido=false;
        $colPasajeros = $this->getColPasajeros();
        $cantMax = $this->getCantMaxPasajeros();
        $cantActual = count($colPasajeros);
        $i = 0;

        if($cantActual<$cantMax){

            while($i<$cantActual && !($repetido)){
                $docPasajero = $colPasajeros[$i]->getNumDoc();
                if($doc == $docPasajero){
                    $repetido = true;
                }
                $i++;
            }

            if(!($repetido)){
                $completo = true;
                $nuevoPasajero = new Pasajero($name,$lastname,$doc,$tel);
                $this->colPasajeros[] = $nuevoPasajero;
            }
        }
        return $completo;
    }


    //Eliminar Pasajero
    public function eliminarPasajero($doc){
        $completo=false;
        $esta=false;
        $colPasajeros = $this->getColPasajeros();
        $cantActual = count($colPasajeros);

        $i=0;
        while($i<$cantActual && !($esta)){
            $docPasajero = $colPasajeros[$i] -> getNumDoc();
            if($doc == $docPasajero){
                $esta = true;
                array_splice($this->colPasajeros, $i, 1);   
                $completo=true;             
            }
            $i++;
        }

        return $completo;
    }


    //Modificar Pasajero
    function modificarPasajero($name,$lastname,$doc,$tel){
        $completo = false;
        $cambiado = false;
        $i = 0;
        $colPasajeros = $this->getColPasajeros();
        $cantActual = count($colPasajeros);
        while($i<$cantActual && !($cambiado)){
            $documentoPasajero = $colPasajeros[$i]->getNumDoc();
            if($doc == $documentoPasajero){
                $completo = true;
                $cambiado = true;
                $colPasajeros[$i]->setNombre($name);
                $colPasajeros[$i]->setApellido($lastname);
                $colPasajeros[$i]->setTel($tel);
            }
            $i++;
        }
        return $completo;

    }



    //Cambiar Responsable
    function cambiarResponsable($name,$lastname,$numE,$numL){
        $completo = false;
        $responsable = $this->getResponsable();
        $numeroEmpleado = $responsable->getNumeroEmpleado();

        if($numE != $numeroEmpleado){
            $nuevoResponsable = new ResponsableV($name,$lastname,$numE,$numL);
            $this->setResponsable($nuevoResponsable);
            $completo = true;
        }

        return $completo;
    }


}