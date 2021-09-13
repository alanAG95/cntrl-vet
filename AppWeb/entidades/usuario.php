<?php

class Usuario{

	private $id_usuario;

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	private $id_teléfono;

	public function getId_teléfono(){
		return $this->id_teléfono;
	}

	public function setId_teléfono($id_teléfono){
		$this->id_teléfono = $id_teléfono;
	}


	private $id_dirección;

	public function getId_dirección(){
		return $this->id_dirección;
	}

	public function setId_dirección($id_dirección){
		$this->id_dirección = $id_dirección;
	}

	private $id_correo_electronico;

	public function getId_correo_electronico(){
		return $this->id_correo_electronico;
	}

	public function setId_correo_electronico($id_correo_electronico){
		$this->id_correo_electronico = $id_correo_electronico;
	}

	private $usuario;

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
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

	private $rut;

	public function getRut(){
		return $this->rut;
	}

	public function setRut($rut){
		$this->rut = $rut;
	}

	private $especialidad;

	public function getEspecialidad(){
		return $this->especialidad;
	}

	public function setEspecialidad($especialidad){
		$this->especialidad = $especialidad;
	}

	private $password;

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	private $edad;

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad($edad){
		$this->edad = $edad;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id_usuario']){
        		$this->setId_usuario($array['id_usuario']);
        	}
        
        $this->setId_teléfono($array['id_teléfono']);
        $this->setId_dirección($array['id_dirección']);
        $this->setId_correo_electronico($array['id_correo_electronico']);
        $this->setUsuario($array['usuario']);
        $this->setNombre($array['nombre']);
        $this->setApellido($array['apellido']);
        $this->setRut($array['rut']);
        $this->setEspecialidad($array['especialidad']);
        $this->setPassword($array['password']);
        $this->setEdad($array['edad']);
    	}	
    }

}

?>
