<?php

class Dirección{

	private $id_dirección;

	public function getId_dirección(){
		return $this->id_dirección;
	}

	public function setId_dirección($id_dirección){
		$this->id_dirección = $id_dirección;
	}

	private $dirección;

	public function getDirección(){
		return $this->dirección;
	}

	public function setDirección($dirección){
		$this->dirección = $dirección;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_dirección']){
        		$this->setId_dirección($array['id_dirección']);
        	}
        
        $this->setDirección($array['dirección']);
    	}	
    }

}

?>