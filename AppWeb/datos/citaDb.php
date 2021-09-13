<?php
require_once('datos/Db.php');
require_once('entidades/cita.php');

class citaDb extends Db{

    public function getOne($id_cita){ //funcionando ok
        
        $sql = "SELECT a.*
                FROM cita AS a
                WHERE id_cita = " . $id_cita . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $cita = new Cita( $result->fetch_assoc() );
        $result->free();
        return $cita;
    }

    public function getAll(){//funcionando ok
        
        $sql = "SELECT v.*
                FROM cita AS v
                ORDER BY v.id_usuario ASC, v.id_mascota ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'cita');
        $result->free();
        return $array;
    }

    public function update($cita){
        
        $sql = "UPDATE cita SET  
        id_dueño_mascota = '" . $cita->getId_dueño_mascota() . "',
        id_usuario = '" . $cita->getId_usuario() . "',
        id_fecha = '" . $cita->getId_fecha() . "',
        id_teléfono = '" . $cita->getId_teléfono() . "',
        id_mascota = '" . $cita->getId_mascota() . "',
        nota = '" . $cita->getNota() . "'
        
        WHERE id_cita = " . $cita->getId_cita();

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $cita;
    }

    public function insert($cita){
        
        $sql = "INSERT INTO cita (id_dueño_mascota,
                                    id_usuario,
                                    id_fecha,
                                    id_teléfono,
                                    id_mascota,
                                    nota)
                VALUES ( '" . $cita->getId_dueño_mascota() . "', 
                        '" . $cita->getId_usuario() . "',
                        '" . $cita->getId_fecha() . "',
                        '" . $cita->getId_teléfono() . "',
                        '" . $cita->getId_mascota() . "',
                        '" . $cita->getNota() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $cita->setId_cita( $this->mysqli->insert_id_cita );
        return $cita;
    }

    public function remove($cita){//funcionando ok
        $sql = "DELETE FROM cita
                WHERE id_cita = " . $cita->getId_cita();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>