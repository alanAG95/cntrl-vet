<?php

class Dueño_mascota{

	private $id_dueño_mascota;

	public function getId_dueño_mascota(){
		return $this->id_dueño_mascota;
	}

	public function setId_dueño_mascota($id_dueño_mascota){
		$this->id_dueño_mascota = $id_dueño_mascota;
	}
	private $id_dirección;

	public function getId_dirección(){
		return $this->id_dirección;
	}

	public function setId_dirección($id_dirección){
		$this->id_dirección = $id_dirección;
	}

	private $nombre;
 
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	
	private $apellido;

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	private $edad;

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad($edad){
		$this->edad = $edad;
	}

    public function __construct($array = null){
    	if($array['id_dueño_mascota']){
    		$this->setId_dueño_mascota($array['id_dueño_mascota']);
    	}
    	$this->setId_dirección($array['id_dirección']);
        $this->setNombre($array['nombre']);
        $this->setApellido($array['apellido']);
        $this->setEdad($array['edad']);
    }


}

?>