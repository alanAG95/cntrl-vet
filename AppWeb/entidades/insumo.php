<?php

class Insumo{

	private $id_insumo;

	public function getId_insumo(){
		return $this->id_insumo;
	}

	public function setId_insumo($id_insumo){
		$this->id_insumo = $id_insumo;
	}

	private $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	private $cantidad;

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	private $nota;

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_insumo']){
        		$this->setId_insumo($array['id_insumo']);
        	}
        
        $this->setNombre($array['nombre']);
        $this->setCantidad($array['cantidad']);
        $this->setNota($array['nota']);
    	}	
    }

}

?>