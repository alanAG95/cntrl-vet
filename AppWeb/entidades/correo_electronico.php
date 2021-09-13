<?php

class Correo_electronico{

	private $id_correo_electronico;

	public function getId_correo_electronico(){
		return $this->id_correo_electronico;
	}

	public function setId_correo_electronico($id_correo_electronico){
		$this->id_correo_electronico = $id_correo_electronico;
	}

	private $correo_electronico;

	public function getCorreo_electronico(){
		return $this->correo_electronico;
	}

	public function setCorreo_electronico($correo_electronico){
		$this->correo_electronico = $correo_electronico;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_correo_electronico']){
        		$this->setId_correo_electronico($array['id_correo_electronico']);
        	}
        
        $this->setCorreo_electronico($array['correo_electronico']);
    	}	
    }

}

?>