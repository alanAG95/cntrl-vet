<?php
require_once('datos/Db.php');
require_once('entidades/emergencia.php');

class emergenciaDb extends Db{

    public function getOne($id_emergencia){ //funcionando ok
        
        $sql = "SELECT a.*
                FROM emergencia AS a
                WHERE id_emergencia = " . $id_emergencia . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $emergencia = new Emergencia( $result->fetch_assoc() );
        $result->free();
        return $emergencia;
    }

    public function getAll(){//funcionando ok
        
        $sql = "SELECT v.*
                FROM emergencia AS v
                ORDER BY v.id_usuario ASC, v.id_mascota ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'emergencia');
        $result->free();
        return $array;
    }

    public function update($emergencia){
        
        $sql = "UPDATE emergencia SET  
        id_dueño_mascota = '" . $emergencia->getId_dueño_mascota() . "',
        id_usuario = '" . $emergencia->getId_usuario() . "',
        id_teléfono = '" . $emergencia->getId_teléfono() . "',
        id_mascota = '" . $emergencia->getId_mascota() . "',
        nota = '" . $emergencia->getNota() . "'
        
        WHERE id_emergencia = " . $emergencia->getId_emergencia();

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $emergencia;
    }

    public function insert($emergencia){
        
        $sql = "INSERT INTO emergencia (id_dueño_mascota,
                                    id_usuario,
                                    id_fecha,
                                    id_teléfono,
                                    id_mascota,
                                    nota)
                VALUES ( '" . $emergencia->getId_dueño_mascota() . "', 
                        '" . $emergencia->getId_usuario() . "',
                        '" . $emergencia->getId_fecha() . "',
                        '" . $emergencia->getId_teléfono() . "',
                        '" . $emergencia->getId_mascota() . "',
                        '" . $emergencia->getNota() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $emergencia->setId_emergencia( $this->mysqli->insert_id_emergencia );
        return $emergencia;
    }

    public function remove($emergencia){//funcionando ok
        $sql = "DELETE FROM emergencia
                WHERE id_emergencia = " . $emergencia->getId_emergencia();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>