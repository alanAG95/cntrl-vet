<?php
/*Clase Datos*/
require_once('datos/dueño_mascotaDb.php');
require_once('datos/direcciónDb.php');
require_once('entidades/dirección.php');

class dueño_mascotaNegocio{
  
    public function listar(){
        $db = new dueño_mascotaDb();
        return $db->getAll();
    }
  
    public function recuperar($id_dueño_mascota){
        $db = new dueño_mascotaDb();       
        return $db->getOne($id_dueño_mascota);
    }

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

        $llave = true;

        //filtro de clave realizado en consulta sql Bd.
        $dueño_mascota = new dueño_mascota($datos);

         $direDB = new direcciónDb();
            $dirección = new dirección();
            $direcciones = $direDB->getOne($dueño_mascota->getId_dirección());
            $arraydirecciones = $direDB->getAll();
            foreach ($arraydirecciones as $dirección) {
                if ($direcciones->getId_dirección()==$dirección->getId_dirección()) {//si encuentra la id queda la llave falsa
                    $llave = false;
                    break;
                }
            }
            if ($llave==false) {
                $dueño_mascota->setId_dirección($direcciones->getId_dirección());//existe
            }else{
                $direDB->insert($dueño_mascota->getId_dirección());
                $new = $direDB->getOne($dueño_mascota->getId_dirección());
                $dueño_mascota->setId_dirección($new->getId_dirección());//no esxiste
            }




    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		
	        $db = new dueño_mascotaDb();
	        if($dueño_mascota->getId_dueño_mascota()){

	        	if( $db->update($dueño_mascota) instanceof dueño_mascota ){
	        		Util::setMsj('El dueño de mascota fue actualizado con éxito','success');
	        		header('Location:?modulo=dueño_mascota&accion=listar&id_dueño_mascota='.$dueño_mascota->getId_dueño_mascota());
	        	}else{
	        		Util::setMsj('Hubo un problema al actualizar dueño','danger');
	        	}
	        }else{

	        	if( $db->insert($dueño_mascota) instanceof dueño_mascota ){
	        		Util::setMsj('El dueño de mascota fue insertado con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema insertar dueño','danger');
	        	}
                header('Location:?modulo=dueño_mascota&accion=listar&id_dueño_mascota='.$dueño_mascota->getId_dueño_mascota());
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
            $dueño_mascota = new dueño_mascota($datos);
            $db = new dueño_mascotaDb();

            if( $db->remove($dueño_mascota)){
                Util::setMsj('El dueño de mascota fue eliminado con exito','success');
            }else{
                Util::setMsj('Hubo un problema al eliminar al dueño','danger');
            }
            header('Location:?modulo=dueño_mascota&accion=listar&id_dueño_mascota='.$dueño_mascota->getId_dueño_mascota());
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}

?>