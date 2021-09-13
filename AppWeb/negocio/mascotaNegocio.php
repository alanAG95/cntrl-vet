<?php
/*Clase Datos*/
require_once('datos/mascotaDb.php');
require_once('negocio/dueño_mascotaNegocio.php');
require_once('datos/dueño_mascotaDb.php');
require_once('entidades/dueño_mascota.php');

class mascotaNegocio{
  
    public function listar(){
        $db = new mascotaDb();
        return $db->getAll();
    }
  
    public function recuperar($id_mascota){
        $db = new mascotaDb();       
        return $db->getOne($id_mascota);
    }

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

        

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$mascota = new mascota($datos);
            


	        $db = new mascotaDb();
	        if($mascota->getId_mascota()){

	        	if( $db->update($mascota) instanceof mascota ){
	        		Util::setMsj('La mascota fue actualizada con éxito','success');
	        		header('Location:?modulo=mascota&accion=listar&id_mascota='.$mascota->getId_mascota());
	        	}else{
	        		Util::setMsj('Hubo un problema al actualizar mascota','danger');
	        	}
	        }else{

	        	if( $db->insert($mascota) instanceof mascota ){
	        		Util::setMsj('La mascota fue insertada con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema insertar mascota','danger');
	        	}
                header('Location:?modulo=mascota&accion=listar&id_mascota='.$mascota->getId_mascota());
                die();
	        }
    	}else{
    	//si hay algun error, informar por pantalla
    	}
    }

    public function eliminar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;

        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla
            $mascota = new mascota($datos);
            $db = new mascotaDb();

            if( $db->remove($mascota)){
                Util::setMsj('La mascota fue eliminada con exito','success');
            }else{
                Util::setMsj('Hubo un problema al eliminar la Mascota','danger');
            }
            header('Location:?modulo=mascota&accion=listar&id_mascota='.$mascota->getId_mascota());
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}

?>