<?php

class Mascota{

	private $id_mascota;

	public function getId_mascota(){
		return $this->id_mascota;
	}

	public function setId_mascota($id_mascota){
		$this->id_mascota = $id_mascota;
	}
	private $id_dueño_mascota;

	public function getId_dueño_mascota(){
		return $this->id_dueño_mascota;
	}

	public function setId_dueño_mascota($id_dueño_mascota){
		$this->id_dueño_mascota = $id_dueño_mascota;
	}
	
	private $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	
	private $edad;

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad($edad){
		$this->edad = $edad;
	}

	private $raza;

	public function getRaza(){
		return $this->raza;
	}

	public function setRaza($raza){
		$this->raza = $raza;
	}

	private $especie;

	public function getEspecie(){
		return $this->especie;
	}

	public function setEspecie($especie){
		$this->especie = $especie;
	}

    public function __construct($array = null){
    	if($array['id_mascota']){
    		$this->setId_mascota($array['id_mascota']);
    	}
    	$this->setId_dueño_mascota($array['id_dueño_mascota']);
        $this->setRaza($array['raza']);
        $this->setNombre($array['nombre']);
        $this->setEdad($array['edad']);
        $this->setEspecie($array['especie']);
    }

}

?>