<?php
require_once('datos/Db.php');
require_once('entidades/visita.php');

class visitaDb extends Db{

    public function getOne($id_visita){ //funcionando ok
        
        $sql = "SELECT a.*
                FROM visita AS a
                WHERE id_visita = " . $id_visita . "";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $visita = new Visita( $result->fetch_assoc() );
        $result->free();
        return $visita;
    }

    public function getAll(){//funcionando ok
        
        $sql = "SELECT v.*
                FROM visita AS v
                ORDER BY v.id_usuario ASC, v.id_mascota ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'visita');
        $result->free();
        return $array;
    }

    public function update($visita){
        
        $sql = "UPDATE visita SET  
        id_dueño_mascota = '" . $visita->getId_dueño_mascota() . "',
        id_usuario = '" . $visita->getId_usuario() . "',
        id_teléfono = '" . $visita->getId_teléfono() . "',
        id_mascota = '" . $visita->getId_mascota() . "',
        id_dirección= '" . $visita->getId_dirección() . "',
        nota = '" . $visita->getNota() . "'
        
        WHERE id_visita = " . $visita->getId_visita();

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $visita;
    }

    public function insert($visita){
        
        $sql = "INSERT INTO visita (id_dueño_mascota,
                                    id_usuario,
                                    id_fecha,
                                    id_teléfono,
                                    id_mascota,
                                    id_dirección,
                                    nota)
                VALUES ( '" . $visita->getId_dueño_mascota() . "', 
                        '" . $visita->getId_usuario() . "',
                        '" . $visita->getId_fecha() . "',
                        '" . $visita->getId_teléfono() . "',
                        '" . $visita->getId_mascota() . "',
                        '" . $visita->getId_dirección() . "',
                        '" . $visita->getNota() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $visita->setId_visita( $this->mysqli->insert_id_visita );
        return $visita;
    }

    public function remove($visita){//funcionando ok
        $sql = "DELETE FROM visita
                WHERE id_visita = " . $visita->getId_visita();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>