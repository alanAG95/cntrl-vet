<?php
/*Clase Datos*/
require_once('datos/citaDb.php');
require_once('negocio/dueño_mascotaNegocio.php');
require_once('datos/dueño_mascotaDb.php');
require_once('entidades/dueño_mascota.php');
require_once('negocio/usuarioNegocio.php');
require_once('datos/usuarioDb.php');
require_once('entidades/usuario.php');
require_once('datos/fechaDb.php');
require_once('entidades/fecha.php');
require_once('datos/teléfonoDb.php');
require_once('entidades/teléfono.php');
require_once('negocio/mascotaNegocio.php');
require_once('datos/mascotaDb.php');
require_once('entidades/mascota.php');

class citaNegocio{
  
    public function listar(){
        $db = new citaDb();
        return $db->getAll();
    }
  
    public function recuperar($id_cita){
        $db = new citaDb();       
        return $db->getOne($id_cita);
    }

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;
        $cita = new cita($datos);
        $llave = true;
        $llave2 = true;
        $llave3 = true;
        $llave4 = true;
        $llave5 = true;

//dueños
        $dueño_mascotaDB = new dueño_mascotaDb();
            $dueño_mascota = new dueño_mascota();
            $dueño_mascotas = $dueño_mascotaDB->getOne($cita->getId_dueño_mascota());
            $arraydueño_mascotas = $dueño_mascotaDB->getAll();
            foreach ($arraydueño_mascotas as $dueño_mascota) {
                if ($dueño_mascotas->getId_dueño_mascota()==$dueño_mascota->getId_dueño_mascota()) {//si encuentra la id queda la llave falsa
                    $llave = false;
                    break;
                }
            }
            if ($llave==false) {
                $cita->setId_dueño_mascota($dueño_mascotas->getId_dueño_mascota());//existe
            }else{
                $dueño_mascotaDB->insert($cita->getId_dueño_mascota());
                $new = $dueño_mascotaDB->getOne($cita->getId_dueño_mascota());
                $cita->setId_dueño_mascota($new->getId_dueño_mascota());//no esxiste
            }
//usuarios
            $usuarioDB = new usuarioDb();
            $usuario = new usuario();
            $usuarios = $usuarioDB->getOne($cita->getId_usuario());
            $arrayusuarios = $usuarioDB->getAll();
            foreach ($arrayusuarios as $usuario) {
                if ($usuarios->getId_usuario()==$usuario->getId_usuario()) {//si encuentra la id queda la llave falsa
                    $llave2 = false;
                    break;
                }
            }
            if ($llave2==false) {
                $cita->setId_usuario($usuarios->getId_usuario());//existe
            }else{
                $usuarioDB->insert($cita->getId_usuario());
                $new = $usuarioDB->getOne($cita->getId_usuario());
                $cita->setId_usuario($new->getId_usuario());//no esxiste
            }
//fecha
            $originalDate = $cita->getId_fecha();
            $newDate = date("Y-m-d", strtotime($originalDate));
            
            $cita->setId_fecha($newDate);

            $cita->setId_fecha("1");


//teléfono
            $teléfono = new teléfonoDb();// proceso para verificar existencia de datos o agregarlos
            $tel = new teléfono();
            $telefonos = $teléfono->getOne($cita->getId_teléfono());
            $arrayTelefonos = $teléfono->getAll();
            foreach ($arrayTelefonos as $tel) {
                if ($tel->getId_teléfono()==$telefonos->getId_teléfono()) {
                    $llave5 = false;
                    break;
                }
            }
            if ($llave5==false) {
                $cita->setId_teléfono($telefonos->getId_teléfono());//existe
            }else{
                $teléfono->insert($cita->getId_teléfono());
                $new = $teléfono->getOne($cita->getId_teléfono());
                $cita->setId_teléfono($new->getId_teléfono());//no esxiste
            }

//mascota
            $mascotaDB = new mascotaDb();
            $mascota = new mascota();
            $mascotas = $mascotaDB->getOne($cita->getId_mascota());
            $arraymascotas = $mascotaDB->getAll();
            foreach ($arraymascotas as $mascota) {
                if ($mascotas->getId_mascota()==$mascota->getId_mascota()) {//si encuentra la id queda la llave falsa
                    $llave3 = false;
                    break;
                }
            }
            if ($llave3==false) {
                $cita->setId_mascota($mascotas->getId_mascota());//existe
            }else{
                $mascotaDB->insert($cita->getId_mascota());
                $new = $mascotaDB->getOne($cita->getId_mascota());
                $cita->setId_mascota($new->getId_mascota());//no esxiste
            }








        

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		
            


	        $db = new citaDb();
	        if($cita->getId_cita()){

	        	if( $db->update($cita) instanceof cita ){
	        		Util::setMsj('La cita fue actualizada con éxito','success');
	        		header('Location:?modulo=cita&accion=listar&id_cita='.$cita->getId_cita());
	        	}else{
	        		Util::setMsj('Hubo un problema al actualizar la cita','danger');
	        	}
	        }else{

	        	if( $db->insert($cita) instanceof cita ){
	        		Util::setMsj('La cita fue insertada con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema insertar la cita','danger');
	        	}
                header('Location:?modulo=cita&accion=listar&id_cita='.$cita->getId_cita());
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
            $cita = new cita($datos);
            $db = new citaDb();

            if( $db->remove($cita)){
                Util::setMsj('La cita fue eliminada con exito','success');
            }else{
                Util::setMsj('Hubo un problema al eliminar la cita','danger');
            }
            header('Location:?modulo=cita&accion=listar&id_cita='.$cita->getId_cita());
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}

