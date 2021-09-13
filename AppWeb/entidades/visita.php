<?php

class Visita{

	private $id_visita;

	public function getId_visita(){
		return $this->id_visita;
	}

	public function setId_visita($id_visita){
		$this->id_visita = $id_visita;
	}

	private $id_dueño_mascota;

	public function getId_dueño_mascota(){
		return $this->id_dueño_mascota;
	}

	public function setId_dueño_mascota($id_dueño_mascota){
		$this->id_dueño_mascota = $id_dueño_mascota;
	}

	private $id_usuario;

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	private $id_fecha;

	public function getId_fecha(){
		return $this->id_fecha;
	}

	public function setId_fecha($id_fecha){
		$this->id_fecha = $id_fecha;
	}

	private $id_teléfono;

	public function getId_teléfono(){
		return $this->id_teléfono;
	}

	public function setId_teléfono($id_teléfono){
		$this->id_teléfono = $id_teléfono;
	}

	private $id_mascota;

	public function getId_mascota(){
		return $this->id_mascota;
	}

	public function setId_mascota($id_mascota){
		$this->id_mascota = $id_mascota;
	}

	private $nota;

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
	}

	private $id_dirección;

	public function getId_dirección(){
		return $this->id_dirección;
	}

	public function setId_dirección($id_dirección){
		$this->id_dirección = $id_dirección;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_visita']){
        		$this->setId_visita($array['id_visita']);
        	}
        
        $this->setId_dueño_mascota($array['id_dueño_mascota']);
        $this->setId_usuario($array['id_usuario']);
        $this->setId_fecha($array['id_fecha']);
        $this->setId_teléfono($array['id_teléfono']);
        $this->setId_mascota($array['id_mascota']);
        $this->setNota($array['nota']);
        $this->setId_dirección($array['id_dirección']);
    	}	
    }

}

?>