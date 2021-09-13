<?php
require_once('datos/Db.php');
require_once('entidades/usuario.php');

class usuarioDb extends Db{

    public function getOne($id_usuario){
        
        $sql = "SELECT v.* 
                FROM usuario AS v
                WHERE id_usuario = " . $id_usuario . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $usuario = new Usuario( $result->fetch_assoc() );
        $result->free();
        return $usuario;
    }

    public function getAll(){//funcionando todo ok
        
        $sql = "SELECT v.*
                FROM usuario AS v
                ORDER BY v.apellido ASC, v.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Usuario');
        $result->free();
        return $array;
    }

    public function login($user, $password){
        
        $sql = "SELECT v.* 
                FROM usuario AS v
                WHERE v.nombre = '" . $user . "'
                AND v.password = '" . md5($password) . "'
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        if($result->num_rows > 0){
	        $usuario = new Usuario( $result->fetch_assoc() );
	        $result->free();
	        return $usuario;
        }else{
        	return false;
        }
    }

    public function update($usuario){
  
            $sql = "UPDATE usuario SET id_dirección = '" . $usuario->getId_dirección() . "', 
                                       id_teléfono = '" . $usuario->getId_teléfono() . "',
                                       id_correo_electronico = '" . $usuario->getId_correo_electronico() . "',
                                       usuario = '" . $usuario->getUsuario() . "',
                                       nombre = '" . $usuario->getNombre() . "',
                                       apellido = '" . $usuario->getApellido() . "',
                                       rut = '" . $usuario->getRut() . "',
                                       edad = '" . $usuario->getEdad() . "', ";
                                       if($usuario->getPassword()){
                                            $sql.= "password = '".md5($usuario->getPassword())."', ";
                                        }
                                       $sql.= " 
                                       especialidad = '" . $usuario->getEspecialidad(). "'                   
                    WHERE id_usuario = " . $usuario->getId_usuario();
            

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $usuario;
    }

    public function checkUsuario($nombre){

        $sql = "SELECT v.*
        FROM usuario AS v
        WHERE v.nombre = '" . $nombre . "'";
        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        if($result->num_rows > 0){
            return false;
        }
        else{
            return true;
        }   
    }


    public function insert($usuario){
        $sql = "INSERT INTO usuario(id_teléfono,
                                    id_dirección,
                                    id_correo_electronico,
                                    usuario,
                                    nombre,
                                    apellido,
                                    rut,
                                    especialidad,
                                    edad,
                                    password)
                VALUES ('" . $usuario->getId_teléfono() . "', 
                        '" . $usuario->getId_dirección() . "',
                        '" . $usuario->getId_correo_electronico() . "',
                        '" . $usuario->getUsuario() . "',
                        '" . $usuario->getNombre() . "',
                        '" . $usuario->getApellido() . "',
                        '" . $usuario->getRut() . "',
                        '" . $usuario->getEspecialidad() . "',
                        '" . $usuario->getEdad() . "',
                        '" . md5($usuario->getPassword()) . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $usuario->setId_usuario($this->mysqli->insert_id_usuario);
        return $usuario;
    }

    public function remove($usuario){//funciona ok
        $sql = "DELETE FROM usuario
                WHERE id_usuario = " . $usuario->getId_usuario();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>