<?php

class Fecha{

	private $id_fecha;

	public function getId_fecha(){
		return $this->id_fecha;
	}

	public function setId_fecha($id_fecha){
		$this->id_fecha = $id_fecha;
	}

	private $fecha;

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_fecha']){
        		$this->setId_fecha($array['id_fecha']);
        	}
        
        $this->setFecha($array['fecha']);
    	}	
    }

}

?>