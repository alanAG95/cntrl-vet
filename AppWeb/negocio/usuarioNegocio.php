<?php
/*Clase Datos*/
require_once('datos/usuarioDb.php');
require_once('datos/teléfonoDb.php');
require_once('entidades/teléfono.php');
require_once('datos/direcciónDb.php');
require_once('entidades/dirección.php');
require_once('datos/correo_electronicoDb.php');
require_once('entidades/correo_electronico.php');

class usuarioNegocio{
  
    public function listar(){//funciona ok
        $db = new usuarioDb();
        return $db->getAll();
    }
  
    public function recuperar($id_usuario){//funciona ok
        $db = new usuarioDb();       
        return $db->getOne($id_usuario);
    }

    public function login($user, $password){//funciona ok
        $db = new usuarioDb();
        return $db->login($user,$password);
    }

    public function validarUser($user){
        $db = new usuarioDb();
        return $db->checkUsuario($user);
    }

   public function guardar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;
        $db2 = new usuarioDb();


        $usuario = new usuario($datos);

            $llave = true;
            $llave2 = true;
            $llave3 = true;

            $teléfono = new teléfonoDb();// proceso para verificar existencia de datos o agregarlos
            $tel = new teléfono();
            $telefonos = $teléfono->getOne($usuario->getId_teléfono());
            $arrayTelefonos = $teléfono->getAll();
            foreach ($arrayTelefonos as $tel) {
                if ($tel->getId_teléfono()==$telefonos->getId_teléfono()) {
                    $llave = false;
                    break;
                }
            }
            if ($llave==false) {
                $usuario->setId_teléfono($telefonos->getId_teléfono());//existe
            }else{
                $teléfono->insert($usuario->getId_teléfono());
                $new = $teléfono->getOne($usuario->getId_teléfono());
                $usuario->setId_teléfono($new->getId_teléfono());//no esxiste
            }
             $direDB = new direcciónDb();
            $dirección = new dirección();
            $direcciones = $direDB->getOne($usuario->getId_dirección());
            $arraydirecciones = $direDB->getAll();
            foreach ($arraydirecciones as $dirección) {
                if ($direcciones->getId_dirección()==$dirección->getId_dirección()) {//si encuentra la id queda la llave falsa
                    $llave2 = false;
                    break;
                }
            }
            if ($llave2==false) {
                $usuario->setId_dirección($direcciones->getId_dirección());//existe
            }else{
                $direDB->insert($usuario->getId_dirección());
                $new = $direDB->getOne($usuario->getId_dirección());
                $usuario->setId_dirección($new->getId_dirección());//no esxiste
            }
            $correoDB = new correo_electronicoDb();
            $correo = new correo_electronico();
            $getCorreo = $correoDB->getOne($usuario->getId_correo_electronico());
            $arraycorreos = $correoDB->getAll();
            foreach ($arraycorreos as $correo) {
                if ($correo->getId_correo_electronico()==$getCorreo->getId_correo_electronico()) {
                    $llave3 = false;
                    break;
                }
            }
            if ($llave3==false) {
                $usuario->setId_correo_electronico($getCorreo->getId_correo_electronico());//existe
            }else{
                $correoDB->insert($usuario->getId_correo_electronico());
                $newcorreo = $correoDB->getOne($usuario->getId_correo_electronico());
                $usuario->setId_correo_electronico($newcorreo->getId_correo_electronico());//no esxiste
            }


//forma para conservar clave enviada
            







        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla

            $db = new usuarioDb();
            if($usuario->getId_usuario()){
                    if( $db->update($usuario) instanceof usuario ){
                        Util::setMsj('El usuario fue actualizado con éxito','success');
                    }else{
                        Util::setMsj('Hubo un problema actualizando el usuario','danger');
                    }
                    header('Location:?modulo=usuario&accion=listar');
                    die();
            }else{
                if( $db->checkUsuario($usuario->getUsuario()) ){ 
                    if( $db->insert($usuario) instanceof usuario ){
                        Util::setMsj('El usuario fue insertado con éxito','success');
                    }else{
                        Util::setMsj('Hubo un problema insertando el usuario','danger');
                        }
                    header('Location:?modulo=usuario&accion=listar');
                    die();
                    }
                else{
                        Util::setMsj('El usuario <strong>'.$usuario->getUsuario().'</strong> ya existe. Intente con otro usuario','danger');
                        return false;
                    }
                }

        }
        else{
        //si hay algun error, informar por pantalla
        }

    }

    public function eliminar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;

        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla
            $usuario = new usuario($datos);
            $db = new usuarioDb();

            if( $db->remove($usuario)){
                Util::setMsj('El usuario <strong>'.$_POST['usuario'].'</strong> fue eliminado con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando el usuario','danger');
            }
            header('Location:?modulo=usuario&accion=listar');
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }

}

?>