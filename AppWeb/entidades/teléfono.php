<?php

class Teléfono{

	private $id_teléfono;

	public function getId_teléfono(){
		return $this->id_teléfono;
	}

	public function setId_teléfono($id_teléfono){
		$this->id_teléfono = $id_teléfono;
	}

	private $teléfono;

	public function getTeléfono(){
		return $this->teléfono;
	}

	public function setTeléfono($teléfono){
		$this->teléfono = $teléfono;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_teléfono']){
        		$this->setId_teléfono($array['id_teléfono']);
        	}
        
        $this->setTeléfono($array['teléfono']);
    	}	
    }

}

?>
