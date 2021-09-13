<?php

class Ficha_mascota{

	private $id_ficha_mascota;

	public function getId_ficha_mascota(){
		return $this->id_ficha_mascota;
	}

	public function setId_ficha_mascota($id_ficha_mascota){
		$this->id_ficha_mascota = $id_ficha_mascota;
	}

	private $id_mascota;

	public function getId_mascota(){
		return $this->id_mascota;
	}

	public function setId_mascota($id_mascota){
		$this->id_mascota = $id_mascota;
	}

	private $detalle_rutinario;

	public function getDetalle_rutinario(){
		return $this->detalle_rutinario;
	}

	public function setDetalle_rutinario($detalle_rutinario){
		$this->detalle_rutinario = $detalle_rutinario;
	}

	private $detalle_no_rutinario;

	public function getDetalle_no_rutinario(){
		return $this->detalle_no_rutinario;
	}

	public function setDetalle_no_rutinario($detalle_no_rutinario){
		$this->detalle_no_rutinario = $detalle_no_rutinario;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_ficha_mascota']){
        		$this->setId_ficha_mascota($array['id_ficha_mascota']);
        	}
        
        $this->setId_mascota($array['id_mascota']);
        $this->setDetalle_rutinario($array['detalle_rutinario']);
        $this->setDetalle_no_rutinario($array['detalle_no_rutinario']);
    	}	
    }

}

?>
