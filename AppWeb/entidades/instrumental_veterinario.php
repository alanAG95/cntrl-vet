<?php

class Instrumental_veterinario{

	private $id_instrumental_veterinario;

	public function getId_instrumental_veterinario(){
		return $this->id_instrumental_veterinario;
	}

	public function setId_instrumental_veterinario($id_instrumental_veterinario){
		$this->id_instrumental_veterinario = $id_instrumental_veterinario;
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
        	if($array['id_instrumental_veterinario']){
        		$this->setId_instrumental_veterinario($array['id_instrumental_veterinario']);
        	}
        
        $this->setNombre($array['nombre']);
        $this->setCantidad($array['cantidad']);
        $this->setNota($array['nota']);
    	}	
    }

}

?>