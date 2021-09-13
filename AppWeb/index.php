<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('');


require_once('util/util.php');


if($_POST['user'] && $_POST['pass']){
    /*Login*/
    require_once('negocio/usuarioNegocio.php');
    $usuarioNegocio = new usuarioNegocio();
    $vet = $usuarioNegocio->login($_POST['user'], $_POST['pass']);
    if($vet){
        $_SESSION['usuario']['id_usuario'] = $vet->getId_usuario();
        $_SESSION['usuario']['id_teléfono'] = $vet->getId_teléfono();
        $_SESSION['usuario']['id_dirección'] = $vet->getId_dirección();
        $_SESSION['usuario']['id_correo_electronico'] = $vet->getId_correo_electronico();
        $_SESSION['usuario']['usuario'] = $vet->getUsuario();
        $_SESSION['usuario']['nombre'] = $vet->getNombre();
        $_SESSION['usuario']['apellido'] = $vet->getApellido();
        $_SESSION['usuario']['rut'] = $vet->getRut();
        $_SESSION['usuario']['especialidad'] = $vet->getEspecialidad();
        $_SESSION['usuario']['edad'] = $vet->getEdad();
        $_SESSION['usuario']['password'] = $vet->getPassword();
        header('Location: ?modulo=usuario&accion=principal');
        die;
    }else{
        Util::setMsj('Usuario o contraseña incorrectos','danger', false);
        header('Location: login.php');
        die;
    }
}elseif($_GET['action'] == 'logout'){
    unset($_SESSION['usuario']);
    Util::setMsj('Has cerrado sesión','info', false);
    header('Location: login.php');
    die;
}

if($_SESSION['usuario']){
    $modulo = $_GET['modulo']? $_GET['modulo'] : 'usuario';
    $accion = $_GET['accion']? $_GET['accion'] : 'listar';
    $headUser = $_SESSION['usuario']['usuario'];
    /*Clase Negocio*/
    require_once('negocio/'.$modulo.'Negocio.php');

    $nombreNegocio = $modulo."Negocio";
    $$nombreNegocio = new $nombreNegocio();

    /*Proceso de formularios*/
    if($_POST){
        switch ($accion) {
            case 'editar':
                $$nombreNegocio->guardar();
                break;
            case 'eliminar':
                $$nombreNegocio->eliminar();
                break;
            case 'consultar':
                break;
            default:
                $accion = 'listar';
                break;
        }
    }

    require_once('vista/inc/'.$headUser.'.php');
    require_once('vista/'.$modulo.'/'.$accion.'.php');
    require_once('vista/inc/foot.php'); 

}else{
    header('Location: login.php');
    die;
}
?>